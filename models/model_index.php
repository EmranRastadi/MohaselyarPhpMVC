<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/1/2020
 * Time: 12:38 AM
 */
class model_index extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_data()
    {
        $sql = "select * from `main_sett`";
        $res = $this->select_query($sql,[],'fetch');
        $comment = $this->get_comment();
        return [$res,$comment];

    }
    function get_comment()
    {


        $sql = "select * from `comment_app` WHERE  state = ?";
        $res = $this->select_query($sql,[1]);
        if ($res)
        {
            foreach ($res as $key => $val)
            {
                $sql_u = "select * from `user_detail` where melli = ?";
                $res_u = $this->select_query($sql_u,[$val['writer']]);
                foreach ($res_u as $item) {
                    $res[$key]['sender'] = $item['name']." ".$item['fam'];
                }

            }
            return $res;
        }
        else
        {
            return '';
        }
    }

    function get_user_top()
    {
        $sql = "select * from `user_detail` where `oficial`=2";
        $res = $this->select_query($sql,[]);
        $sql_m = "select * from `user_detail` where `oficial` = 66 ";
        $res_m = $this->select_query($sql_m,[],'fetch');
        array_push($res,$res_m);
        $res[] = $res_m;
        return $res;
    }
    function get_pro_top(){
        $sql = "select * from  `course_tbl` where `state_top`=1 ";
        $res = $this->select_query($sql,[]);
        return $res;
    }
    function get_tot_count()
    {
        $sqls = "select * from `mohaselin`";
        $res = $this->select_query($sqls,[]);
        $sqlw = "select * from `world__tbm`";
        $res_w = $this->select_query($sqlw,[]);
        $sql_ti = "select * from `ticket_tbl`";
        $res_ti = $this->select_query($sql_ti,[]);

        $sql_like = "select * from `course_tbl`";
        $res_like = $this->select_query($sql_like,[]);
        $count_like = 0;
        foreach ($res_like as $item) {
            $like_str = json_decode($item['like'],true);
            $count_like = $count_like+sizeof($like_str);
        }

        $count_world = sizeof($res_w);
        $count_moh = sizeof($res);
        $count_ticket = sizeof($res_ti);


        return [$count_like,$count_moh,$count_world,$count_ticket];
    }
}