<?php
$user_data = $data[0];
$pay_rep = $data[1];
$ticket = sizeof($data[2]);
$arr_colors = array('darkred', 'green', 'blue', 'orange', 'black');
?>

<!doctype html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
    <script src="public/dist/js/jquery.js"></script>
    <link rel="stylesheet" href="public/dist/css/all.css"/>
    <link rel="stylesheet" href="public/dist/css/morris.css"/>
    <link rel="stylesheet" href="public/dist/css/materialize.min.css"/>
    <link rel="stylesheet" href="public/style.css"/>
    <title>پروفایل کاربری</title>


</head>
<body>

<?php
include 'menu_top.php';
?>

<!--<div style="width: 200px;height: 300px;position:fixed;background: #000;" class="d-hidden-mini"></div>-->


<div class="section">

    <div class="row">


        <div class="col s12">

            <div style="direction:rtl;width: 100%;float: right;text-align: right;font-size: 21px;color: #fff;margin-right: 20px;">
                <a href="dashboard" style="color: #28a745;">داشبورد</a>
                <a style="color: #28a745;">/</a>
                <a href="#">پروفایل</a>
            </div>

        </div>

        <div class="section">

            <div class="row">


                <div class="col s12">


                    <div class="col s12 m12 l3" style="margin-top: 15px;">


                        <div class="row">

                            <div class="col s12 m6 l12">
                                <div class="card-panel teal">


                                    <div class="row flexbox" style="margin-top: 20px;">

                                        <?php
                                        $img_src = 'public/dist/img/avatar3.png';
                                        if($user_data['profile_img'] != '')
                                        {
                                            $img_src= $user_data['profile_img'];
                                        }
                                        ?>
                                        
                                        <div style="width: 110px;height: 110px;border-radius: 100%;z-index: 99;background: #ffc107 "
                                             class="pulse">
                                            <img class="" src="<?= $img_src ?>"
                                                 style="width: 110px;height: 110px;border-radius: 100%"/>
                                        </div>
                                    </div>

                                    <div id="pro_card_content">
                                        <p><?= $user_data['name'] . " " . $user_data['fam'] ?></p>


                                        <?php
                                        $skills = explode("/", $user_data['skills']);

                                        ?>


                                        <p style="font-size: 13px;margin-top: -12px;">متولد
                                            : <?= $user_data['ebd']; ?> </p>

                                        <ul style="padding: 10px;margin-top: -10px;font-size: 13px;">
                                            <li>
                                                <span style="float: right;color: #fff">مشتری ها</span><span
                                                        style="float: left;color: #ffd600"><?=  sizeof($pay_rep['user_data']) ?></span>
                                            </li>
                                            <li>
                                                <span style="float: right;color: #fff">فروش ها</span><span
                                                        style="float: left;color: #ffd600"><?=  $pay_rep['count_pay'] ?></span>
                                            </li>
                                            <li>
                                                <span style="float: right;color: #fff">تیکت ها</span><span
                                                        style="float: left;color: #ffd600"><?=  $ticket ?></span>
                                            </li>
                                            <li>
                                                <span style="float: right;color: #fff">بستانکاری مالی ( تومان )</span><span
                                                        style="float: left;color: #ffd600"><a id="modir_mark" style="color: #fff" href=""><?= $pay_rep['total_pay'] ?></a> </span>
                                            </li>
                                        </ul>


                                        <div style="width: 100%;height: 40px;overflow: hidden;position: relative">

                                            <div class="btn"
                                                 style="direction: rtl;font-size:13px;background: #ffc107 !important;height: 40px;width: 100%;color: #000;" >
                                                <span>تغییر عکس پروفایل</span>
                                                <input type="file" name="profile_imgs_"/>
                                            </div>

                                        </div>



                                    </div>

                                </div>

                            </div>


                            <div class="col s12 m6 l12">
                                <div class="card-panel teal" style="padding: 0px;">


                                    <div class="container row" style="margin: 2px;">

                                        <div id="title_about_me"><span>درباره من</span></div>


                                        <div class="col s12">
                                            <div style="width: 100%;height: 30px;">
                                                <span id="item_tit_about_me"><i class="fa fa-university"></i>&nbsp;&nbsp;سابقه تحصیلی </span>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <p id="p_style"><?= $user_data['uni'] ?></p>
                                        </div>


                                        <div class="col s12">

                                            <div style="width: 100%;height: 30px;float: right;">
                                                <span id="item_tit_about_me"><i class="fa fa-search-location"></i>&nbsp;&nbsp;محل سکونت </span>
                                            </div>


                                        </div>
                                        <div class="col s12">
                                            <p id="p_style"><?= $user_data['address'] ?></p>
                                        </div>

                                        <div class="col s12">

                                            <div style="width: 100%;height: 30px;float: right;">
                                                <span id="item_tit_about_me"><i class="fa fa-phone"></i>&nbsp;&nbsp;شماره تلفن </span>
                                            </div>


                                        </div>
                                        <div class="col s12">
                                            <p id="p_style"><?= $user_data['phone'] ?></p>
                                        </div>


                                        <div class="col s12">

                                            <div style="width: 100%;height: 30px;float: right;">
                                    <span id="item_tit_about_me"><i
                                                class="fa fa-dumbbell"></i>&nbsp;&nbsp;مهرات ها </span>
                                            </div>


                                        </div>
                                        <div class="col s12">
                                            <div id="badge_aboute_box">

                                                <?php
                                                foreach ($skills as $val) {
                                                    $color_index = rand(0, sizeof($arr_colors));

                                                    ?>
                                                    <span id="modir_mark"
                                                          style="float: right;margin-left: 10px;background: <?= $arr_colors[$color_index]; ?> !important;"><?= $val ?></span>

                                                    <?php
                                                    unset($arr_colors[$color_index]);
                                                }
                                                ?>


                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>


                        </div>


                    </div>


                    <div class="col s12 m12 l6" style="margin-top: 15px;">


                        <div class="col s12"
                             style="padding: 0px;background: #17378d;margin-top: 7px;border-radius: 3px;overflow: hidden">


                            <div class="col s12" style="padding: 0px;">

                                <div id="top_tabs">
                                    <ul>
                                        <li class="active_tab">
                                            تنظیمات پروفایل &nbsp;&nbsp;<i class="fa fa-cogs"></i>
                                        </li>

                                        <li >
                                            تنظیمات رمز عبور &nbsp;&nbsp;<i class="fa fa-lock"></i>
                                        </li>
                                        <li >
                                           گزارش فروش &nbsp;&nbsp;<i class="fa fa-shopping-cart"></i>
                                        </li>
                                    </ul>
                                </div>

                            </div>


                            <div class="col s12">

                                <div id="tab_contents" style="width: 100%;float: right;">

                                    <section style="display: block;">


                                        <form id="form_setting_pro" method="post" action="profile/update_user_data" >


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-chess-queen"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="text" name="nic_names" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               value="<?= $user_data['nic_name'] ?>"
                                                               placeholder="نام مستعار">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">نام مستعار </span>

                                                    </div>


                                                </div>


                                            </div>

                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-user"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="text" name="f_name" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               value="<?= $user_data['name'] ?>"
                                                               placeholder="نام ...">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">نام</span>

                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-user"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="text" name="s_name" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               value="<?= $user_data['fam'] ?>"
                                                               placeholder="نام خانوادگی...">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">نام خانوادگی</span>

                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-phone"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="text" name="phone" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               value="<?= $user_data['phone'] ?>"
                                                               placeholder="تلفن همراه">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">تلفن همراه</span>

                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-mail-bulk"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="text" name="email" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               value="<?= $user_data['email'] ?>"
                                                               placeholder="ایمیل">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">ایمیل</span>

                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-dumbbell"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="text" name="skills" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               value="<?= $user_data['skills'] ?>"
                                                               placeholder="حرفه های خود را با / از هم جدا کنید.مثل ( زبان / ریاضی / ادبیات فارسی )">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">حرفه ها</span>

                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-map"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="text" name="address" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               value="<?= $user_data['address'] ?>"
                                                               placeholder="آدرس محل سکونت">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">محل سکونت</span>

                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-calendar"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="text" name="ebd" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               value="<?= $user_data['ebd'] ?>"
                                                               placeholder="تاریخ تولد (1374)">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">سال تولد</span>

                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-university"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="text" name="uni_det" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               value="<?= $user_data['uni'] ?>"
                                                               placeholder="مدرک تحصیلی و دانشگاه محل تحصیل">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">تحصیلات</span>

                                                    </div>


                                                </div>


                                            </div>

                                            <div class="col s12 m6 l4">
                                                <a id="update_user_data" class="btn waves-effect" type="submit"
                                                   style="background: orange !important;color: #000;" >ویرایش و ثبت اطلاعات</a>
                                            </div>

                                        </form>


                                    </section>




                                    <!--        password   setting      -->
                                    <section>


                                        <form id="form_change_pass" method="post" style="padding: 15px;margin-bottom: 20px;" action="profile/update_pass_data" >


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-unlock"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="password" name="oldest_pass" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               placeholder="رمز عبور پیشین">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">رمز عبور پیشین</span>

                                                    </div>


                                                </div>


                                            </div>

                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-bottom: 1%;">
                                                        <i class="fa fa-lock"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="password" name="new_pass" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               placeholder="رمز عبور جدید">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">رمز عبور جدید</span>

                                                    </div>


                                                </div>


                                            </div>


                                            <div class="col s12">


                                                <div class="row">


                                                    <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                        <i class="fa fa-redo-alt"
                                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                        <input type="password" name="re_new_pass" id="input_text_forms"
                                                               style="direction:rtl;text-align:right"
                                                               placeholder="تکرار رمز عبور جدید">


                                                        <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">تکرار رمز عبور جدید</span>

                                                    </div>


                                                </div>


                                            </div>



                                            <div class="col s12 m6 l4" style="margin: 0px;padding: 0px;">
                                                <a id="update_password" class="btn waves-effect" type="submit"
                                                   style="margin-bottom:20px;font-size:13px;background: orange !important;color: #000;" >بروزرسانی رمز عبور</a>
                                            </div>

                                        </form>


                                    </section>


                                    <!--       shopping sell    -->

                                    <section>



                                        <div class="col s12">



                                            <?php


                                            if (sizeof($pay_rep['user_data']) > 0) {
                                                foreach ($pay_rep['user_data'] as $key=>$value) {

                                                    $date_kham = explode('/', $value['date']);

                                                    $mon = $date_kham[2];
                                                    $day = $date_kham[3];
                                                    $year = $date_kham[0];
                                                    $img = '';
                                                    if ($value['img'] == '') {
                                                        $img = 'public/dist/img/avatar04.png';
                                                    } else {
                                                        $img = $value['img'];
                                                    }

                                                    $date_our = $day . " " . $mon . " " . $year;
                                                    ?>
                                                    <div class="col s4 m4 l4">

                                                        <div class="card-panel"
                                                             style="background: none !important;padding:10px;border: none !important;box-shadow: none !important;">


                                                            <img src="<?= $img ?>"
                                                                 class="responsive-img circle" width="170" height="170" style="width: 170px !important;height: 170px !important;"/>

                                                            <div id="pro_card_content" style="margin-top:15px;height: auto">
                                                                <p style="font-size: 12px;margin: 0px"><?= $value['names'] ?></p>
                                                                <a href="#modal_" class="btn waves_effect modal-trigger" id="view_user_cus_det" pro_id="<?= $key ?>" style="margin-top:10px;background:orange !important;color:#000 !important;font-size:11px;width:100% !important">جزئیات <i style="margin-top: 9px;font-size: 17px;" class="fa fa-eye right"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>







                                                    <!-- <div style="width:100%;height:100%;background:#fff;position:fixed"></div> -->


                                                    <?php
                                                }
                                            }else
                                            {
                                                ?>
                                                <p style="direction: rtl;text-align: center;font-size: 19px;padding: 15px;color: orange;">شما تاکنون فروشی نداشته اید.</p>
                                                <?php
                                            }
                                            ?>


                                            <!--                                    <div class="col s12" style="margin-bottom: -25px;">-->
                                            <!---->
                                            <!--                                        <a class="btn waves-effect" id="click_for_all">-->
                                            <!--                                            مشاهده همه اعضا-->
                                            <!--                                        </a>-->
                                            <!---->
                                            <!--                                        <div class="footer">-->
                                            <!--                                            <p style="text-align: center;font-size: 19px;"></p>-->
                                            <!--                                        </div>-->
                                            <!---->
                                            <!--                                    </div>-->


                                        </div>


                                    </section>


                                </div>






                            </div>


                        </div>


                    </div>


                    <?php include 'menu_side.php' ?>

                </div>


            </div>


        </div>


    </div>


