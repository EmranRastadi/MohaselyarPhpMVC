<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/11/2020
 * Time: 4:48 PM
 */
class setting_main extends Controller
{
    public $check = '';
    function __construct()
    {
        Model::seseion_init();
        $this->check = Model::sesion_get('user_login');
        if ($this->check != '4240378133')
        {
            header("location:".URL."er404");
        }
    }
    function index()
    {
        $comp = $this->get_comp();
        $users = $this->get_users();
        $pro = $this->get_product();
        $comment = $this->get_comment();
        $this->view('setting_main',[$users,$pro,$comment,$comp]);
    }

    function get_users()
    {
        $res = $this->model->get_user();
        return $res;
    }
    function get_product()
    {
        $res = $this->model->get_product();
        return $res;
    }

    function get_comment()
    {
        $res = $this->model->get_comment();
        return $res;
    }
    function del_com()
    {
        $id = $_POST['id'];
        $this->model->del_com($id);
    }
    function up_com()
    {
        $id = $_POST['id'];
        $this->model->up_com($id);
    }
    function up_add()
    {
        $this->model->up_add($_POST);
    }
    function get_comp()
    {
        $res = $this->model->get_add_com();
        return $res;
    }
    function add_all_msg()
    {
        $this->model->add_all_msg($_POST);
    }
    function add_top_manager()
    {
        $id = $_POST['id'];
        $this->model->add_top_manager($id);
    }
    function up_top_manager()
    {
        $id = $_POST['id'];
        $this->model->up_top_manager($id);
    }
}