<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/1/2020
 * Time: 2:11 PM
 */
class shop extends Controller
{
    function __construct()
    {
    }
    function index()
    {
//        $products = $this->get_product();
        $cat = $this->get_cat();
        $data = array($cat);
        $this->view('shop',$data);
    }
    function get_product()
    {
        $data_in = $_POST;
        $res = $this->model->get_product($data_in);
    }
    function get_cat()
    {
        $res = $this->model->model_get_cat();
        return $res;
    }

    function get_product_det()
    {
        $form = $_POST['proid'];
        $this->model->get_pro_det($form);
    }
    function add_to_basket()
    {
        $this->model->add_to_basket($_POST['id']);
    }
}