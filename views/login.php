<!doctype html>
<html lang="en">
<head>
    <base href="<?= URL; ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public/dist/js/jquery.js"></script>
    <link rel="stylesheet" href="public/dist/css/all.css"/>
    <link rel="stylesheet" href="public/dist/css/morris.css"/>
    <link rel="stylesheet" href="public/dist/css/materialize.min.css"/>
    <link rel="stylesheet" href="public/style.css"/>
    <title>ورود به پنل</title>
</head>

<body style="background-image: url('public/img/loginback.jpg') !important;background-size: 100% 100% !important;">


<div class="section">


    <a class="btn-floating btn-large waves-effect waves-light red" style="position: fixed;right: 40px;font-size: 22px;" href="<?=  URL ?>"><i class="fa fa-home"></i> </a>



    <div class="row">

        <div class="col s12" style="height: 50px;"></div>

        <div class="col s1 m3 l4">
        </div>

        <div class="col s10 m6 l4" style="z-index: 99999;">


            <div class="row">


                <form action="login/login_check" method="post" id="form_logins">
                    <div class="col s12" style="background: #0d2162 !important;border-radius: 5px;">

                        <div class="row" style="padding-bottom: 15px !important;">

                            <div class="col s12" style="height: 50px;position:relative;">

                                <!--        <span style="font-size: 16px;">ورود به یارا</span>-->
                                <div id="logo_form">
                                    <i class="fa fa-lock" style="font-size: 26px;color: #fff;margin-top: 28px;"></i>
                                </div>

                            </div>


                            <div class="col s12">


                                <div class="col s12" style="height: 40px;">
                                    <a id="alert_ok">کد ملی مورد تایید میباشد.</a>
                                    <a id="alert_no">کد ملی در سامانه ثبت نشده است.</a>
                                </div>


                                <div id="tit_input_form" style="width: 100%;">
                                    <a id="alert_ok">کد ملی مورد تایید میباشد.</a>
                                    <a id="alert_no">کد ملی در سامانه ثبت نشده است.</a>
                                    <div id="hero_input">
                                        <i class="fa fa-user"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="text" name="melli_code" id="input_text_forms" style="width: 78%"
                                               placeholder="کد ملی">
                                        <i class="fa fa-redo-alt rotation" id="check_number_ajax"></i>
                                        <i class="fa fa-check" id="done_checking"></i>
                                        <i class="fa fa-user-times" id="wrong_checking"></i>
                                    </div>
                                </div>

                            </div>

                            <div class="col s12">


                                <div class="col s12" style="height: 40px;">
                                    <a href="#modal1"
                                       style="float: left;font-size:13px !important;color: #ffc107;border-bottom: 1px dashed;margin-top: 4px;"
                                       class="modal-trigger">رمز عبور خود را فراموش کرده ام</a>
                                </div>


                                <div id="tit_input_form">
                                    <div id="hero_input">
                                        <i class="fa fa-lock"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="password" name="pass_login" id="input_text_forms_pass"
                                               placeholder="رمز عبور">
                                        <i class="fa fa-eye" id="show_pass"></i></div>
                                </div>

                            </div>

                            <div class="col s12">

                                <label for="check_remember"
                                       style="float: right;color: #fff;margin-right: 20px;margin-top: 15px;">

                                    <input type="checkbox" class="filled-in" checked="checked" id="check_remember"/>

                                    <span style="font-size: 13px;">مرا بخاطر داشته باش</span>
                                </label>

                            </div>


                            <div class="col s12 m12 l6 right">
                                <a class="btn waves-effect" id="sub_forms">ورود</a>

                            </div>

                        </div>

                    </div>
                </form>

                <div class="col s12"
                     style="background: #0d2162 !important;margin-top: 15px;padding: 15px;border-radius: 5px;">

                    <div class="row" style="margin: 0px;">

                        <div id="footer">
                            <div style="width:100%;height:30px;text-align: center">
                                <span style="color: #fff;font-size: 13px;">&nbsp;&nbsp;هنوز مدرس یارا نشده ام.&nbsp;&nbsp;</span>
                                <a href="<?= URL ?>signup" style="cursor:pointer;font-size: 13px;border-bottom: 1px dashed;color: #ffc107 !important;">ثبت نام در یارا</a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>

        <div class="col s1 m3 l4">
        </div>


    </div>

</div>
<div id="modal1" class="modal" style=";background: #0d2162;width: 30%;height: 250px;border-radius: 5px;">
    <div class="modal-content">

        <p style="color: #fff;text-align: center;">بازگردانی رمز عبور</p>
        <p style="color: #fff;text-align: center;direction: rtl;font-size: 17px;">بعد از ورود با رمز یک بار مصرف ، به تنظیمات رفته و رمز را تغییر دهید.</p>

        <div class="col s12">

            <div class="row">

                <div class="col s12 m6 l6 right">

                    <div id="hero_input">
                        <i class="fa fa-phone"
                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                        <input type="text" name="phone_number_change_pass"
                               style="width: 220px !important;color:#fff;height: 30px;float: right;margin-right: 20px;font-size: 13px;text-align:center;direction: ltr;margin-top: 6px;"
                               placeholder="09********">

                    </div>

                </div>

                <div class="col s12 m6 l6">

                    <a class="btn waves-effect" id="sub_forms_send_mini_pass">ارسال رمز عبور جدید</a>

                </div>


            </div>

        </div>


    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function () {
        $('.modal').modal();
    });

    $(function () {
        $("#check_number_ajax").click(function () {
            $(this).addClass("rotation");
        })
    })

    $(function () {
        $("#sub_forms").click(function () {
            $("#form_logins").submit();
        });


        $("#input_text_forms").focusout(function () {
//            $("#check_number_ajax").fadeIn(0);
//            $("#done_checking").fadeIn(0);
            $("#check_number_ajax").fadeIn(0);
            var phone_num = $("[name='melli_code']").val();
            $.post("login/check_phone", {phone: phone_num}, function (msg) {
                $("#check_number_ajax").fadeOut(0);
                $("#alert_no").fadeOut(0);
                $("#alert_ok").fadeOut(0);
                if (msg == "new") {
                    $("#alert_no").fadeIn(0);
                    $("#wrong_checking").slideDown();
                    $("#done_checking").slideUp();
                } else {
                    $("#alert_ok").fadeIn(0);
                    $("#done_checking").slideDown();
                    $("#wrong_checking").slideUp();
                }

            })
        });
    })
</script>


<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>