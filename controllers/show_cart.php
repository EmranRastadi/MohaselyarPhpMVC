<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/2/2020
 * Time: 12:19 PM
 */
class show_cart extends Controller
{
    function __construct()
    {
    }
    function index()
    {
        $basket = $this->get_basket();
        $data = array($basket);
        $this->view('show_cart',$data);
    }
    function get_basket()
    {
        $res = $this->model->get_cookie_pro();
        return $res;
    }
    function del_pro()
    {
        $this->model->del_pro($_POST);
    }
}