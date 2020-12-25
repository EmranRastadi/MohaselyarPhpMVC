<?php

$model_obj = new Model();
$user_array = $model_obj->user_data();
$user_d = $user_array[0] ;
$counter = $user_array[1];
$date_today = jdate("l d F Y");
$basket = $model_obj->get_cart();
$num = sizeof(json_decode($basket['pro_ids']));
Model::seseion_init();
$ses = Model::sesion_get('user_login');
?>

<?php
if ($ses != false) {
    ?>
    <div class="col s12" style="z-index:9;background: #07194a">
        <div class="row" style="margin: 0px;">
            <div class="col s12" style="direction: rtl;text-align: right">

                <?php

                $pro_img = 'public/dist/img/avatar3.png';
                if ($user_d[6] != '') {
                    $pro_img = $user_d[6];
                }

                ?>
                <img id="mini_pro_img" src="<?= $pro_img ?>" class="responsive-img circle" width="30"
                     style="float: right;margin: 6px;height: 30px;"/>

                <a style="text-align: center;font-size: 13px;color: #fff;float: right;margin-top: 11px;margin-right: 10px;"><?= $user_d[1] . ' ' . $user_d[2]; ?></a>

                <i class="fa fa-power-off" id="exit_panel"
                   style="cursor:pointer;float: left;font-size: 21px;color: #fff;margin-top: 10px;margin-left: 15px;"></i>
                <span style="float: left;direction: rtl;font-size: 12px;margin-left: 15px;margin-top: 12px;color: #fff"><?= $date_today ?></span>

            </div>

        </div>
    </div>
    <?php
}
?>
<nav style="z-index:9;position:relative;">

    <div class="nav-wrapper" style="padding: 0 10px;background: #17378d82">

        <a href="#" class="brand-logo ">
            <!--            <div class="row ">-->
            <!--                <img src="public/dist/img/avatar.png" style="width: 20%;border-radius: 100%;margin-top: 3%;" />-->
            <!--            </div>-->
            YARA

        </a>

        <a href="#" class="sidenav-trigger" data-target="mobile-nav">
            <i class="fa fa-align-justify"></i>
        </a>

        <ul class="right hide-on-med-and-down" id="menu_nav">

            <li><a href="<?=  URL ?>show_cart">
                    <div id="cart-counters">
                        <?=  $num  ?>
                    </div>

                    سبد خرید &nbsp;<i
                            class="fa fa-shopping-basket"></i></a></li>



            <?php
            if ($ses != false) {
                ?>
                <li><a class="dropdown-trigger" data-target='user-dash' href="#"> داشبورد &nbsp;<i
                                class="fa fa-desktop"></i></a></li>
                <?php
            }else {
                ?>
                <li><a class="dropdown-trigger" data-target='user-log' href="<?= URL ?>login"> کاربری &nbsp;<i
                                class="fa fa-user"></i></a></li>
                <?php
            }
            ?>
<!--            <li><a href="#"> وبلاگ &nbsp;<i class="fa fa-blog"></i></a></li>-->
            <li><a href="<?= URL ?>shop"> فروشگاه <i class="fa fa-shopping-cart"></i></a></li>
            <li><a href="<?= URL ?>"> خانه &nbsp;<i class="fa fa-home"></i> </a></li>


        </ul>
    </div>


    <div id="top_progress">

        <div class="progress">
            <div class="indeterminate"></div>
        </div>

    </div>
    <div id="back_menu_tar"></div>
</nav>


<!-- Dropdown Structure -->
<!--<ul id='user-log' class='dropdown-content' style="z-index: 999;">-->
<!--    <li><a href="--><?//= URL ?><!--login"><i class="fa fa-sign-in-alt"></i>&nbsp;&nbsp;&nbsp; ورود به پنل کاربری &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>-->
<!--    </li>-->
<!--    <li><a href="#!"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;&nbsp; ثبت نام در یارا &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>-->
<!--    </li>-->
<!--</ul>-->

<ul id='user-dash' class='dropdown-content' style="z-index: 999;">
    <li ><a  href="<?= URL ?>dashboard"><i class="fa fa-desktop"></i>&nbsp;&nbsp;&nbsp; <span style="margin-left: 40px;">مشاهده داشبورد</span> </a></li>
    <li><a href="<?= URL ?>add_book"><i class="fa fa-book-medical"></i>&nbsp;&nbsp;&nbsp; افزودن کتاب </a></li>
    <li><a href="<?= URL ?>inboxMsg"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;&nbsp; مدیریت پیام ها </a></li>
    <li><a href="<?= URL ?>modir_news"><i class="fa fa-pencil-ruler"></i>&nbsp;&nbsp;&nbsp; اخبار مدیریت </a></li>
    <li><a href="<?= URL ?>profile"><i class="fa fa-cogs"></i>&nbsp;&nbsp;&nbsp; پروفایل </a></li>
<!--    <li><a href="#!" style="background:darkred;margin: 10px;"><i class="fa fa-times"></i> خروج از حساب کاربری&nbsp;-->
<!--            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>-->
</ul>

<ul class="sidenav" id="mobile-nav" style="text-align: right">
    <li><a href="#"> خانه &nbsp;<i class="fa fa-home"></i> </a></li>
    <li><a href="<?= URL ?>/shop"> فروشگاه &nbsp;<i class="fa fa-shopping-cart"></i></a></li>
    <li><a href="#"> وبلاگ &nbsp;<i class="fa fa-blog"></i></a></li>
    <?php
    if ($ses != false) {
        ?>
        <li><a href="<?= URL ?>dashboard"> داشبورد &nbsp;<i class="fa fa-desktop"></i></a></li>
        <?php
    }else{
        ?>
        <li><a class="dropdown-trigger" data-target='user-log' href="<?= URL ?>login"> ورود به پنل &nbsp;<i
                        class="fa fa-user"></i></a></li>
    <?php
    }
    ?>
    <li><a href="#"> سبد خرید &nbsp;<i class="fa fa-shopping-basket"></i>

        <div id="side_menu_basket">
            <?= $num ?>
        </div>
        </a></li>
</ul>







<div class="fixed-action-btn click-to-toggle hide-on-large-only ">
    <a class="btn-floating btn-large red center-align" style="line-height: 3.9">
        <i class="fa fa-th-large"></i>
    </a>
    <ul>
        <li  id="exit_panel_mini"><a class="btn-floating black"><i class="fa fa-user-times"></i></a></li>
        <li><a class="btn-floating green"><i class="fa fa-comments"></i></a></li>
        <li><a class="btn-floating red"><i class="fa fa-book"></i> </a></li>
        <li><a class="btn-floating blue darken-1"><i class="fa fa-bell"></i> </a></li>
        <li><a  class="btn-floating orange"><i class="fa fa-cogs"></i> </a></li>
    </ul>
</div>

