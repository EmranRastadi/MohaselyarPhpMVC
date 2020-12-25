<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/2/2020
 * Time: 12:20 PM
 */
class model_show_cart extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_basket()
    {

    }

    function get_cookie_pro()
    {
        $cookie = self::set_cookie();

        $sql = "select * from `basket_tbm` WHERE `cookie__` = ?";
        $res = $this->select_query($sql, [$cookie], 'fetch');
        if ($res) {
            $new = array_count_values(json_decode($res['pro_ids']));
            $all_pro = array();
            foreach ($new as $key => $item) {
                $count = $item;
                $res_pro = $this->get_pro($key);
                $res_pro['count'] = $count;
                $res_pro['tot_price'] = $res_pro['dis_price'] * $count;
                array_push($all_pro, $res_pro);
            }
            return $all_pro;
        } else {
            return [];
        }

    }

    function get_pro($pro_id)
    {
        $sql = "select * from `course_tbl` where `id`=?";
        $res = $this->select_query($sql, [$pro_id], 'fetch');
        $price_dis = $res['price_'] - (($res['price_'] * $res['discount']) / 100);
        $res['dis_price'] = $price_dis;
        return $res;
    }

    function del_pro($form)
    {
        $cookie = self::set_cookie();
        $sql_s = "SELECT * FROM `basket_tbm` WHERE `cookie__` = ?";
        $res_s = $this->select_query($sql_s, [$cookie], 'fetch');
        $res_cook = json_decode($res_s['pro_ids']);
        for ($i = 0; $i < sizeof($res_cook); $i++) {
            if ($form['id'] == $res_cook[$i]) {
                unset($res_cook[$i]);
            }
        }
        $new_pros = json_encode(array_values($res_cook));
        $sql = "update `basket_tbm` set `pro_ids` = '" . $new_pros . "' where `cookie__` = ? ";
        $res = $this->insert_query($sql, [$cookie]);
        if ($res) {
            echo "ok";
        } else {
            echo "no";
        }
    }
}