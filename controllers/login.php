<?php
/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/11/2020
 * Time: 11:32 PM
 */
class login extends Controller
{
    private $user_id = '';
    function __construct()
    {

    }

    function index($name='',$family='')
    {
       $this->view('login');
    }

    function login_check()
    {
        $inputs = $_POST;
        $res = $this->model->login_check_m($inputs);
    }

    function check_phone()
    {
        $phone = $_POST['phone'];
        $res = $this->model->check_phone_true($phone);
       if (sizeof($res)>0)
       {
           echo "exist";
       }else
       {
           echo "new";
       }
    }

    function forget_pass()
    {
        $this->model->forget_pass($_POST);
    }

}