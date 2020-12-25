<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/19/2020
 * Time: 1:52 PM
 */
class add_cat_world extends Controller
{
    public $id_book = '';
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



    function index($id,$book_name)
    {
        if ($id=='')
        {
            header("location:".URL."add_book");
        }else{

            $user = $this->check_user($id);
            if ($user) {
                $this->id_book = $id;
                $cat_data = $this->get_cat_already($id);
                $state = $this->checks($id);
                $array_data = array($id, $cat_data, $book_name, $state, $this->id_book);
                $this->view('add_cat_for_world', $array_data);
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

    function add_cat($id)
    {
        $form = $_POST;
        $this->model->add_cat_w($id,$form);
    }
    function get_cat_already($id)
    {
        $res = $this->model->get_cat_data($id);
        return $res;
    }
    function checks($id)
    {
        $res = $this->model->check_m($id);
        return $res;
    }
    function del_cat()
    {
        $id = $_POST['id'];
        $res = $this->model->del_cat($id);
        echo $res;
    }
    function up_cat()
    {
        $this->model->up_cat($_POST);
    }
}