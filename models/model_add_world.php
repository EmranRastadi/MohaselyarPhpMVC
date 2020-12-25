<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/18/2020
 * Time: 3:43 PM
 */
class model_add_world extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function check_m($id, $book_id)
    {
        $sql = "select * from `world_cat__` where id=? and cat_id__ = ? AND m_state='1'";
        $params = array($id, $book_id);
        $rs = $this->check_status($sql, $params);
        return $rs;
    }

    function check_type($book_id)
    {
        $sql = "select * from `course_tbl` where `id`=?";
        $params = array($book_id);
        $res = $this->select_query($sql, $params, 'fetch');
        return $res['type_learn'];
    }

    function add_world_model($form, $cat_world, $course_t, $counters)
    {
        $msg = '';
        for ($i = 0; $i < $counters; $i++) {
            $translate = $_POST['translate_world_' . $i];
            $c_name = $_POST['name_world_' . $i];
            $rand_world_name = rand(0, 9999) . round(microtime());

            if (!empty($translate) && !empty($c_name) && !empty($_FILES['image_upload_' . $i]['name']) && !empty($_FILES['voise_upload_' . $i]['name'])) {

                $dir_target_image = "public/course_/world__/" . $course_t . "/" . $cat_world . "/" . $rand_world_name . "/";
                $dir_target_images = "course_/world__/" . $course_t . "/" . $cat_world . "/" . $rand_world_name . "/";
                $images_direction = $dir_target_image . basename($_FILES['image_upload_' . $i]['name']);
                $images_directions = $dir_target_images . basename($_FILES['image_upload_' . $i]['name']);
                $voise_direction = $dir_target_image . basename($_FILES['voise_upload_' . $i]['name']);
                $voise_directions = $dir_target_images . basename($_FILES['voise_upload_' . $i]['name']);
                $image_name_wp = strtolower(pathinfo($images_direction, PATHINFO_EXTENSION));
                $voise_name_wp = strtolower(pathinfo($voise_direction, PATHINFO_EXTENSION));
                $image_type = getimagesize($_FILES['image_upload_' . $i]['tmp_name']);
                //            $voise_getters = $_FILES['voise_upload_' . $i]['size'];
                if ($image_type !== false) {
                    if ($image_name_wp != "jpg" && $image_name_wp != "jpeg" && $image_name_wp != "png" && $voise_name_wp != "mp3") {
                        $msg = "type";
                        $upload_state = 0;
                    } else {
                        $upload_state = 1;
                        if (!file_exists($dir_target_image)) {
                            $upload_state = 1;
                            if ($_FILES['image_upload_' . $i]['size'] >= 100000) {
                                $msg = "size";
                                $upload_state = 0;
                            } else {
                                $upload_state = 1;
                                if (!file_exists("public/course_/world__/" . $course_t)) {
                                    mkdir("public/course_/world__/" . $course_t);
                                    mkdir("public/course_/world__/" . $course_t . "/" . $cat_world);
                                    mkdir("public/course_/world__/" . $course_t . "/" . $cat_world . "/" . $rand_world_name);
                                } else {
                                    if (!file_exists("public/course_/world__/" . $course_t . "/" . $cat_world)) {
                                        mkdir("public/course_/world__/" . $course_t . "/" . $cat_world);
                                        mkdir("public/course_/world__/" . $course_t . "/" . $cat_world . "/" . $rand_world_name);
                                    } else {
                                        if (!file_exists("public/course_/world__/" . $course_t . "/" . $cat_world . "/" . $rand_world_name)) {
                                            mkdir("public/course_/world__/" . $course_t . "/" . $cat_world . "/" . $rand_world_name);
                                        }
                                    }

                                }


                                if (move_uploaded_file($_FILES['image_upload_' . $i]['tmp_name'], $images_direction)) {
                                    if (move_uploaded_file($_FILES['voise_upload_' . $i]['tmp_name'], $voise_direction)) {
                                        $msg = "ok";
                                        $sql = "INSERT INTO `world__tbm` ( `name__`, `voice__`, `mage__`, `cat_id__`,`translate`,`world_cat_`,`book_id`,`m_state`) 
                VALUES (?, ?, ?, ?,?,? ,?,1);";
                                        $params = array($c_name, $voise_directions, $images_directions, $course_t, $translate, $cat_world, $course_t);
                                        $res = $this->insert_query($sql, $params);
                                        if ($res) {
                                            $msg = "ok";
                                        } else {
                                            $msg = "err";
                                        }
                                    } else {
                                        $msg = "err";
                                    }


                                } else {
                                    $msg = "err";
                                }

                            }
                        } else {

                        }
                    }

                }

            } else {
                $msg = "empty";
            }
        }
        echo $msg;

    }

    function get_world($cat_id)
    {
        $sql = "select * from `world__tbm` where `world_cat_` = ?";
        $param = array($cat_id);
        $res = $this->select_query($sql,$param);
        return $res;
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



}