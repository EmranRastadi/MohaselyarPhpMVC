<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/14/2020
 * Time: 12:20 AM
 */
class model_login extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function login_check_m($form_in)
    {
        $melli = $form_in['melli_code'];
        $pass = $form_in['pass_login'];

        if (!empty($melli) && !empty($pass)) {
            $pass_log  = md5($pass."emranLaruzSDRast~").md5("mygoodlkjhuhkh~");
            $sql = "select * from `user_detail` WHERE `melli`=? and `pass`=? ";
            $values = array($melli, $pass_log);
            $res = $this->select_query($sql, $values);
            if (sizeof($res)) {
                self::seseion_init();
                self::session_set("user_login", $melli);
                header("location:" . URL . "dashboard");
            } else {
                header("location:" . URL . "login");
            }
        } else {
            header("location:" . URL . "login");
        }

    }

    public function check_phone_true($phone_num)
    {
        $sql = "SELECT * FROM `user_detail` WHERE `melli` = ? ";
        $array_val = array($phone_num);
        $res = $this->select_query($sql, $array_val);
        return $res;

    }
    function forget_pass($form)
    {
        $msg = '';
        $today = jdate('Y/m/d','','','','en');
        $phone = $form['phone'];
        if (sizeof(str_split($phone)) == 11 && preg_match('/^[0-9]+$/',$phone))
        {
            $sql = "select * from   `user_detail` where `phone`=?";
            $res = $this->select_query($sql,[$phone],'fetch');
            if ($res['date_change_pass'] != '')
            {
                $old_date = json_decode($res['date_change_pass']);
                $count_old_date = array_count_values($old_date);
                $count = $count_old_date[$today];
                $old_date[sizeof($old_date)] = $today;
                if ($count < 4)
                {
                    $rand_pass = rand(0,999999999);

                    //  send   rand_pass via sms to user   ///

                    $pass_hash = md5($rand_pass."emranLaruzSDRast~").md5("mygoodlkjhuhkh~");
                    $old_date[sizeof($old_date)] = $today;
                    $sql_u = "update `user_detail` set `date_change_pass` = ? and `pass` = ? WHERE `phone` = ?";
                    $res_u = $this->insert_query($sql_u,[json_encode($old_date),$pass_hash,$phone]);
                    if ($res_u)
                    {
                        $msg = "ok";
                    }else{
                        $msg = "no";
                    }
                }else{
                    $msg = "num";
                }
            }else{
                $rand_pass = rand(0,999999999);

                //  send   rand_pass via sms to user   ///

                $pass_hash = md5($rand_pass."emranLaruzSDRast~").md5("mygoodlkjhuhkh~");
                $date_ = json_encode([$today]);
                $sql_i = "update `user_detail` set `date_change_pass` = ? and `pass` = ? WHERE `phone` = ?";
                $res_i = $this->insert_query($sql_i,[$date_,$pass_hash,$phone]);
                if ($res_i)
                {
                    $msg = "ok";
                }else{
                    $msg = "no";
                }
            }
        }else{
            $msg = "type";
        }
        echo $msg;
    }
}