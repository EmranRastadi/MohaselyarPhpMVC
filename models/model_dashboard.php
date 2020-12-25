<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/13/2020
 * Time: 10:23 PM
 */
class model_dashboard extends Model
{
    private $userId;

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function get_data()
    {
//        $val = array();
//        $sql = $this->select_query($sql,)
    }


    function get_pay_customer($user_id)
    {
        $res_c = $this->get_course($user_id);

        $customer = array();
        $total_pay = 0;
        $count_pay = 0;
        $result = array();
        $user_full_customer = array();


        foreach ($res_c as $item) {
            $sql = "select * from `payment_tbm` where `c_id_` = ?";
            $params = array($item['id']);
            $res = $this->select_query($sql, $params);
            foreach ($res as $value) {
                $sqls = "select * from `user_detail` where `id` = ? ";
                $params_u = array($value['use_id_']);
                $res_u = $this->select_query($sqls, $params_u ,'fetch');
                $user_data = array();
                $user_data['names'] = $res_u['name'] . " " . $res_u['fam'];
                $user_data['img'] = $res_u['profile_img'];
                $user_data['date'] = $value['date_pay__'];
                $user_full_customer[$res_u['id']] = $user_data;
                $total_pay = $total_pay + $value['mablag_'];
                $count_pay++;
            }
        }

        $result['total_pay'] = $total_pay;
        $result['count_pay'] = $count_pay;
        $result['user_data'] = $user_full_customer;



        return $result;
    }

    function get_chart($user_id)
    {
        $chart_str = '';
        $res_c = $this->get_course($user_id);
        $resid = array();
        $str_res = '';
        foreach ($res_c as $val) {
            $sql = "select * from `payment_tbm` where `c_id_` = ?";
            $params = array($val['id']);
            $res = $this->select_query($sql, $params);

            $mon = '';
            $year = '';
            $chart_data = '';
            foreach ($res as $vals) {
                $date = $vals['date_pay__'];
                $res_date = explode('/', $date);
                $mon = $res_date[1];
                $amount = 0;
                $year = $res_date[0] . "-" . $mon;
                $amount = $amount + $vals['mablag_'];
                $str_res = $str_res . "{ m: '" . $year . "', a: " . $amount . "}, ";
            }


        }


        $str_res = substr($str_res, 0, -2);
//        return json_encode($resid);
        return $str_res;

    }

    function get_user_data($user_id)
    {
        $sql = "select * from `user_detail` where `melli` = ?";
        $params = array($user_id);
        $res = $this->select_query($sql, $params, 'fetch');
        return $res;
    }

    function get_course($user_id)
    {
        $users = $this->get_user_data($user_id);
        $sql = "select * from `course_tbl` where `author_id` = ? and `m_state` = 1";
        $params = array($users['id']);
        $res = $this->select_query($sql, $params);
        return $res;
    }

    function get_all_ticket($user_me)
    {
        $sql = "select * from `ticket_tbl` where `resiver` = ?";
        $params = array($user_me);
        $res_ticket_for_me = $this->select_query($sql,$params);

        $user_det_send = array();
        $user_sender = array();
        $result = array();
        foreach ($res_ticket_for_me as $item) {
            $sqls = "select * from `user_detail` where `melli` = ?";
            $param_sender = array($item['sender']);
            $res_send = $this->select_query($sqls,$param_sender,'fetch');
            $user_det_send['names'] = $res_send['nic_name'];
            $user_det_send['img'] = $res_send['profile_img'];
            $user_det_send['id'] = $res_send['id'];
            array_push($user_sender,$user_det_send);
        }

        $result['users'] = $user_sender;
        $result['tickets'] = $res_ticket_for_me;

        return $result;
    }
    function chat_once($chat_id)
    {

        $sql = "select * from `ticket_tbl` where `id` = ?";
        $params = array($chat_id);
        $res = $this->select_query($sql,$params,'fetch');
        $sql_send = "select * from `user_detail` where `melli` = ? ";
        $res_send = $this->select_query($sql_send,[$res['sender']],'fetch');
        $res_resiver = $this->select_query($sql_send,[$res['resiver']],'fetch');



        $sender_name = $res_send['name']." ".$res_send['fam'];
        $sender_img = $res_send['profile_img'];
        $sender_code = [$res['sender']];
        $resiver_name = $res_resiver['nic_name'];
        $resiver_img = $res_resiver['profile_img'];
        $resiver_code = [$res['resiver']];

        $res['sender_name'] = $sender_name;
        $res['sender_code'] = $sender_code;
        $res['resiver_name'] = $resiver_name;
        $res['resiver_code'] = $resiver_code;
        $res['resiver_img'] = $resiver_img;
        $res['sender_img'] = $sender_img;

        echo json_encode($res);

//        echo json_encode($res);
    }

    function user_data($user_id)
    {
        $sql = "select * from `user_detail` WHERE `melli` = ?";
        $res = $this->select_query($sql,[$user_id],'fetch');
        return $res;
    }
    function up_chat($form,$user_sender)
    {
        $chat_det = array();
        $chat_id = $form['chat_id'];
        $chat_text = $form['text'];
        $chat_date = $form['date'];
        $data_new[0] = $chat_date;
        $data_new[1] = $chat_text;
        $data_new[2] = $user_sender;
        $sql = "select * from `ticket_tbl` where `id`= ?";
        $res = $this->select_query($sql,[$chat_id],'fetch');

        $last_data = json_decode($res['data']);
        $last_data[sizeof($last_data)]=$data_new;
//        print_r($last_data);
        $new_datas = json_encode($last_data,JSON_UNESCAPED_UNICODE);
//        $new_data = array(
//            $chat_date,
//            $chat_text,
//            $user_sender
//        );

//        echo $new_datas;



//        $str_data = substr($res['data'],0,-1).",".json_encode($new_data,JSON_UNESCAPED_UNICODE )."]";


//        $chat_det = json_decode($res['data']);
//        array_push($chat_det,$data_new);
////        print_r($chat_det);
//
//        $new_data = json_encode($chat_det);


        $sql_up = "UPDATE `ticket_tbl` set `data`='".$new_datas."' where `id`= ? ";
        $res_up = $this->insert_query($sql_up,[$chat_id]);
        if ($res_up)
        {
            echo "ok";
        }else
        {
            echo "error";
        }
//        echo $user_sender;
    }
}
