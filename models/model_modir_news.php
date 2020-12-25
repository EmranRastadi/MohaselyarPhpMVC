<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/2/2020
 * Time: 12:24 AM
 */
class model_modir_news extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_news($user_id)
    {
        $sql = "select * from `modir_news` ";
        $res = $this->select_query($sql, []);
        return [$res, $user_id];
    }
    function get_news_user($user_id)
    {
        $sql = "select * from `modir_news` where `resiver` = '2' ";
        $res = $this->select_query($sql, []);
        $array_res = array();
        foreach ($res as $re) {
            $viewers = json_decode($re['viewer'], true);
            if (!in_array($user_id, $viewers) || $re['viewer']=='0') {
                array_push($array_res, $re);
            } else {

            }
        }
        return $array_res;
    }

    function del_mm_new($form)
    {
        $id = $form['id'];
        $sql = "delete from `modir_news` where id=?";
        $res = $this->insert_query($sql, [$id]);
        if ($res) {
            echo "ok";
        } else {
            echo "no";
        }
    }

    function up_news_view($user_id, $newa_id)
    {
        $msg = "";
        $view_new = array();
        $sql_s = "select * from `modir_news` WHERE `id` = ?";
        $res_s = $this->select_query($sql_s, [$newa_id], 'fetch');
        if ($res_s['viewer'] == '' || $res_s['viewer'] == '0') {
            $view_new[0] = $user_id;
            $sql = "update `modir_news` set `viewer` = ? where `id`=? ";
            $res_u = $this->insert_query($sql, [json_encode($view_new), $newa_id]);
            if ($res_u) {
                $msg = "ok";
            } else {
                $msg = "no";
            }
        } else {
            $viewer = json_decode($res_s['viewer'], true);
            $viewer[sizeof($viewer)] = $user_id;
            $sql = "update `modir_news` set `viewer` = ? where `id`=? ";
            $res_u = $this->insert_query($sql, [json_encode($viewer), $newa_id]);
            if ($res_u) {
                $msg = "ok";
            } else {
                $msg = "no";
            }
        }
        echo $msg;

    }
}