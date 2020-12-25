<?php
/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/24/2020
 * Time: 9:36 AM
 */
class inboxMsg extends Controller
{
    private $user_name = '';
    function __construct()
    {
        Model::seseion_init();
        $this->user_name = Model::sesion_get('user_login');
        if ($this->user_name == false)
        {
            header("location:".URL."index");
        }else
        {
        }
    }
    function index()
    {
        $data = array(12);
        $this->view('inbox_page',$data);
    }

    function write_new_msg()
    {
        $this->model->send_ticket($_POST,$this->user_name);
    }
}