<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/21/2020
 * Time: 5:56 PM
 */
class model_profile extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function user_get_data($user_id)
    {
        $sql = "select * from `user_detail` WHERE `melli`=?";
        $params = array($user_id);
        $res = $this->select_query($sql, $params, 'fetch');
        return $res;
    }

    function update_user($form, $user_mel)
    {
        $uni = $form['uni'];
        $f_name = $form['f_name'];
        $s_name = $form['s_name'];
        $nic = $form['nic'];
        $phone = $form['phone'];
        $email = $form['email'];
        $skills = $form['skills'];
        $address = $form['address'];
        $ebd = $form['ebd'];

        $sql = "UPDATE `user_detail` SET `name` = ?, `fam` = ?,`ebd` = ?, `phone` = ?, `skills` = ?, `email` = ?, `address` = ?, `uni` = ?, `nic_name` = ? WHERE `melli` = '" . $user_mel . "'";
        $params = array($f_name, $s_name, $ebd, $phone, $skills, $email, $address, $uni, $nic);
        $res = $this->insert_query($sql, $params);
        if ($res) {
            echo "ok";
        } else {
            echo "no";
        }
    }

    function get_pay_customer($user_id)
    {
        $res_c = $this->get_course($user_id);

        $customer = array();
        $total_pay = 0;
        $count_pay = 0;
        $result = array();
        $user_full_customer = array();

        foreach ($res_c as $item) {
            $arr_pro_id = array();
            $sql = "select * from `payment_tbm` where `c_id_` = ?";
            $params = array($item['id']);
            $res = $this->select_query($sql, $params);
            foreach ($res as $value) {
                $sqls = "select * from `user_detail` where `id` = ? ";
                $params_u = array($value['use_id_']);
                $res_u = $this->select_query($sqls, $params_u, 'fetch');
                $user_data = array();
                $user_data['names'] = $res_u['name'] . " " . $res_u['fam'];
                $user_data['img'] = $res_u['profile_img'];
                $user_data['date'] = $value['date_pay__'];
                $user_full_customer[$res_u['id']] = $user_data;
                $total_pay = $total_pay + $value['mablag_'];
                $count_pay++;
            }
        }
        $result['total_pay'] = $total_pay;
        $result['count_pay'] = $count_pay;
        $result['user_data'] = $user_full_customer;
        return $result;
    }

    function get_course($user_id)
    {
        $users = $this->get_user_data($user_id);
        $sql = "select * from `course_tbl` where `author_id` = ? and `m_state` = 1";
        $params = array($users['id']);
        $res = $this->select_query($sql, $params);
        return $res;
    }

    function get_user_data($user_id)
    {
        $sql = "select * from `user_detail` where `melli` = ?";
        $params = array($user_id);
        $res = $this->select_query($sql, $params, 'fetch');
        return $res;
    }

    function get_ticket($user_id)
    {
        $sql = "select * from `ticket_tbl` where resiver = ?";
        $res = $this->select_query($sql, [$user_id]);
        return $res;
    }

    function change_pass($form, $user_id)
    {
        $old = $form['old'];
        $new = $form['new_pass'];
        $re_new = $form['re_new'];

        if (!empty($old) && !empty($new) && !empty($re_new)) {
            $hash_pass = md5($old . "emranLaruzSDRast~") . md5("mygoodlkjhuhkh~");
            if ($re_new == $new) {
                $sql = "select * from `user_detail` where `melli` = ?";
                $res = $this->select_query($sql, [$user_id], 'fetch');
                if ($res['pass'] == $hash_pass) {
                    $new_pass = md5($new . "emranLaruzSDRast~") . md5("mygoodlkjhuhkh~");
                    $sql_u = "update `user_detail` set `pass`=? where `melli`= ?";
                    $res_u = $this->insert_query($sql_u, [$new_pass, $user_id]);
                    if ($res_u) {
                        echo "ok";
                    } else {
                        echo "no";
                    }
                } else {
                    echo $hash_pass;
                }
            } else {
                echo "match";
            }
        } else {
            echo "empty";
        }
    }

    function get_pay_user($id, $admin_mel)
    {
        $user_data = $this->get_user_data($admin_mel);
        $admin_id = $user_data['id'];
        $sql = "select * from `payment_tbm` where `use_id_` = ?";
        $res = $this->select_query($sql, [$id]);
        $arr_use_pay = array();
        foreach ($res as $key => $valss) {
            $sqls = "select * from `course_tbl` where id=?";
            $res_cc = $this->select_query($sqls, [$valss['c_id_']], 'fetch');
            $res[$key]['name'] = $res_cc['name_c'];
            $dates = explode('/', $valss['date_pay__']);
            $date_exp = $dates[3] . " " . $dates[2] . " " . $dates[0];
            $res[$key]['date'] = $date_exp;
        }

        // $str_id_c=implode(',',$arr_use_pay);
        // $sql_c = "select * from `course_tbl`  where `course_tbl`.`id` IN (".$str_id_c.") and `course_tbl`.`author_id`=? ";
        // $res_co_pay = $this->select_query($sql_c,[$admin_id]);

        echo json_encode($res);
        // print_r($res);
    }

    function update_mage_($mage, $user_id)
    {
        $msg = "";
        $file_name = $_FILES['file']['name'];
        $type = array('jpeg', 'jpg', 'png');
        $location_image = "public/users/profile/" . $user_id . "/" . $file_name;
        $location_dir = "public/users/profile/" . $user_id . "/";
        $img_type = pathinfo($location_image, PATHINFO_EXTENSION);
        if (!in_array($img_type, $type)) {
            $msg = "type";
        } else {
            if ($_FILES['file']['size'] > 100000) {
                $msg = 'size';
            } else {
                if (!file_exists($location_dir)) {
                    mkdir($location_dir);
                    $sql_u = "update `user_detail` set `profile_img`='" . $location_image . "' where `melli`=?";
                    $res_u = $this->insert_query($sql_u, [$user_id]);
                    if (!file_exists($location_image) && $res_u) {
                        if (move_uploaded_file($_FILES['file']['tmp_name'], $location_image)) {
                            $msg = "ok";
                        } else {
                            $msg = "err";
                        }
                    } else {
                        $msg = "exist";
                    }
                    if ($res_u) {
                        $msg = "ok";
                    } else {
                        $msg = "err";
                    }
                } else {
                    $sql = "select * from `user_detail` where `melli` = ?";
                    $res = $this->select_query($sql, [$user_id], 'fetch');
                    $old_img = $res['profile_img'];
                    if ($old_img == '') {
                        $sql_u = "update `user_detail` set `profile_img`='" . $location_image . "' where `melli`=?";
                        $res_u = $this->insert_query($sql_u, [$user_id]);
                        if (!file_exists($location_image) && $res_u) {
                            if (move_uploaded_file($_FILES['file']['tmp_name'], $location_image)) {
                                $msg = "ok";
                            } else {
                                $msg = "err";
                            }
                        } else {
                            $msg = "exist";
                        }
                        if ($res_u) {
                            $msg = "ok";
                        } else {
                            $msg = "err";
                        }
                    } else {
                        unlink($old_img);
                        rmdir('public/users/profile/' . $user_id);
                        mkdir('public/users/profile/' . $user_id);
                        $sql_u = "update `user_detail` set `profile_img`='" . $location_image . "' where `melli`=?";
                        $res_u = $this->insert_query($sql_u, [$user_id]);
                        if (!file_exists($location_image) && $res_u) {
                            if (move_uploaded_file($_FILES['file']['tmp_name'], $location_image)) {
                                $msg = "ok";
                            } else {
                                $msg = "err";
                            }
                        } else {
                            $msg = "exist";
                        }
                    }
                }
            }
        }


        echo $msg;
    }

}