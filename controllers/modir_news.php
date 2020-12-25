<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/2/2020
 * Time: 12:23 AM
 */
class modir_news extends Controller
{
    public $user_id = '';
    function __construct()
    {
        Model::seseion_init();
        $this->user_id = Model::sesion_get('user_login');
        if ($this->user_id != false)
        {

        }else{
            header("location:".URL);
        }
    }
    function index()
    {
        $user_news = $this->get_news_user();
        $news = $this->get_news();
        $this->view('modir_news',[$news,$user_news]);
    }

    function get_news()
    {
        $res = $this->model->get_news($this->user_id);
        return $res;
    }
    function del_mm_new()
    {
        $this->model->del_mm_new($_POST);
    }
    function get_news_user()
    {
        $res = $this->model->get_news_user($this->user_id);
        return [$res,$this->user_id];
    }
    function up_news_view()
    {
        $news_id = $_POST['id'];
        $this->model->up_news_view($this->user_id,$news_id);
    }
}