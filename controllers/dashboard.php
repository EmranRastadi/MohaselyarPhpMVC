<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/12/2020
 * Time: 7:29 PM
 */
class dashboard extends Controller
{
    public $check_log = '';
    function __construct()
    {
        Model::seseion_init();
        $this->check_log = Model::sesion_get("user_login");
        if ($this->check_log == false)
        {
            header("location:".URL."login");
        }
    }


    function index()
    {
        $chart = $this->get_chart_data();
        $data_all = $this->model->get_data();
        $course = $this->get_course();
        $pay_report = $this->get_payment_det();
        $ticket = $this->get_all_ticket();
        $chats = $this->get_once_chat();
        $user_date = $this->get_user_date();
        $data_out = array($data_all,$chart,$course,$pay_report,$ticket,$chats,$user_date);

        $this->view('dashboard',$data_out);
    }

    function get_user_date()
    {
        $res = $this->model->user_data($this->check_log);
        return $res;
    }

    function get_chart_data()
    {
        $res = $this->model->get_chart($this->check_log);
        return $res;
    }

    function get_course()
    {
        $res = $this->model->get_course($this->check_log);
        return $res;
    }

    function get_payment_det()
    {
        $res = $this->model->get_pay_customer($this->check_log);
        return $res;
    }

    function get_all_ticket()
    {
//        $user_you = $_POST['user_you'];
        $res = $this->model->get_all_ticket($this->check_log);
        return $res;
    }

    function get_once_chat()
    {
        $chats = '';
        if (isset($_POST['id']))
        {
            $chats = $this->model->chat_once($_POST['id']);
        }else
        {

        }
        return $chats;
    }

    function insert_tic_replay()
    {
        $data_chat = $_POST;
        $rs = $this->model->up_chat($data_chat,$this->check_log);
        print_r($rs);
    }

    function ses_dist()
    {
        unset($_SESSION['user_login']);
        session_destroy();
        echo "un";
    }
}