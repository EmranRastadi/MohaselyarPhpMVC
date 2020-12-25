<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/1/2020
 * Time: 12:37 AM
 */
class index extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $res= $this->get_data();
        $top_user = $this->get_user_top();
        $pro_top = $this->get_top_pro();
        $tot_count = $this->get_total_count();
        $data = array($res,$top_user,$pro_top,$tot_count);
        $this->view('index',$data);
    }

    function get_data()
    {
        $res = $this->model->get_data();
        return $res;
    }
    function get_user_top()
    {
        $res = $this->model->get_user_top();
        return $res;
    }
    function get_top_pro()
    {
        $res = $this->model->get_pro_top();
        return $res;
    }
    function get_total_count()
    {
        $res = $this->model->get_tot_count();
        return $res;
    }


}