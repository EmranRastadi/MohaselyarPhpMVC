<?php
/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 3/11/2020
 * Time: 11:32 PM
 */


class App
{
    public $controller = 'Index';
    public $method = 'index';
    public $params=[];
    function  __construct()
    {
        if (isset($_GET['url']))
        {
            $url = $_GET['url'];
            $urls = $this->pars_url($url);
            $this->controller = $urls[0];
            unset($urls[0]);
            if (isset($urls[1]) && $urls[1] != '')
            {
                $this->method = $urls[1];
                unset($urls[1]);
            }

            $this->params = array_values($urls);
        }

        $controlerUrl = "controllers/".$this->controller.".php";
        if (file_exists($controlerUrl))
        {
            require($controlerUrl);
            $object = new $this->controller;
            $object->model($this->controller);
            if (method_exists($object,$this->method))
            {
                call_user_func_array([$object,$this->method],$this->params);
            }else
            {
                require("controllers/er404.php");
                new er404();
            }
        }else
        {
            require("controllers/er404.php");
            new er404();
        }
    }

    function pars_url($url)
    {
        $url_a = explode('/' , $url);
        return $url_a;
    }
}