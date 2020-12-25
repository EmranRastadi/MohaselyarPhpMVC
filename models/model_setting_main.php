<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/11/2020
 * Time: 4:49 PM
 */
class model_setting_main extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_user($id = '')
    {
        if ($id == '') {
            $sql = "select * from `user_detail`";
            $res = $this->select_query($sql, []);
        } else {
            $sql = "select * from `user_detail` where `id`=?";
            $res = $this->select_query($sql, [$id]);
        }

        return $res;
    }

    function get_product()
    {
        $sql = "select `course_tbl`.`id`,`course_tbl`.`name_c`,`course_tbl`.`m_state`,`course_tbl`.`logo`,`course_tbl`.`price_`,`course_tbl`.`mini_tit`,`user_detail`.`name`,`user_detail`.`fam` from `course_tbl`  LEFT JOIN `user_detail` ON `course_tbl`.`author_id`=`user_detail`.`id`";
        $sql_tot = "select * from  `user_detail` LEFT JOIN `course_tbl` ON `user_detail`.`id` = `course_tbl`.`author_id` LEFT JOIN `payment_tbm` ON `payment_tbm`.`c_id_` = `course_tbl`.`id`";
        $ress = $this->select_query($sql_tot, []);
        $res = $this->select_query($sql, []);

        return [$res, $ress];
    }


    function get_comment()
    {

        $sql = "select * from `comment_app`";
        $res = $this->select_query($sql, []);

        foreach ($res as $key => $val) {
            $sql_u = "select * from `user_detail` where melli = ?";
            $res_u = $this->select_query($sql_u, [$val['writer']]);
            foreach ($res_u as $item) {
                $res[$key]['sender'] = $item['name'] . " " . $item['fam'];
            }

        }
        return $res;

    }

    function del_com($id)
    {
        $sql = "delete from `comment_app` where id=?";
        $res = $this->insert_query($sql, [$id]);
        if ($res) {
            echo "ok";
        } else {
            echo "no";
        }
    }

    function up_com($id)
    {
        $sql_S = "select * from `comment_app` where id=?";
        $res = $this->select_query($sql_S, [$id], 'fetch');
        $state = 0;
        if ($res['state'] == 0) {
            $state = 1;
        }
        $sql = "update `comment_app` set state = '" . $state . "' where id=?";
        $res_u = $this->insert_query($sql, [$id]);
        if ($res_u) {
            echo "ok";
        } else {
            echo "no";
        }
    }

    function up_add($form)
    {
        $data = json_encode($form, JSON_UNESCAPED_UNICODE);
        $sql = "update `main_sett` set address = '" . $data . "' where id = 1";
        $res = $this->insert_query($sql);
        if ($res) {
            echo "ok";
        } else {
            echo "no";
        }
    }

    function get_add_com()
    {
        $sql = "select * from `main_sett` where id=1";
        $res = $this->select_query($sql, [], 'fetch');
        $comp = json_decode($res['address'], true);
        return $comp;
    }

    function add_all_msg($form)
    {
        if (!empty($form['reciver']) && !empty($form['level']) && !empty($form['text_msg']))
        {
            $date = jdate("Y/m/F/d");
            $reciver = $form['reciver'];
            $level = $form['level'];
            $text_msg = $form['text_msg'];
            $sql = "insert into `modir_news` (`text`,`date`,`viewer`,`state`,`resiver`) VALUES (?,?,?,?,?)";
            $res = $this->insert_query($sql, [$text_msg, $date, '[]', $level,$reciver]);
            if ($res) {
                echo "ok";
            } else {
                echo "no";
            }
        }
        else{
            echo "empty";
        }

    }

    function add_top_manager($id)
    {

        $sql_s = "select * from `user_detail` where `oficial`=2";
        $res_s = $this->select_query($sql_s, []);
        if (sizeof($res_s) >= 2) {
            echo "err";
        } else {
            $sql = "update `user_detail` set `oficial`= '2' where id=?";
            $res = $this->insert_query($sql, [$id]);
            if ($res) {
                echo "ok";
            } else {
                echo "no";
            }
        }
    }

    function up_top_manager($id)
    {
        $sql = "update `user_detail` set `oficial`= '1' where id=?";
        $res = $this->insert_query($sql, [$id]);
        if ($res) {
            echo "ok";
        } else {
            echo "no";
        }
    }

}