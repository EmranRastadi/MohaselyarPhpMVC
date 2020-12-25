<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/13/2020
 * Time: 10:03 PM
 */
class Model
{
    public static $connect = '';

    function __construct()
    {
        $server = "127.0.0.1";
        $db_name = "mohaselyar";
        $user = "root";
        $pass = "";
        $dsn = "mysql:host=" . $server . ";dbname=" . $db_name;
        $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        self::$connect = new PDO($dsn, $user, $pass, $attr);
        self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (function_exists('jdate') == false) {
            require 'public/lib/jdf.php';
        }

    }

    function user_data()
    {
        self::seseion_init();
        $user_id = self::sesion_get('user_login');
        if ($user_id != false) {

            $sql = "select * from `user_detail` where `melli` = ?";
            $res = self::select_query($sql, [$user_id], 'fetch', PDO::FETCH_NUM);
            $counter = sizeof($res) - 1;
            for ($i = 0; $i < sizeof($res); $i++) {
                if ($res[$i] == '' || $res[$i] == '0') {
                    $counter--;
                } else {

                }

            }

//            $darsad_pro = round(($counter / (sizeof($res) - 1)) * 100, 0);
            $darsad_pro = ($counter / (sizeof($res) - 1));
            return [$res, $darsad_pro,$user_id];
        } else {
            return false;
        }
    }

    function insert_data($sql)
    {

    }

    function select_query($sql, $values = array(), $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)
    {
        $stmt = self::$connect->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchStyle);
        } else {
            $result = $stmt->fetch($fetchStyle);
        }
        return $result;
    }

    function insert_query($sql, $values = array())
    {
        $stmt = self::$connect->prepare($sql);
        foreach ($values as $kry => $value) {
            $stmt->bindValue($kry + 1, $value);
        }
        $res = $stmt->execute();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }


    public function mkdir_pro($dir)
    {
        mkdir($dir);
    }


    public static function seseion_init()
    {
        @session_start();
    }

    public static function session_set($ses_name, $ses_val)
    {
        $_SESSION[$ses_name] = $ses_val;
    }

    public static function sesion_get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }


    public function check_status($sql, $values = array())
    {
        $stmt = self::$connect->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public static function set_cookie()
    {
        if (isset($_COOKIE['basket'])) {
            $cookie = $_COOKIE['basket'];
        } else {
            $value = time();
            $expire = time() + 7 * 24 * 3600;
            setcookie('basket',$value,$expire,'/');
            $cookie = $value;
        }
        return $cookie;
    }
    function get_cart()
    {
        $cookie = self::set_cookie();
        $sql = "SELECT * FROM `basket_tbm` WHERE `cookie__` = ?";
        $res = $this->select_query($sql,[$cookie],'fetch');
        return $res;
    }
    function get_msg_count()
    {
        self::seseion_init();
        $user_id = self::sesion_get("user_login");
        $sql = "select * from `modir_news` where `resiver` = '2' ";
        $res = $this->select_query($sql, []);
        $array_res = array();
        foreach ($res as $re) {
            $viewers = json_decode($re['viewer'], true);
            if (!in_array($user_id, $viewers) || $re['viewer']=='0' || $re['viewer'] == '') {
                array_push($array_res, $re);
            } else {

            }
        }
        return $array_res;
    }

}