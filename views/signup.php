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

        <div class="col s10 m6 l4" style="position:relative;z-index: 9;">


            <div class="row">








                <form>
                    <div class="col s12" style="position:relative;background: #0d2162 !important;border-radius: 5px;">


                        <div id="load_add_to_card">
                            <div id="loading_shop">
                                <div class="preloader-wrapper small active"
                                     style="position: absolute;right: 15px;bottom: 0px;margin: auto;top: 0px;">
                                        <div class="spinner-layer spinner-blue">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div><div class="gap-patch">
                                                <div class="circle"></div>
                                            </div><div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>

                                        <div class="spinner-layer spinner-red">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div><div class="gap-patch">
                                                <div class="circle"></div>
                                            </div><div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>

                                        <div class="spinner-layer spinner-yellow">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div><div class="gap-patch">
                                                <div class="circle"></div>
                                            </div><div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>

                                        <div class="spinner-layer spinner-green">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div><div class="gap-patch">
                                                <div class="circle"></div>
                                            </div><div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>

                                </div>
                                <span style="float: right;margin-right: 67px;direction: rtl;line-height: 3.7;font-size: 18px;">لطفا کمی منتظر بمانید ...</span>
                            </div>
                        </div>


                        <div class="row" style="position:relative;padding-bottom: 15px !important;">




                            <div class="col s12" style="height: 50px;position:relative;">

                                <!--        <span style="font-size: 16px;">ورود به یارا</span>-->
                                <div id="logo_form">
                                    <i class="fa fa-user-plus" style="font-size: 26px;color: #fff;margin-top: 28px;"></i>
                                </div>

                            </div>


                            <div class="col s12">


                                <div class="col s12" style="height: 40px;">
                                </div>


                                <div id="tit_input_form" style="width: 100%;">
                                    <div id="hero_input">
                                        <i class="fa fa-user"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="text" name="name_u_sign" id="input_text_forms" style="width: 78%"
                                               placeholder="نام">
                                        <i class="fa fa-redo-alt rotation" id="check_number_ajax"></i>
                                        <i class="fa fa-check" id="done_checking"></i>
                                        <i class="fa fa-user-times" id="wrong_checking"></i>
                                    </div>
                                </div>

                            </div>

                            <div class="col s12" style="margin-top: 10px">



                                <div id="tit_input_form" style="width: 100%;height: 45px">
                                    <div id="hero_input">
                                        <i class="fa fa-user"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="text" name="fam_u_sign" id="input_text_forms" style="width: 78%"
                                               placeholder="نام خانوادگی">
                                    </div>
                                </div>

                            </div>

                            <div class="col s12">

                                <div id="tit_input_form" style="width: 100%;height: 40px">
                                    <div id="hero_input">
                                        <i class="fa fa-user"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="text" name="melli_code_sign" id="input_text_forms" style="width: 78%"
                                               placeholder="کد ملی">

                                    </div>
                                </div>

                            </div>



                            <div class="col s12">


                                <div class="col s12" style="height: 40px;">
                                    <a style="font-size:13px;display: block" id="alert_ok">در انجام عملیات احراز هویت تلفن دقت فرمایید.</a>
                                </div>


                                <div id="tit_input_form" style="width: 100%;">
                                    <div id="hero_input">


                                        <a class="btn waves-effect s" id="sign_check_code_btn">اعتبار سنجی</a>


                                        <i class="fa fa-phone"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="text" name="phone_u_sign" id="input_text_forms" style="width: 78%"
                                               placeholder="شماره تلفن">
                                    </div>
                                </div>

                            </div>
                            <div class="col s12" id="ehraz_hov" style="margin-top: 10px;">

                                <div id="tit_input_form" style="width: 100%;height: 40px;">

                                    <div id="hero_input">
                                        <i class="fa fa-pen"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="text" name="phone_code_u_sign" id="input_text_forms" style="width: 78%"
                                               placeholder="کد احراز هویت تلفن">
                                    </div>
                                </div>

                            </div>



                            <div class="col s12" style="margin-top: 10px;">

                                <div id="tit_input_form" style="height: 50px">
                                    <div id="hero_input">
                                        <i class="fa fa-lock"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="password" name="pass_u_sign" id="input_text_forms_pass"
                                               placeholder="انتخاب رمز عبور">
                                    </div>
                                </div>

                            </div>


                            <div class="col s12">

                                <div id="tit_input_form" style="height: 50px">
                                    <div id="hero_input">
                                        <i class="fa fa-lock"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="password" name="re_pass_sign" id="input_text_forms_pass"
                                               placeholder="تکرار رمز عبور">
                                    </div>
                                </div>

                            </div>



                            <div class="col s12 m12 l6 right">
                                <a class="btn waves-effect" id="sub_forms_sign_up">ثبت نام و ورود</a>

                            </div>

                        </div>

                    </div>
                </form>

                <div class="col s12"
                     style="background: #0d2162 !important;margin-top: 15px;padding: 15px;border-radius: 5px;">

                    <div class="row" style="margin: 0px;">

                        <div id="footer">
                            <div style="width:100%;height:30px;text-align: center">
                                <span style="color: #fff;font-size: 13px;">&nbsp;&nbsp;قبلا مدرس یارا بودم.&nbsp;&nbsp;</span>
                                <a href="<?= URL ?>login" style="cursor:pointer;font-size: 13px;border-bottom: 1px dashed;color: #ffc107 !important;">ورود به یارا</a>
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

<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>