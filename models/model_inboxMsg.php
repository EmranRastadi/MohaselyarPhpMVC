<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/28/2020
 * Time: 10:39 PM
 */
class model_inboxMsg extends Model
{
    function __construct()
    {
        parent::__construct();
    }


    function send_ticket($form, $user_name)
    {
        $rec = $form['recivers'];
        $sub = $form['subject'];
        $desc = $form['desc_tic'];
        $alert = '';
        if (!empty($rec) && !empty($sub) && !empty($desc)) {

            if (!empty($_FILES['tic_image']['name'])) {
                $img = $_FILES['tic_image']['name'];
                $rand_dir = rand(0, 999) . round(microtime(), 0);
                $file_path_db = 'public/course_/comments/' . $rand_dir . '/' . $img;
                $file_dir = 'public/course_/comments/' . $rand_dir . '/';
                $type_img = strtolower(pathinfo($file_path_db, PATHINFO_EXTENSION));
                if ($type_img != 'jpeg' && $type_img != 'jpg' && $type_img != 'png') {
                    $alert = "type";
                } else {
                    if ($_FILES['tic_image']['size'] > 100000) {
                        $alert = "size";
                    } else {
                        mkdir($file_dir);
                        if (move_uploaded_file($_FILES['tic_image']['tmp_name'], $file_path_db)) {
                            $time = jdate('Y/m/d');
                            $reciver_arr = explode('/', $rec);
                            foreach ($reciver_arr as $value) {
                                $sql = "INSERT INTO `ticket_tbl` (`sender`, `resiver`, `title`, `date`, `img_s`,`desc_tic`)
                             VALUES (?,?,?,?,?,?);";
                                $params = array($user_name, $value, $sub, $time, $file_path_db, $desc);
                                $res = $this->insert_query($sql, $params);
                                if ($res) {
                                    $alert = "uploaded";
                                }
                            }
                        } else {
                            $alert = "upload_error";
                        }
                    }
                }
            } else {

                $time = jdate('Y/m/d');
                $reciver_arr = explode('/', $rec);
                foreach ($reciver_arr as $value) {
                    $sql = "INSERT INTO `ticket_tbl` (`sender`, `resiver`, `title`, `date`, `desc_tic`)
                             VALUES (?,?,?,?,?);";
                    $params = array($user_name, $value, $sub, $time, $desc);
                    $res = $this->insert_query($sql, $params);
                    if ($res) {
                        $alert = "uploaded";
                    }
                }
            }

        } else {
            $alert = "empty";
        }

        echo $alert;

    }
}