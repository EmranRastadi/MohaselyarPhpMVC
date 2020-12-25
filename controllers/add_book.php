<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/17/2020
 * Time: 9:33 PM
 */
class add_book extends Controller
{
    public $user_id = '';
    function __construct()
    {
        Model::seseion_init();
        $this->user_id = Model::sesion_get("user_login");
        if ($this->user_id == false)
        {
            header("location:".URL."index");
        }
    }

    function index()
    {
        $cat_data = $this->get_cat_book();
        $book_list = $this->get_book();
        $del_state = $this->del_book();
        $array_data = array($cat_data,$book_list,$del_state);
        $this->view('add_book_page', $array_data);
    }

    function add_book()
    {
        $form = $_POST;
        $this->model->add_book_fun($form);
    }

    function get_cat_book()
    {
        $res = $this->model->get_cat_book_sh();
        return $res;
    }
    function get_book()
    {
        $res = $this->model->get_book_list($this->user_id);
        return $res;
    }
    function del_book()
    {
        if (isset($_POST['id']))
        {
            $id = $_POST['id'];
            $res = $this->model->del_book_in($id);
            return $res;
        }else
        {
            return '';
        }

    }

    function update_book()
    {
        $this->model->update_book($_POST);
    }

}