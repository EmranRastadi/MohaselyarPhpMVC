<?php

/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/1/2020
 * Time: 2:12 PM
 */
class model_shop extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_product($form)
    {
        $sort_str = '';
        $cat_str = '';
        $params = [];
        if (isset($form['cat']) && $form['cat'] != '') {
            $cat_ = $form['cat'];
            $cat_str = ' where `type_c` = ' . $cat_;
            $params = [$cat_];
        }
        if (isset($form['order']) && $form['order'] != '') {
            $cond_sort = '';
            switch ($form['order']) {
                case 0:
                    $cond_sort = 'price_ DESC';
                    break;
                case 1:
                    $cond_sort = 'price_ ASC';
                    break;
                case 3:
                    $cond_sort = 'discount DESC';
                    break;

            }
            $sort_str = " ORDER BY " . $cond_sort;
        }

        $search_cond = '';
        if (isset($form['search']) && !empty($form['search'])) {
            if (!isset($form['cat']) || empty($form['cat'])) {
                $str_search = "'%" . $form['search'] . "%'";
                $search_cond = "where `mini_tit` LIKE " . $str_search;
            } else if (isset($form['cat']) && !empty($form['cat'])) {
                $str_search = "'%" . $form['search'] . "%'";
                $search_cond = " and  `mini_tit` LIKE " . $str_search;
            }

        }
        $sql = "select * from `course_tbl` " . $cat_str . " " . $search_cond . " " . $sort_str;
        $res = $this->select_query($sql, $params);
        for ($i = 0; $i < sizeof($res); $i++) {
            $amount_by_dis = 0;
            $rat = $this->get_comment($res[$i]['id']);
            if ($res[$i]['discount'] != 0) {
                $amount_by_dis = $res[$i]['price_'] - (($res[$i]['discount'] * $res[$i]['price_']) / 100);
            }
            $res[$i]['dis'] = $amount_by_dis;
            $res[$i]['rate'] = $rat;
        }
        echo json_encode($res);
    }

    function get_comment($pro_id)
    {
        $sql = "select * from `comment_tbm` where `course_id` = ?";
        $res = $this->select_query($sql, [$pro_id]);
        $tot_avg_rat = 0;
        $tot_count = sizeof($res);
        $rates = array();
        if (sizeof($res) > 0) {
            foreach ($res as $val) {
                $tot_avg_rat = $tot_avg_rat + substr($val['rating_'], 0, -1);
                $ratting = round($tot_avg_rat / $tot_count);
            }
            return $ratting;
        } else {
            return '2';
        }
    }

    function model_get_cat()
    {
        $sql = "select * from `course_type`";
        $res = $this->select_query($sql, []);
        return $res;
    }

    function get_pro_det($form)
    {
        $sql = "select * from `course_tbl` where id=?";
        $res = $this->select_query($sql, [$form], 'fetch');
        $amount_by_dis = 0;
        $rat = $this->get_comment($res['id']);
        if ($res['discount'] != 0) {
            $amount_by_dis = $res['price_'] - (($res['discount'] * $res['price_']) / 100);
        }
        $res['dis'] = $amount_by_dis;
        $res['rate'] = ($rat * 100) / 5;

        echo json_encode($res);
    }

    function add_to_basket($id)
    {
        $cookie = self::set_cookie();

        $sql = "select * from `basket_tbm` where `cookie__` = ? ";
        $res = $this->select_query($sql, [$cookie], 'fetch');

        if ($res) {
            $cookie_last = json_decode($res['pro_ids']);
            $sql_u = "update `basket_tbm` set `pro_ids`=? WHERE `cookie__` = ? ";
            $cookie_last[sizeof($cookie_last)] = $id;
            $res_u = $this->insert_query($sql_u,[json_encode($cookie_last),$cookie]);
            if ($res_u)
            {
                echo "ok";
            }

        } else {
            $sql_i = "insert into `basket_tbm` (`cookie__`,`pro_ids`) VALUES (?,?)";
            $pro_arr = [$id];
            $res_i = $this->insert_query($sql_i, [$cookie, json_encode($pro_arr)]);
            if ($res_i) {
                echo "ok";
            }
        }
//        $sql = "insert into `basket_tbm` "
    }
}