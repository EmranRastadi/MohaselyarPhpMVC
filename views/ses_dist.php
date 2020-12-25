<?php
/**
 * Created by PhpStorm.
 * User: laruz
 * Date: 4/16/2020
 * Time: 11:24 PM
 */
if (isset($_POST['ses_clear']))
{
    $url = $_GET['url'];
    $explo = explode("/",$url);
    $con = $explo[1];
    $mod = $explo[2];
}else{
    header("location:".URL."".$con."/".$mod);
}