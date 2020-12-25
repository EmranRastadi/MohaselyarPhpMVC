<?php
/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/21/2020
 * Time: 5:54 PM
 */

class profile extends Controller
{
    public $user_id = '';
    function __construct()
    {
        Model::seseion_init();
        $this->user_id = Model::sesion_get('user_login');
        if ($this->user_id == false)
        {
            header("location:".URL."login");
        }
    }
    function index()
    {
        $pay_rep = $this->get_payment_det();
        $user_data = $this->get_user_pro();
        $tickect = $this->get_ticket();
        $data = array($user_data,$pay_rep,$tickect);
        $this->view('profile',$data);
    }

    function get_user_pro()
    {
        $res = $this->model->user_get_data($this->user_id);
        return $res;
    }
    function update_user_data()
    {
        $this->model->update_user($_POST,$this->user_id);
    }

    function get_ticket()
    {
        $res = $this->model->get_ticket($this->user_id);
        return $res;
    }

    function get_payment_det()
    {
        $res = $this->model->get_pay_customer($this->user_id);
        return $res;
    }
    function update_pass_data()
    {
        $this->model->change_pass($_POST,$this->user_id);
    }
    function get_cust_pay()
    {
        $res = $this->model->get_pay_user($_POST['id'],$this->user_id);
    }

    function pro_img_update()
    {
        $this->model->update_mage_($_POST,$this->user_id);
    }
}