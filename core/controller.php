<?php
/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/12/2020
 * Time: 4:20 PM
 */

class Controller
{
    function __construct()
    {
    }

    function view($viewUrl,$data=[])
    {
//        require ('top_header.php');
        require('views/'.$viewUrl.'.php');
//        require ('sidebar.php');
    }

    function model($modelUrl)
    {
        require ('models/model_'.$modelUrl.'.php');
        $clss_name = 'model_'.$modelUrl;
        $this->model= new $clss_name;
    }
}