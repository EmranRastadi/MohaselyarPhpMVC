<?php
/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/14/2020
 * Time: 11:20 AM
 */

class signup extends Controller{
    function __construct()
    {
    }
    function index()
    {
        $data = array();
        $this->view('signup',$data);
    }
    function check_sign()
    {
        $this->model->check_sign($_POST);
    }
    function check_code()
    {
        $this->model->check_code($_POST);
    }
}