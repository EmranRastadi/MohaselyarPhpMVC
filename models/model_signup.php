<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/14/2020
 * Time: 11:21 AM
 */
class model_signup extends Model
{
    function __construct()
    {
        parent::__construct();
        Model::seseion_init();
    }
    function check_sign($form)
    {
        $name = $form['name'];
        $fam = $form['fame'];
        $melli = $form['melli'];
        $phone = $form['phone'];
        $code_phone = $form['code_phone'];
        $pass = $form['pass'];
        $re_pass = $form['re_pass'];
        if (!empty($name) && !empty($fam) && !empty($melli) && !empty($phone) && !empty($code_phone) && !empty($pass) && !empty($re_pass))
        {
            if (sizeof(str_split($pass)) > 8)
            {
                if ($pass == $re_pass)
                {
                    $sql_verify = "select * from `verificate_phone` where phone = ? AND verify_code= ?";
                    $res_verify = $this->select_query($sql_verify,[$phone,$code_phone],'fetch');
                    if ($res_verify)
                    {
                        $sql_p = "update `verificate_phone` set state = '1' where phone=?";
                        $this->insert_query($sql_p,[$phone]);

                        $sql_u = "select * from `user_detail` where `melli` = ? or `phone` =?";
                        $res_u = $this->select_query($sql_u,[$melli,$phone],'fetch');
                        if (!$res_u)
                        {
                            $date = jdate("Y/m/F/d", '', '', '', 'en');
                            $hash_pp =  md5($pass."emranLaruzSDRast~").md5("mygoodlkjhuhkh~");
                            $ins = "insert into `user_detail` (`name`,`fam`,`melli` ,`phone`,`pass`,`date_reg`) VALUES (?,?,?,?,?,?)";
                            $res_ins = $this->insert_query($ins,[$name,$fam,$melli,$phone,$hash_pp,$date]);
                            if ($res_ins)
                            {
                                Model::session_set("user_login" , $melli);
                                echo "ok";
                            }else{
                                echo "no";
                            }
                        }else
                        {
                            echo "exist";
                        }
                    }else{
                        echo "verify";
                    }
                }else
                {
                    echo "match";
                }
            }else{
                echo "lenght";
            }

        }else
        {
            echo "empty";
        }
    }

    function check_code($form)
    {

        $msg = '';
        $phone = $form['phone'];
        if (!empty($phone))
        {
            if (preg_match('/^[0-9]+$/',$phone) && sizeof(str_split($phone))== 11)
            {
                $today = jdate('Y/m/d','','','','en');
                $sql_s = "select * from  `verificate_phone` where `phone` = ?";
                $res_s = $this->select_query($sql_s,[$phone],'fetch');
                if ($res_s)
                {
                    $date_all = json_decode($res_s['date_in'],true);
                    $counts = array_count_values($date_all);
                    if (array_key_exists($today,$counts))
                    {
                        $val = $counts[$today];
                        if ($val<4)
                        {
                            if ($val < 3)
                            {
                                array_push($date_all,$today);
                                $sql_u = "update `verificate_phone` set `date_in`='".json_encode($date_all)."' where phone = ? ";
                                $res_u = $this->insert_query($sql_u,[$phone]);
                                if ($res_u)
                                {
                                    // send sms function
                                    $msg = "ok";
                                }else
                                {
                                    $msg = "err";
                                }
                            }else if ($val == 3)
                            {
                                array_push($date_all,$today);
                                $sql_u = "update `verificate_phone` set `date_in`='".json_encode($date_all)."' where phone = ? ";
                                $res_u = $this->insert_query($sql_u,[$phone]);
                                if ($res_u)
                                {
                                    $msg = "final";
                                    // send sms function
                                }else
                                {
                                    $msg = "err";
                                }
                            }else
                            {
                                $msg ="err";
                            }

                        }else
                        {
                            $msg = "allow";
                        }
                    }else{
                        array_push($date_all,$today);
                        $sql_u = "update `verificate_phone` set `date_in`='".json_encode($date_all)."' where phone = ? ";
                        $res_u = $this->insert_query($sql_u,[$phone]);
                        if ($res_u)
                        {
                            //   send sms function
                            $msg = "ok";
                        }else
                        {
                            $msg = "err";
                        }
                    }

                }else{
                    $array_date = json_encode([$today]);
                    $code_= round(rand(0,999999).microtime(),0);
                    $sql_new = "insert into `verificate_phone` (`phone`,`verify_code`,`state`,`date_in`) VALUES (?,?,?,?)";
                    $res = $this->insert_query($sql_new,[$phone,$code_,0,$array_date]);
                    if ($res)
                    {
                        // send sms function
                        $msg = "ok";
                    }else
                    {
                        $msg = "err";
                    }
                }
            }else
            {
                $msg = "type";
            }
        }else{
            $msg = "empty";
        }

        echo $msg;
    }
}