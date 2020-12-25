<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/19/2020
 * Time: 1:53 PM
 */
class model_add_cat_world extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function check_user($user_mel,$book_id)
    {
        $user = $this->get_user($user_mel);
        $user_id = $user['id'];
        $sql = "select * from `course_tbl` WHERE `author_id` = ? and `id` = ?";
        $res =$this->select_query($sql,[$user_id,$book_id]);
        return $res;
    }

    function get_user($user_meli)
    {
        $sql = "select * from `user_detail` where `melli` = ?";
        $res = $this->select_query($sql,[$user_meli],'fetch');
        return $res;
    }

    function add_cat_w($id_book,$form)
    {
        $msg = '';
        for ($i=0;$i<sizeof($form);$i++)
        {
            if($form['cat_name_'.$i] != '')
            {
               $sql = "insert into `world_cat__` (`cat_id__`,`cat_name`,`m_state`,`latest_change`) VALUES (?,?,?,?)";
               $params = array($id_book,$form['cat_name_'.$i],'1',time());
               $res = $this->insert_query($sql,$params);
               if ($res)
               {
                    $msg = "ok";
               }else
               {
                   $msg = "error";
               }
            }else
            {
                $msg = "empty";
            }
        }
        echo $msg;
    }

    function get_cat_data($id_book)
    {
        $sql = "select * from `world_cat__` where `cat_id__` = ? and `m_state`='1' ";
        $params = array($id_book);
        $res = $this->select_query($sql,$params);
        return $res;
    }

    function check_m($id)
    {
        $sql = "select * from `course_tbl` where `id` = ? and `m_state`='1'";
        $params = array($id);
        $rs = $this->check_status($sql,$params);
        return $rs;
    }
    function del_cat($id)
    {
        $sql = "update `world_cat__` set `m_state`='0' WHERE `id`=?";
        $params = array($id);
        $stmt = $this->insert_query($sql,$params);
        if ($stmt)
        {
            echo "ok";
        }else
        {
            echo "no";
        }
    }
    function up_cat($form)
    {
        if (!empty($form['name']) &&!empty($form['id']))
        {
            $name = $form['name'];
            $id = $form['id'];
            $sql = "update `world_cat__` set `cat_name`=? where id=?";
            $res = $this->insert_query($sql,[$name,$id]);
            if ($res)
            {
                echo "ok";
            }else{
                echo "no";
            }
        }else{
            echo "empty";
        }

    }
}