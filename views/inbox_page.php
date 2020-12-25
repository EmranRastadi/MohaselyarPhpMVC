<?php


?>


<!doctype html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public/dist/js/jquery.js"></script>
    <link rel="stylesheet" href="public/dist/css/all.css"/>
    <link rel="stylesheet" href="public/dist/css/morris.css"/>
    <link rel="stylesheet" href="public/dist/css/materialize.min.css"/>
    <link rel="stylesheet" href="public/style.css"/>

    <title>Document</title>


</head>
<body>

<?php
require 'menu_top.php';
?>


<div class="section">

    <div class="row">

        <div class="col s12">

            <div style="direction:rtl;width: 100%;float: right;text-align: right;font-size: 21px;color: #fff;margin-right: 20px;">
                <a href="dashboard" style="color: #28a745;">داشبورد</a>
                <a style="color: #28a745;">/</a>
                <a href="#">افزودن کتاب جدید</a>
            </div>

        </div>


        <div class="col s12" >

            <div class="row">


                <div class="col s12 m9 l7" style="margin-top: 20px;">



                    <ul class="boxing_page" style="margin: 0px;padding: 0px;">

                        <li class="resived_msggg box_deactive" id="send_box_editor">

                            <div style="width: 100%;height: 45px;float: right;border-bottom: 1px solid #39618a;">
                    <span style="float: right;margin-right: 15px;margin-top: 8px;color: #fff;font-size: 14px;font-weight: bold;">
                        پیام های دریافتی
                    </span>

                                <div id="search_box">

                                    <input type="text" placeholder="جستجو کنید..."/>
                                    <span>
                            <i style="margin-top: 7px" class="fa fa-search"></i>
                        </span>

                                </div>

                            </div>


                            <div style="width: 100%;height: 45px;float: right">

                                <div id="msg_paginig">

                        <span style="border-right: 1px solid #ffd600;" class="tooltipped" data-tooltip="صفحه قبل"
                              data-position="top">
                            <i class="fa fa-chevron-left" style="margin-top: 8px;"></i>
                        </span>
                                    <span class="active_page tooltipped" data-position="top" data-tooltip="صفحه بعد">
                             <i class="fa fa-chevron-right" style="margin-top: 8px;"></i>
                        </span>
                                </div>

                                <span style="float: left;margin-left: 8px;color: #ffd600;margin-top: 12px;font-size: 13px;">
                        1 - 50 / 200
                    </span>


                                <div id="right_msg_mini_box"
                                     style="background: none;border: none;margin-left: 15px;margin-top: 12px;">
                                    <label>
                                        <input type="checkbox" id="checked_all" class="filled-in"/>
                                        <span></span>
                                    </label>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top" data-tooltip="حذف پیام">
                                    <i class="fa fa-trash" style="margin-top: 7px;"></i>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top"
                                     data-tooltip="بروز رسانی صفحه">
                                    <i class="fa fa-recycle" style="margin-top: 7px;"></i>
                                </div>


                            </div>


                            <table class="striped" style="direction: rtl">

                                <tbody>

                                <tr>
                                    <td style="width: 35px;">
                                        <label>
                                            <input type="checkbox" name="check_0" id="check_del"
                                                   class="filled-in checkbox-orange"/>
                                            <span></span>
                                        </label>
                                    </td>

                                    <td id="username">emran rastadi</td>
                                    <td id="desc">
                                        <a style="color: #000 !important;" href="#">
                                            <span style="font-size: 14px;font-weight: bold;">همایش کتاب و رسانه</span>-
                                            برای برگزاری بهتر ای کاش یکسری کارها انجام نمیشد و ای کاش یکسری کار های حتما انجام
                                            میشد
                                            تا به چنگ نریم و بهتر برگزار بشه

                                        </a>

                                    </td>

                                    <td>
                                        <i style="color: #000;font-size: 15px;" class="fa fa-file-archive"></i>
                                    </td>


                                    <td class="tooltipped" data-position="top" data-tooltip="افزودن به علاقه مندی">

                                        <i style="font-size: 17px;color: #fff;cursor: pointer" class="fa fa-star"></i>

                                    </td>


                                    <td>
                                        27 ساعت پیش
                                    </td>
                                </tr>



                                </tbody>
                            </table>


                        </li>


                        <li class="send_msggg" id="send_box_editor">

                            <div style="width: 100%;height: 45px;float: right;border-bottom: 1px solid #39618a;">
                    <span style="float: right;margin-right: 15px;margin-top: 8px;color: #fff;font-size: 14px;font-weight: bold;">
                        پیام های دریافتی
                    </span>

                                <div id="search_box">

                                    <input type="text" placeholder="جستجو کنید..."/>
                                    <span>
                            <i style="margin-top: 7px" class="fa fa-search"></i>
                        </span>

                                </div>

                            </div>


                            <div style="width: 100%;height: 45px;float: right">

                                <div id="msg_paginig">

                        <span style="border-right: 1px solid #ffd600;" class="tooltipped" data-tooltip="صفحه قبل"
                              data-position="top">
                            <i class="fa fa-chevron-left" style="margin-top: 8px;"></i>
                        </span>
                                    <span class="active_page tooltipped" data-position="top" data-tooltip="صفحه بعد">
                             <i class="fa fa-chevron-right" style="margin-top: 8px;"></i>
                        </span>
                                </div>

                                <span style="float: left;margin-left: 8px;color: #ffd600;margin-top: 12px;font-size: 13px;">
                        1 - 50 / 200
                    </span>


                                <div id="right_msg_mini_box"
                                     style="background: none;border: none;margin-left: 15px;margin-top: 12px;">
                                    <label>
                                        <input type="checkbox" id="checked_all" class="filled-in"/>
                                        <span></span>
                                    </label>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top" data-tooltip="حذف پیام">
                                    <i class="fa fa-trash" style="margin-top: 7px;"></i>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top"
                                     data-tooltip="بروز رسانی صفحه">
                                    <i class="fa fa-recycle" style="margin-top: 7px;"></i>
                                </div>


                            </div>


                            <table class="striped" style="direction: rtl">

                                <tbody>

                                <tr>
                                    <td style="width: 35px;">
                                        <label>
                                            <input type="checkbox" name="check_0" id="check_del"
                                                   class="filled-in checkbox-orange"/>
                                            <span></span>
                                        </label>
                                    </td>

                                    <td id="username">emran rastadi</td>
                                    <td id="desc">
                                        <a style="color: #000 !important;" href="#">
                                            <span style="font-size: 14px;font-weight: bold;">همایش کتاب و رسانه</span>-
                                            برای برگزاری بهتر ای کاش یکسری کارها انجام نمیشد و ای کاش یکسری کار های حتما انجام
                                            میشد
                                            تا به چنگ نریم و بهتر برگزار بشه

                                        </a>

                                    </td>

                                    <td>
                                        <i style="color: #000;font-size: 15px;" class="fa fa-file-archive"></i>
                                    </td>


                                    <td class="tooltipped" data-position="top" data-tooltip="افزودن به علاقه مندی">

                                        <i style="font-size: 17px;color: #fff;cursor: pointer" class="fa fa-star"></i>

                                    </td>


                                    <td>
                                        27 ساعت پیش
                                    </td>
                                </tr>


                                </tbody>
                            </table>


                        </li>

                        <li class="draft_msggg" id="send_box_editor">

                            <div style="width: 100%;height: 45px;float: right;border-bottom: 1px solid #39618a;">
                    <span style="float: right;margin-right: 15px;margin-top: 8px;color: #fff;font-size: 14px;font-weight: bold;">
                        پیام های دریافتی
                    </span>

                                <div id="search_box">

                                    <input type="text" placeholder="جستجو کنید..."/>
                                    <span>
                            <i style="margin-top: 7px" class="fa fa-search"></i>
                        </span>

                                </div>

                            </div>


                            <div style="width: 100%;height: 45px;float: right">

                                <div id="msg_paginig">

                        <span style="border-right: 1px solid #ffd600;" class="tooltipped" data-tooltip="صفحه قبل"
                              data-position="top">
                            <i class="fa fa-chevron-left" style="margin-top: 8px;"></i>
                        </span>
                                    <span class="active_page tooltipped" data-position="top" data-tooltip="صفحه بعد">
                             <i class="fa fa-chevron-right" style="margin-top: 8px;"></i>
                        </span>
                                </div>

                                <span style="float: left;margin-left: 8px;color: #ffd600;margin-top: 12px;font-size: 13px;">
                        1 - 50 / 200
                    </span>


                                <div id="right_msg_mini_box"
                                     style="background: none;border: none;margin-left: 15px;margin-top: 12px;">
                                    <label>
                                        <input type="checkbox" id="checked_all" class="filled-in"/>
                                        <span></span>
                                    </label>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top" data-tooltip="حذف پیام">
                                    <i class="fa fa-trash" style="margin-top: 7px;"></i>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top"
                                     data-tooltip="بروز رسانی صفحه">
                                    <i class="fa fa-recycle" style="margin-top: 7px;"></i>
                                </div>


                            </div>


                            <table class="striped" style="direction: rtl">

                                <tbody>

                                <tr>
                                    <td style="width: 35px;">
                                        <label>
                                            <input type="checkbox" name="check_0" id="check_del"
                                                   class="filled-in checkbox-orange"/>
                                            <span></span>
                                        </label>
                                    </td>

                                    <td id="username">emran rastadi</td>
                                    <td id="desc">
                                        <a style="color: #000 !important;" href="#">
                                            <span style="font-size: 14px;font-weight: bold;">همایش کتاب و رسانه</span>-
                                            برای برگزاری بهتر ای کاش یکسری کارها انجام نمیشد و ای کاش یکسری کار های حتما انجام
                                            میشد
                                            تا به چنگ نریم و بهتر برگزار بشه

                                        </a>

                                    </td>

                                    <td>
                                        <i style="color: #000;font-size: 15px;" class="fa fa-file-archive"></i>
                                    </td>


                                    <td class="tooltipped" data-position="top" data-tooltip="افزودن به علاقه مندی">

                                        <i style="font-size: 17px;color: #fff;cursor: pointer" class="fa fa-star"></i>

                                    </td>


                                    <td>
                                        27 ساعت پیش
                                    </td>
                                </tr>


                                </tbody>
                            </table>

                        </li>


                        <li class="saved_msggg" id="send_box_editor">


                            <div style="width: 100%;height: 45px;float: right;border-bottom: 1px solid #39618a;">
                    <span style="float: right;margin-right: 15px;margin-top: 8px;color: #fff;font-size: 14px;font-weight: bold;">
                        پیام های دریافتی
                    </span>

                                <div id="search_box">

                                    <input type="text" placeholder="جستجو کنید..."/>
                                    <span>
                            <i style="margin-top: 7px" class="fa fa-search"></i>
                        </span>

                                </div>

                            </div>


                            <div style="width: 100%;height: 45px;float: right">

                                <div id="msg_paginig">

                        <span style="border-right: 1px solid #ffd600;" class="tooltipped" data-tooltip="صفحه قبل"
                              data-position="top">
                            <i class="fa fa-chevron-left" style="margin-top: 8px;"></i>
                        </span>
                                    <span class="active_page tooltipped" data-position="top" data-tooltip="صفحه بعد">
                             <i class="fa fa-chevron-right" style="margin-top: 8px;"></i>
                        </span>
                                </div>

                                <span style="float: left;margin-left: 8px;color: #ffd600;margin-top: 12px;font-size: 13px;">
                        1 - 50 / 200
                    </span>


                                <div id="right_msg_mini_box"
                                     style="background: none;border: none;margin-left: 15px;margin-top: 12px;">
                                    <label>
                                        <input type="checkbox" id="checked_all" class="filled-in"/>
                                        <span></span>
                                    </label>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top" data-tooltip="حذف پیام">
                                    <i class="fa fa-trash" style="margin-top: 7px;"></i>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top"
                                     data-tooltip="بروز رسانی صفحه">
                                    <i class="fa fa-recycle" style="margin-top: 7px;"></i>
                                </div>


                            </div>


                            <table class="striped" style="direction: rtl">

                                <tbody>

                                <tr>
                                    <td style="width: 35px;">
                                        <label>
                                            <input type="checkbox" name="check_0" id="check_del"
                                                   class="filled-in checkbox-orange"/>
                                            <span></span>
                                        </label>
                                    </td>

                                    <td id="username">emran rastadi</td>
                                    <td id="desc">
                                        <a style="color: #000 !important;" href="#">
                                            <span style="font-size: 14px;font-weight: bold;">همایش کتاب و رسانه</span>-
                                            برای برگزاری بهتر ای کاش یکسری کارها انجام نمیشد و ای کاش یکسری کار های حتما انجام
                                            میشد
                                            تا به چنگ نریم و بهتر برگزار بشه

                                        </a>

                                    </td>

                                    <td>
                                        <i style="color: #000;font-size: 15px;" class="fa fa-file-archive"></i>
                                    </td>


                                    <td class="tooltipped" data-position="top" data-tooltip="افزودن به علاقه مندی">

                                        <i style="font-size: 17px;color: #fff;cursor: pointer" class="fa fa-star"></i>

                                    </td>


                                    <td>
                                        27 ساعت پیش
                                    </td>
                                </tr>


                                </tbody>
                            </table>


                        </li>

                        <li class="trash_msggg" id="send_box_editor">


                            <div style="width: 100%;height: 45px;float: right;border-bottom: 1px solid #39618a;">
                    <span style="float: right;margin-right: 15px;margin-top: 8px;color: #fff;font-size: 14px;font-weight: bold;">
                        پیام های دریافتی
                    </span>

                                <div id="search_box">

                                    <input type="text" placeholder="جستجو کنید..."/>
                                    <span>
                            <i style="margin-top: 7px" class="fa fa-search"></i>
                        </span>

                                </div>

                            </div>


                            <div style="width: 100%;height: 45px;float: right">

                                <div id="msg_paginig">

                        <span style="border-right: 1px solid #ffd600;" class="tooltipped" data-tooltip="صفحه قبل"
                              data-position="top">
                            <i class="fa fa-chevron-left" style="margin-top: 8px;"></i>
                        </span>
                                    <span class="active_page tooltipped" data-position="top" data-tooltip="صفحه بعد">
                             <i class="fa fa-chevron-right" style="margin-top: 8px;"></i>
                        </span>
                                </div>

                                <span style="float: left;margin-left: 8px;color: #ffd600;margin-top: 12px;font-size: 13px;">
                        1 - 50 / 200
                    </span>


                                <div id="right_msg_mini_box"
                                     style="background: none;border: none;margin-left: 15px;margin-top: 12px;">
                                    <label>
                                        <input type="checkbox" id="checked_all" class="filled-in"/>
                                        <span></span>
                                    </label>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top" data-tooltip="حذف پیام">
                                    <i class="fa fa-trash" style="margin-top: 7px;"></i>
                                </div>
                                <div id="right_msg_mini_box" class="tooltipped" data-position="top"
                                     data-tooltip="بروز رسانی صفحه">
                                    <i class="fa fa-recycle" style="margin-top: 7px;"></i>
                                </div>


                            </div>


                            <table class="striped" style="direction: rtl">

                                <tbody>

                                <tr>
                                    <td style="width: 35px;">
                                        <label>
                                            <input type="checkbox" name="check_0" id="check_del"
                                                   class="filled-in checkbox-orange"/>
                                            <span></span>
                                        </label>
                                    </td>

                                    <td id="username">emran rastadi</td>
                                    <td id="desc">
                                        <a style="color: #000 !important;" href="#">
                                            <span style="font-size: 14px;font-weight: bold;">همایش کتاب و رسانه</span>-
                                            برای برگزاری بهتر ای کاش یکسری کارها انجام نمیشد و ای کاش یکسری کار های حتما انجام
                                            میشد
                                            تا به چنگ نریم و بهتر برگزار بشه

                                        </a>

                                    </td>

                                    <td>
                                        <i style="color: #000;font-size: 15px;" class="fa fa-file-archive"></i>
                                    </td>


                                    <td class="tooltipped" data-position="top" data-tooltip="افزودن به علاقه مندی">

                                        <i style="font-size: 17px;color: #fff;cursor: pointer" class="fa fa-star"></i>

                                    </td>


                                    <td>
                                        27 ساعت پیش
                                    </td>
                                </tr>


                                </tbody>
                            </table>


                        </li>

                    </ul>


                    <div class="write_msg_box" id="send_box_editor">

                        <div style="width: 100%;height: 45px;float: right;border-bottom: 1px solid #39618a;">
                    <span style="float: right;margin-right: 15px;margin-top: 8px;color: #fff;font-size: 14px;font-weight: bold;">
                        ارسال پیام جدید
                    </span>
                        </div>

                        <form id="ticket_form_sender">

                            <div id="box_input_">
                                <input type="text" name="recivers"
                                       placeholder="کد ملی گیرندگان پیغام را تایپ کنید . آنها را با / از هم جدا کنید."
                                       id="input_"/>
                            </div>

                            <div id="box_input_">
                                <input type="text" name="subject" placeholder="موضوع پیغام را تایپ کنید..." id="input_"/>
                            </div>


                            <textarea id="tex_area" placeholder="لطفا متن پیغام را تایپ کنید" name="desc_tic"></textarea>


                            <div class="col s12 m12 l6 flexbox">

                                <div style="width: 100%;height: 49px;position: relative;overflow: hidden;float: right;margin-top: 15px;margin-bottom: 15px;">
                                    <div class="btn" style="direction: rtl;background: #b71c1c !important;height: 45px;width: 100%">
                                        <span>اگر تصویری مد نظر دارید پیوست کنید</span>
                                        <input type="file" name="tic_image"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col s12 m12 l6">

                                <input type="submit" id="sub_input_msg"  style="float: left;background:#ffd600;margin-bottom: 15px;margin-top: 15px; "
                                       class="btn waves-effect right" value="ارسال پیغام" />

                                <input type="submit" id="sub_input_msg"  style="float: left;margin-bottom:15px;background:#17a2b8;margin-top: 15px; "
                                       class="btn waves-effect left"  value="ذخیره در پیشنویس ها" />


                            </div>







                        </form>


                    </div>



                </div sty>
                <div class="col s12 m3 l2" style="margin-top: 20px;">

                    <div style="width: 100%;height: 100px;">

                        <a id="add_new_msg" class="btn waves-effect"
                           style="width: 100%;background: #ffd600;color: #000;font-size: 13px;">ارسال پیام</a>

                        <div id="mail_menu">
                            <ul>
                                <a id="recived_page" class="active_mail_menu">
                                    <li>
                                <span id="icon_mail_menu">
                                    <i id="icons" class="fa fa-inbox"></i>
                                </span>
                                        <span id="title">دریافتی ها</span>
                                    </li>

                                    <div id="icon_mail_menu_left"></div>
                                </a>

                                <a id="send_box">
                                    <li>
                                <span id="icon_mail_menu">
                                    <i id="icons" class="fa fa-mail-bulk"></i>
                                </span>
                                        <span id="title">ارسالی ها</span>
                                    </li>

                                    <div id="icon_mail_menu_left"></div>
                                </a>

                                <a id="drafts_box">
                                    <li>
                                <span id="icon_mail_menu">
                                    <i id="icons" class="fa fa-paperclip"></i>
                                </span>
                                        <span id="title">پیش نویس ها</span>
                                    </li>

                                    <div id="icon_mail_menu_left"></div>
                                </a>

                                <a id="saved_box">
                                    <li>
                                <span id="icon_mail_menu">
                                    <i id="icons" class="fa fa-star"></i>
                                </span>
                                        <span id="title">علاقه مندی ها</span>
                                    </li>

                                    <div id="icon_mail_menu_left"></div>
                                </a>


                                <a id="trash_box">
                                    <li>
                                <span id="icon_mail_menu">
                                    <i id="icons" class="fa fa-trash"></i>
                                </span>
                                        <span id="title">سطل آشغال</span>
                                    </li>

                                    <div id="icon_mail_menu_left"></div>
                                </a>

                            </ul>
                        </div>

                    </div>

                </div>

                <?php
                include 'menu_side.php';
                ?>


            </div>

        </div>




    </div>

</div>




<!--<div style="width: 200px;height: 300px;position:fixed;background: #000;" class="d-hidden-mini"></div>-->


<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>