</div>


<div id="modal_" class="modal" style=";background: #0d2162;width: 30%;height: 250px;border-radius: 5px;">
    <div class="modal-content">
        <div id="load_add_to_card">
            <div id="loading_shop">
                <div class="preloader-wrapper small active"
                     style="position: absolute;right: 15px;bottom: 0px;margin: auto;top: 0px;">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <span style="float: right;margin-right: 67px;direction: rtl;line-height: 3.7;font-size: 18px;color:#000 !important">لطفا کمی منتظر بمانید ...</span>
            </div>
        </div>








        <p style="color: #fff;text-align: center;font-size:16px;">جزئیات خرید این کاربر</p>
        <p style="color: #fff;text-align: center;direction:rtl;font-size:13px;">توجه داشته باشید که شاید قیمتی که فروخته شده است شامل تخفیف بوده باشد و بعدا تخفیف برداشته شده باشد.</p>


        <table class="striped center-align center">
            <thead class="center center-align">
            <tr>
                <th class="center center-align">تاریخ</th>
                <th class="center center-align">( تومان ) قیمت</th>
                <th class="center center-align">نام محصول</th>
            </tr>
            </thead>
            <tbody id="table_pro_custom" class="center-align center">

            </tbody>
        </table>



    </div>
</div>




<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>