<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/18/2020
 * Time: 3:43 PM
 */
class add_world extends Controller
{
    public $chek_log = '';
    function __construct()
    {
        Model::seseion_init();
        $this->chek_log = Model::sesion_get('user_login');
        if ($this->chek_log)
        {

        }else
        {
            header("location:".URL);
        }
    }

    function index($id,$cat_name,$book_id)
    {
        if ($id=='')
        {
            header("location:".URL."add_book");
        }else{
            $user = $this->check_user($book_id);
            if ($user)
            {
                $state = $this->check_state($id,$book_id);
                $type_book = $this->check_types($book_id);
                $data = $this->get_data($id);
                $array_data = array($id,$data,$cat_name,$state,$type_book,$book_id);
                $this->view('add_world_page',$array_data);
            }else
            {
                header("location:".URL."add_book");
            }

        }
    }

    function check_user($book_id)
    {
        $res = $this->model->check_user($this->chek_log,$book_id);
        return $res;
    }


    function add_world($cat_id='',$book_id='',$count='')
    {
        $form = $_POST;
        $this->model->add_world_model($form,$cat_id,$book_id,$count);
    }

    function check_state($id,$book_id)
    {
        $res = $this->model->check_m($id,$book_id);
        return $res;
    }
    function check_types($book_id)
    {
        $res = $this->model->check_type($book_id);
        return $res;
    }
    function get_data($cat_id)
    {
        $res = $this->model->get_world($cat_id);
        return $res;
    }
}