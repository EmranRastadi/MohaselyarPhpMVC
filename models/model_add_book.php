<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/17/2020
 * Time: 9:34 PM
 */
class model_add_book extends Model
{

    public $user_ = '';
    public $user_id = '';

    function __construct()
    {
        parent::__construct();
        parent::seseion_init();
        $this->user_ = parent::sesion_get("user_login");
        $sql_u = "select * from `user_detail` where `melli` = ?";
        $params = array($this->user_);
        $rs = parent::select_query($sql_u, $params, 'fetchAll');
        $this->user_id = $rs['id'];
    }

    function add_book_fun($form_in)
    {

        if (!empty($form_in['book_name']) && !empty($form_in['book_mini_desc']) && !empty($form_in['book_full_desc'])
            && !empty($form_in['book_price']) && !empty($form_in['book_cat']) && !empty($form_in['book_types']) && !empty($_FILES['book_icon']['name'])
        ) {

            $book_name = $form_in['book_name'];
            $book_mini_desc = $form_in['book_mini_desc'];
            $book_full_desc = $form_in['book_full_desc'];
            $book_price = $form_in['book_price'];
            $book_cat = $form_in['book_cat'];
            $book_type = $form_in['book_types'];
            $discount = $form_in['discount_price'];
            $user_id = $this->user_id;
            $rand_id_logo = rand(0, 9999) . round(microtime(), 0);
            $direction_target = "public/course_/uploads_logo/" . $rand_id_logo . "/";
            $direction_targets = "public/course_/uploads_logo/" . $rand_id_logo . "/";
            $file_dir = $direction_target . basename($_FILES['book_icon']['name']);
            $file_dirs = $direction_targets . basename($_FILES['book_icon']['name']);
            $image_name = strtolower(pathinfo($file_dir, PATHINFO_EXTENSION));
            $image_type = getimagesize($_FILES['book_icon']['tmp_name']);
            if ($image_type !== false) {
                if ($image_name != "jpg" && $image_name != "jpeg" && $image_name != "png") {
                    echo "type";
                } else {
                    if (!file_exists($direction_target)) {
                        if ($_FILES['book_icon']['size'] >= 100000) {
                            echo "size";
                        } else {
                            $upload_state = 1;
                            mkdir("public/course_/uploads_logo/" . $rand_id_logo);
                            if (move_uploaded_file($_FILES['book_icon']['tmp_name'], $file_dir)) {
                                $sql = "INSERT INTO `course_tbl` (`name_c`, `logo`, `type_c`, `price_`, `mini_tit`, `long_tite`, `author_id`,`type_learn`,`m_state`,`discount`) 
                                VALUES ( ? , ?, ? , ? , ? , ? , ? ,?,?,?);";

                                $array_ins_params = array($book_name, $file_dir, $book_cat, $book_price, $book_mini_desc, $book_full_desc, $user_id, $book_type, 1,$discount);

                                $res = $this->insert_query($sql, $array_ins_params);
                                $last_id = parent::$connect->lastInsertId();
                                if ($res) {
//                                        header("location:".URL."add_world/index/".$last_id);
                                    echo "uploaded";
                                } else {
//                                        header("location:".URL."add_book");
                                    echo "upload_error";
                                }
                            } else {
//                                    header("location:".URL."add_book");
                                echo "upload_error";
                            }
                        }
                    } else {
//                            header("location:".URL."add_book");

                    }

                }
            }
        } else {
//                header("location:".URL."add_book/index/empty");
            echo "empty";
        }


//        echo $book_cat.'/'.$book_full_desc.'/'.$book_price.'/'.$book_mini_desc.'/'.$book_name;
    }


    function get_cat_book_sh()
    {
        $sql = "SELECT * FROM `course_type`";
        $stmt = $this->select_query($sql);
        return $stmt;
    }

    function get_book_list($melli)
    {
        $sql_u = "SELECT * FROM `user_detail` where  `melli`=?";
        $params_u = array($melli);
        $res_u = $this->select_query($sql_u, $params_u, 'fetch');
        $sql = "SELECT * FROM `course_tbl` WHERE `author_id`=? and `m_state`= ? ";
        $params = array($res_u['id'], 1);
        $stmt = $this->select_query($sql, $params);
        return $stmt;
    //    print_r($stmt);
    }

    function del_book_in($id)
    {

        $time = time();
        $slq = "update `course_tbl` set `m_state` = '0' , `latest_change` = '".$time."' WHERE `id` = ?";
        $param = array($id);
        $res = $this->insert_query($slq, $param);

        $sql_ca = "update `world_cat__` set `m_state` = '0' , `latest_change` = '".$time."' WHERE `book_id` = ?";
        $res_cat = $this->insert_query($sql_ca, $param);

        $sql_w = "update `world__tbm` set `m_state` = '0' , `latest_change` = '".$time."' WHERE `book_id` = ?";
        $res_w = $this->insert_query($sql_w, $param);

        if ($res && $res_cat && $res_w) {
            return $res;
        }
    }


    function update_book($form)
    {
        $msg = "";
        $id = $_POST['id'];
        $name = $_POST['name'];
        $full = $_POST['full'];
        $mini = $_POST['mini'];
        $price = $_POST['price'];
        $disc = $_POST['disc'];
        $type = $_POST['type'];
        $cat = $_POST['cat'];

        if (!empty($name) && !empty($full) && !empty($mini) && !empty($price) && !empty($type) && !empty($cat))
        {
            $sql = "update `course_tbl` set `name_c` = ?, `type_c` = ?, `price_` = ?, `mini_tit` = ?, `long_tite` = ?, `type_learn` = ?, `discount` = ? where id=?";
            $res = $this->insert_query($sql,[$name,$type,$price,$mini,$full,$cat,$disc,$id]);
            if ($res)
            {
                $msg = "ok";
            }else{
                $msg = "no";
            }
        }else{
            $msg = "empty";
        }
        echo $msg;

    }
}