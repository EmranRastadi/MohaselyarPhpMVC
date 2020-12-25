<?php
$data_in = $data[0][0];
$slider = json_decode($data_in['slider']);
$address = json_decode($data_in['address'], true);
$comment = $data[0][1];
$user_top = $data[1];
$pro_top = $data[2];
$tot_countss = $data[3];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>سیستم آموزشی یارا</title>
    <link rel='stylesheet' href='public/style.css'/>
    <script src="public/dist/js/jquery.js"></script>
    <script src="public/java_code.js"></script>
    <link rel="stylesheet" href="public/dist/css/materialize.min.css"/>
    <link rel="stylesheet" href="public/dist/css/all.css"/>
    <link href="public/dist/css/aos.css" rel="stylesheet">
    <script src="public/dist/js/aos.js"></script>
    <style>
        .carousel {
            height: 250px !important;
        }
    </style>
</head>
<body>


<?php
include 'menu_top.php';
?>


<div class="slider fullscreen">
    <ul class="slides">

        <?php
        for ($i = 0; $i < sizeof($slider); $i++) {
            ?>
            <li>
                <div style="background: rgba(0,0,0,0.6);position:absolute;left: 0px;top: 0px;z-index: 8;width: 100%;height: 100%"></div>

                <img src="<?= $slider[$i][0] ?>"> <!-- random image -->
                <div class="caption right-align" style="z-index: 9;margin-top: 10%">
                    <h5 style="direction: rtl"><?= $slider[$i][1] ?></h5>
                    <h6 class="light grey-text text-lighten-3"><?= $slider[$i][2] ?></h6>
                </div>
            </li>
            <?php
        }
        ?>

    </ul>
</div>

<div class="col s12" style="width:100%;position:absolute;top: 100%;overflow-x: hidden;overflow-y: hidden">


    <div class="container tcol s12" style="margin-top: 60px;">
        <div class="row">
            <div class="col s12 m6 l4" style="margin-bottom: 20px;" data-aos="zoom-in" data-aos-duration="1000">

                <div class="col s12 row" style="margin-bottom: -30px;">
                    <div class="col s2 right" style="font-size: 48px;line-height: 2.2;color: #ffd635;">
                        <i class="fa fa-chart-bar"></i>
                    </div>
                    <div class="col s10 right-align">
                        <p style="margin-bottom: 0px !important;color: #fff;">مزایای استفاده از یارا</p>
                        <p style="margin-top: 10px !important;font-size: 19px;color: #ffd600;">رشد قابل توجه هنگام
                            تحصیل</p>
                    </div>
                </div>

                <div class="col s12 right-align" style="color: #fff;direction: rtl;font-size: 13px;">
                    <p>متد ها و روش های استفاده شده در یارا به شما و کسانی که آموزش های ما را دنبال میکنند ؛ کمک میکند
                        تا در کوتاه ترین زمان ، بیشترین میزان یادگیری را داشته و روند صعودی به همراه ماندگاری دائمی را
                        در ذهن تان تجربه کنید و نیازی به خواندن هایی با دفعات بالا نداشته باشید.</p>
                </div>

            </div>


            <div class="col s12 m6 l4 " style="margin-bottom: 20px;" data-aos="zoom-in" data-aos-delay="300"
                 data-aos-duration="1000">

                <div class="col s12 row" style="margin-bottom: -30px;">
                    <div class="col s2 right" style="font-size: 48px;line-height: 2.2;color: #dc3545 !important;">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="col s10 right-align">
                        <p style="margin-bottom: 0px !important;color: #fff;">مزایای استفاده از یارا</p>
                        <p style="margin-top: 10px !important;font-size: 19px;color: #dc3545 !important;">گفتگوی آسان و
                            دائم با اساتید یارا</p>
                    </div>
                </div>

                <div class="col s12 right-align" style="color: #fff;direction: rtl;font-size: 13px;">
                    <p>در نرم افزار یارا شما به راحتی میتوانید ب اساتیدی که کتاب های خریداری شده توسط شما را نوشته اند
                        گفتگو کنید؛انتقاد کنید ؛ کمک بگیرید و حتی با آن ها همکاری کنید و کسب درآمد بنمایید.</p>
                </div>

            </div>


            <div class="col s12 m6 l4" style="margin-bottom: 20px;" data-aos="zoom-in" data-aos-delay="600"
                 data-aos-duration="1000">

                <div class="col s12 row" style="margin-bottom: -30px;">
                    <div class="col s2 right" style="font-size: 48px;line-height: 2.2;color: #28a745 !important;">
                        <i class="fa fa-mobile"></i>
                    </div>
                    <div class="col s10 right-align">
                        <p style="margin-bottom: 0px !important;color: #fff;">مزایای استفاده از یارا</p>
                        <p style="margin-top: 10px !important;font-size: 19px;color: #28a745 !important;">نرم افزار جامع
                            و پرهیجان یارا</p>
                    </div>
                </div>

                <div class="col s12 right-align" style="color: #fff;direction: rtl;font-size: 13px;">
                    <p>تلاش ما بر این بوده است که یادگیری همواره بر اساس بازی و سرگرمی باشد تا نتنها زمان یادگیری کاهش
                        یابد ، بلکه اثر بخشی آن نیز مضاعف شود . تمامی اینها را شما میتوانید در نرم افزار یارا مشاهده
                        کنید.</p>
                </div>

            </div>


            <div class="col s12" style="margin-top:80px;">
                <div class="container s">
                    <div class="row">
                        <div class="col s12 m4 l4 right" data-aos="fade-left" data-aos-duration="1000">
                            <img src="public/img/learn-yara.jpg" class="responsive-img"
                                 style="border-radius: 7px;box-shadow: 0 0 13px 9px rgba(0,0,0,0.2)"/>
                        </div>
                        <div class="col s12 m7 l7 right-align right">
                            <p data-aos="fade-right" data-aos-duration="1000" style="font-size: 30px;color: #ffd635;">
                                نحوه ی یادگیری در یارا</p>
                            <p data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300"
                               style="font-size: 21px;direction: rtl;color: #fff;text-align: justify;">ما در یارا متعهد
                                شده ایم که تا محصل هایی که به جمع ما پیوسته اند به مقصد خود نرسیده اند آنها
                                را ترک نکنیم و این شعار ما برای حسن انجام وظیفه است. <br/>
                                روش های آموزشی متعددی برای شما در نظر گرفته شده است. <br/>
                                شما با تصاویر ، صدا و بازی های مختلفی درگیر خواهید شد تا بتوانید بیشترین ارتباط را با
                                نرم افزار و آموزش برقرار کنید. و این آموزش های مصور و سرگرم کننده مطمئنن در روند آموزشی
                                شما تاثیر گذار خواهد بود.<br/>

                            </p>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col s12" style="margin-top:80px;">
                <div class="container s">
                    <div class="row">
                        <div class="col s12 m4 l4 left" data-aos="fade-right" data-aos-duration="1000">
                            <img src="public/img/support.jpg" class="responsive-img"
                                 style="border-radius: 7px;box-shadow: 0 0 13px 9px rgba(0,0,0,0.2)"/>
                        </div>
                        <div class="col s12 m7 l7 right-align left">
                            <p data-aos="fade-left" data-aos-duration="1000" style="font-size: 30px;color: #ffd635;">
                                گزارش دهی به موقع و زمانبندی شده </p>
                            <p data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300"
                               style="font-size: 21px;direction: rtl;color: #fff;text-align: justify;">
                                یارا چه برای محصلین و گاها برای والدین محصلین ، سیستم گزارش دهی قدرتمندی تعبیه کرده است.
                                <br/>
                                این مزیت علاوه بر اینکه برای خود محصلین بسیار کارآمد و باعث پیشرفت و پیگیر شدن مضاعف آن
                                ها نسبت به درس میشود ؛ نوید بخش برای والدین خواهد بود که میتوانند گزارشی از عملکرد
                                فرزندانشان را در زمان های معین بدست بیاورند تا میزان پیشرفت یا عدم فعالیت فرزندشان را
                                زیر نظر داشته باشند. <br/>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="section" style="padding-bottom: 0px;margin-bottom: -20px;">
        <div class="row" style="background: #3a3a3a;position: relative">


            <div class="col s12 m4 l4 right" style="position:relative;margin-bottom: -7px !important;">
                <img src="public/img/teacher.jpg" class="responsive-img"/>
                <a href="<?= URL ?>register" class="btn waves-effect hide-on-large-only" id="btn_sub_to_yara">ثبت
                    نام در یارا</a>
            </div>

            <div class="col s12 m8 l8 right-align" style="position:relative;">


                <p data-aos="zoom-in" data-aos-duration="500"
                   style="font-size: 21px;color: #fff;margin-top:15px;margin-bottom: 0px;"><span
                            style="border-right: 3px solid rgb(195, 7, 7)">&nbsp;&nbsp;&nbsp;قوانین استخدام در یارا&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;
                </p>
                &nbsp;&nbsp;&nbsp;<p data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200"
                                     style="margin-left:10px;margin-right:10px;font-size: 15px;direction:rtl;text-align:justify;color: #fff;margin-top: 0px;">
                    ما برای حفظ کیفیت آموزش ها و تضمین آن ها به محصل جهت مفید بودن و قابل درک بودن و از همه مهمتر
                    کامل بودن آموزش ها یکسری معیار برای جذب مدرس در یارا دارید.<br/>
                    تعدادی از این معیار ها را در زیر برای آشنایی نسبی شما با مدرسین و نحوه ی جذب مدرس بیان کرده ایم.
                </p>
                <p data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300"
                   style="direction:rtl;font-size: 13px;color: #fff;margin-right: 20px;margin-left: 10px;"><i
                            class="fa fa-check" style="color: rgb(195, 7, 7) !important;"></i>&nbsp;&nbsp;&nbsp;
                    داشتن حداقل دو سال سابقه کار مرتبط با دروس مورد تدریس </p>
                <p data-aos="zoom-in" data-aos-duration="500" data-aos-delay="400"
                   style="direction:rtl;font-size: 13px;color: #fff;margin-right: 20px;margin-left: 10px;"><i
                            class="fa fa-check" style="color: rgb(195, 7, 7) !important;"></i>&nbsp;&nbsp;&nbsp;
                    داشتن مدرک دانشگاهی معتبر مرتبط با دروس مورد تدریس </p>
                <p data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500"
                   style="direction:rtl;font-size: 13px;color: #fff;margin-right: 20px;margin-left: 10px;"><i
                            class="fa fa-check" style="color: rgb(195, 7, 7) !important;"></i>&nbsp;&nbsp;&nbsp;
                    داشتن روحیه و دانش کافی برای تدریس و پشتیبانی محصل بعد از خرید محصول </p>
                <p data-aos="zoom-in" data-aos-duration="500" data-aos-delay="600"
                   style="direction:rtl;font-size: 13px;color: #fff;margin-right: 20px;margin-left: 10px;"><i
                            class="fa fa-check" style="color: rgb(195, 7, 7) !important;"></i>&nbsp;&nbsp;&nbsp;
                    پایبند به قوانین اخلاقی و رفتاری هنگام پاسخگویی به ارباب رجوع </p>


                <a href="<?= URL ?>register" data-aos="fade-up" data-aos-duration="500" data-aos-delay="600"
                   class="btn waves-effect hide-on-med-and-down"
                   style="background: #ffc107;color: #000;font-size: 13px;margin: 16px;padding-right: 50px;padding-left: 50px;cursor: pointer;">ثبت
                    نام در یارا</a>
            </div>

        </div>

    </div>


    <div class="parallax-container" style="height: 300px !important;">
        <div class="parallax">

            <div style="background: rgba(0,0,0,0.5);position:absolute;left: 0px;top: 0px;z-index: 9999;width: 100%;height: 100%">

                <div class="row">
                    <div class="col s3 hide-on-med-and-down"></div>
                    <div class="col s12 m12 l6" style="z-index: 99999;margin-top: 20px;">

                        <p data-aos="fade-down" data-aos-duration="1000"
                           style="color: #fff;font-size: 30px;margin-bottom: 0px" class="center-align"><i
                                    class="fa fa-map"></i></p>
                        <p data-aos="fade-up" data-aos-duration="1000"
                           style="color: #fff;font-size: 16px;margin-top: 0px;" class="center-align">آدرس شرکت یارا برای
                            ملاقات حضوری</p>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300"
                           style="color: #fff;font-size: 14px;margin-top: 0px;"
                           class="center-align"><?= $address['address'] ?></p>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500"
                           style="font-family: arial;color: #fff;font-size: 14px;margin-top: 0px;" class="center-align">
                            <i
                                    class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp; <?= $address['phone'] ?> </p>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600"
                           style="color: #fff;font-size: 14px;margin-top: 0px;font-family: arial" class="center-align">
                            <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp; <?= $address['email'] ?> </p>

                    </div>
                    <div class="col s3 hide-on-med-and-down"></div>
                </div>


            </div>


            <img style="background: red" src="<?= URL ?>public/img/loginback.jpg"/>


        </div>
    </div>


    <div class="section" style="top: 100% !important;">


        <div class="container">

            <div class="row" data-aos="fade-down">

                <div class="col s6">
                    <a href="<?= URL ?>shop"
                       style="color: #ffd600;font-size: 15px;padding-right: 15px;text-align: left;margin-left: 15px;line-height: 4.5;">
                        <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;مشاهده همه </a>
                </div>

                <div class="col s6">
                    <p style="color: #fff;text-align: right;font-size: 19px;padding-right: 15px;">برخی از محصولات
                        یارا</p>
                </div>
            </div>

            <div class="row flexbox">
                <div class="col s12">


                    <?php
                    for ($i = 0; $i < sizeof($pro_top); $i++) {
                        ?>


                        <div class="col s12 m4 l3 right" id="box_shoping_clicks" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="<?= $i*200 ?>" >
                            <div class="card hoverable">
                                <div class="card-image" style="position: relative">
                                    <img id="image_pro" src="<?= $pro_top[$i]['logo'] ?>">
                                </div>
                                <div class="card-content"><p
                                            style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: 13px;"><?= $pro_top[$i]['mini_tit'] ?></p>
                                </div>
                            </div>
                        </div>


                        <?php
                    }
                    ?>


                </div>

            </div>


        </div>


        <div class="container">
            <div class="row">
                <div class="col s12">

                </div>
            </div>
        </div>

        <div class="row" style="display: none; background: rgb(2,0,36);box-shadow: 0px 0px 5px 3px rgba(0,0,0,0.5);
background: linear-gradient(90deg, rgba(2,0,36,0.16288513696494222) 0%, rgba(41,50,96,1) 49%, rgba(2,0,36,0.17408961875765927) 100%); ">
            <div class="col s12">


                <div class="col s12" style="">
                    <div class="carousel" style="height: 620px !important;margin-top: -80px;margin-bottom: 15px;">
                        <a class="carousel-item" href="#one!">

                            <div class="card" style="height: 380px;background: #fff !important;">

                                <div class="col s12">
                                    <img src="public/dist/img/avatar.png"
                                         style="float: right;width: 100%;margin: 12px 0px;border-radius: 5px;">
                                </div>

                                <p style="color: #000;text-align: center">این یک تست است</p>
                                <div class="col s12 flexbox">
                                    <button class="btn waves-effect" style="background: #dd2c00;color: #fff;">&nbsp;&nbsp;&nbsp;بیشتر&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>


                        </a>
                        <a class="carousel-item" href="#tow!">

                            <div class="card" style="height: 380px;background: #fff !important;">

                                <div class="col s12">
                                    <img src="/images/parallax2.jpg"
                                         style="float: right;width: 100%;margin: 12px 0px;border-radius: 5px;">
                                </div>

                                <p style="color: #000;text-align: center">این یک تست است</p>
                                <div class="col s12 flexbox">
                                    <button class="btn waves-effect" style="background: #dd2c00;color: #fff;">&nbsp;&nbsp;&nbsp;بیشتر&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>


                        </a>
                        <a class="carousel-item" href="#three!">

                            <div class="card" style="height: 380px;background: #fff !important;">

                                <div class="col s12">
                                    <img src="/images/parallax2.jpg"
                                         style="float: right;width: 100%;margin: 12px 0px;border-radius: 5px;">
                                </div>

                                <p style="color: #000;text-align: center">این یک تست است</p>
                                <div class="col s12 flexbox">
                                    <button class="btn waves-effect" style="background: #dd2c00;color: #fff;">&nbsp;&nbsp;&nbsp;بیشتر&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>


                        </a>
                        <a class="carousel-item" href="#four!">

                            <div class="card" style="height: 380px;background: #fff !important;">

                                <div class="col s12">
                                    <img src="/images/parallax2.jpg"
                                         style="float: right;width: 100%;margin: 12px 0px;border-radius: 5px;">
                                </div>

                                <p style="color: #000;text-align: center">این یک تست است</p>
                                <div class="col s12 flexbox">
                                    <button class="btn waves-effect" style="background: #dd2c00;color: #fff;">&nbsp;&nbsp;&nbsp;بیشتر&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>


                        </a>
                        <a class="carousel-item" href="#five!">

                            <div class="card" style="height: 320px;background: #fff !important;">

                                <div class="col s12">
                                    <img src="/images/parallax2.jpg"
                                         style="float: right;width: 100%;margin: 12px 0px;border-radius: 5px;">
                                </div>

                                <p style="color: #000;text-align: center">این یک تست است</p>
                                <div class="col s12 flexbox">
                                    <button class="btn waves-effect" style="background: #dd2c00;color: #fff;">&nbsp;&nbsp;&nbsp;بیشتر&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>


                        </a>
                    </div>

                </div>


            </div>
        </div>


    </div>

    <div class="container" style="display:none;width: 65% !important;margin-top: 50px;margin-bottom: 50px;">
        <div class="row">


            <div class="flexbox">
                <div class="col s6 m3" data-aos="zoom-in" data-aos-delay="600">

                    <div class="col s12 flexbox" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="900">
                        <a class="btn-floating matblue btn-large pulse" style="text-align: center"><i
                                    class="fa fa-thumbs-up"></i></a>
                    </div>
                    <div class="col s12 flexbox" style="color: #fff;">
                        <p style="text-align: center">کاربر پسندی بالا</p>
                    </div>


                </div>


                <div class="col s6 m3" data-aos="zoom-in" data-aos-delay="600">

                    <div class="col s12 flexbox" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="600">
                        <a class="btn-floating matblue btn-large pulse" style="text-align: center"><i
                                    class="fa fa-leaf"></i></a>
                    </div>
                    <div class="col s12 flexbox" style="color: #fff;">
                        <p style="text-align: center">کاربر پسندی بالا</p>
                    </div>


                </div>


                <div class="col s6 m3" data-aos="zoom-in" data-aos-delay="300">

                    <div class="col s12 flexbox" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="300">
                        <a class="btn-floating matblue btn-large pulse" style="text-align: center"><i
                                    class="fa fa-football-ball"></i></a>
                    </div>
                    <div class="col s12 flexbox" style="color: #fff;">
                        <p style="text-align: center">کاربر پسندی بالا</p>
                    </div>

                </div>


                <div class="col s6 m3" data-aos="zoom-in">

                    <div class="col s12 flexbox" data-aos="flip-right" data-aos-duration="1000">
                        <a class="btn-floating matblue btn-large pulse" style="text-align: center"><i
                                    class="fa fa-leaf"></i></a>
                    </div>
                    <div class="col s12 flexbox" style="color: #fff;">
                        <p style="text-align: center">کاربر پسندی بالا</p>
                    </div>


                </div>


            </div>
        </div>

    </div>

    <div class="section">


        <div class="row">

            <ul id="show_condition_main">

                <li class="col s6 m3 l3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"
                    style="background: #ffd600;"
                    id="box_hosdar">
                    <div id="main_box_cond">
                        <div id="copy_tit">
                            <p style="font-size: 49px;padding: 0;margin: 0;"><i class="fa fa-copy"></i></p>
                            <p style="font-size: 21px;margin: 0px;">کپی برداری</p>
                        </div>
                        <p id="copy_in_main">برابر با قوانین شرعی و عرفی جامعه هر گونه کپی برداری بدون ذکر منبع پیگرد
                            قانونی خواهد داشت.</p>
                    </div>
                </li>
                <li class="col s6 m3 l3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"
                    style="background: orange;"
                    id="box_hosdar">
                    <div id="main_box_cond">
                        <div id="copy_tit">
                            <p style="font-size: 49px;padding: 0;margin: 0;"><i class="fa fa-headphones"></i></p>
                            <p style="font-size: 21px;margin: 0px;">پشتیبانی</p>
                        </div>
                        <p id="copy_in_main">اعضای یارا به صورت 24 ساعته به درخواست های شما پاسخ خواهند داد.</p>
                    </div>
                </li>
                <li class="col s6 m3 l3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"
                    style="background: #ffd600;"
                    id="box_hosdar">


                    <div id="main_box_cond">
                        <div id="copy_tit">
                            <p style="font-size: 49px;padding: 0;margin: 0;"><i class="fa fa-lock"></i></p>
                            <p style="font-size: 21px;margin: 0px;">امنیت</p>
                        </div>
                        <p id="copy_in_main">با توجه به داشتن نماد اعتماد الترونیکی ، یارا به شما این اطمینان را میدهد
                            تا با آرامش خاطر از آن خرید و استفاده کنید.</p>
                    </div>
                </li>
                <li class="col s6 m3 l3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"
                    style="background: orange;"
                    id="box_hosdar">
                    <div id="main_box_cond">
                        <div id="copy_tit">
                            <p style="font-size: 49px;padding: 0;margin: 0;"><i class="fa fa-tablet"></i></p>
                            <p style="font-size: 21px;margin: 0px;">واکنش گرا</p>
                        </div>
                        <p id="copy_in_main">علاوه بر نرم افزار یارا ، وب سایت آن نیز تماما واکنش گرا با تمامی دستگاه ها
                            میباشد و حس لذت بخشی به شما خواهد داد. </p>
                    </div>
                </li>

            </ul>

        </div>


    </div>


    <div class="section">
        <div class="row">

            <div class="col s12">
                <p data-aos="zoom-in" data-aos-duration="700"
                   style="text-align: center;font-size: 23px;font-weight: bold;color: #fff;">بیوگرافی تیم یارا</p>
                <p data-aos="zoom-out" data-aos-duration="700"
                   style="text-align: center;font-size: 18px;color: #fff;direction: rtl;margin-bottom: 40px;">تیم یارا
                    از
                    سال 98
                    در راستای تولید
                    محتوای آموزش شروع به کار کرد و تاکنون محتوای قابل قبولی از نظر مشتریان ارائه داده است.</p>

                <div class="col s12 m6 l4" data-aos="fade-right"
                     data-aos-anchor-placement="center-center">

                    <div class="row">

                        <div class="col s12" style="margin-top: 20px;">
                            <div class="card-panel teal"
                                 style="position:relative;background: #293260 !important;font-size: 17px;text-align: justify;direction: rtl;">
                                <span class="white-text"><?= $user_top[0]['uni'] ?></span>

                                <div class="polygon"></div>

                            </div>

                            <?php
                            $img_logo = 'public/dist/img/avatar04.png';
                            if ($user_top[0]['profile_img'] != '')
                            {
                                $img_logo = $user_top[0]['profile_img'];
                            }
                            ?>
                            <div class="col s12 m12" style="margin-top: 20px;">
                                <div class="flexbox">
                                    <div style="width: 90px;height: 90px;background: #293260;border-radius: 100%;"
                                         class="pulse">
                                        <img class="pulse" src="<?= $img_logo ?>"
                                             style="width: 90px;border-radius: 100%;height: 90px;"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m12">
                                <p style="text-align: center;color: #fff;font-size: 14px;"><?= $user_top[0]['name'] . " " . $user_top[0]['fam'] ?></p>
                            </div>


                        </div>

                    </div>


                </div>


                <div class="col s12 m6 l4" data-aos="zoom-in">


                    <div class="row">

                        <div class="col s12" style="margin-top: -10px;">
                            <div class="card-panel teal"
                                 style="position:relative;background: #ffd600 !important;direction: rtl;text-align: justify;font-size: 17px;">
                                <span class="white-text"
                                      style="color: #000 !important;"><?= $user_top[2]['uni'] ?></span>

                                <div class="polygon" style="background: #ffd600 !important;"></div>

                            </div>

                            <?php
                            $img_logo_mo = 'public/dist/img/avatar3.png';
                            if ($user_top[2]['profile_img'] != '')
                            {
                                $img_logo_mo = $user_top[2]['profile_img'];
                            }
                            ?>

                            <div class="col s12 m12" style="margin-top: 20px;">
                                <div class="flexbox">
                                    <div style="width: 90px;height: 90px;background: #ffd600;border-radius: 100%;"
                                         class="pulse">
                                        <img class="pulse" src="<?= $img_logo_mo ?>"
                                             style="width: 90px;border-radius: 100%;height: 90px;"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m12">
                                <p style="text-align: center;color: #fff;font-size: 14px;"><?= $user_top[2]['name'] . " " . $user_top[2]['fam'] ?></p>
                            </div>


                        </div>

                    </div>


                </div>
                <div class="col s12 m6 l4" data-aos="fade-left"
                     data-aos-anchor-placement="center-center">


                    <div class="row">

                        <div class="col s12" style="margin-top: 20px;">
                            <div class="card-panel teal"
                                 style="position:relative;background: #293260 !important;font-size: 19px;text-align: justify;direction: rtl">
                                <span class="white-text"><?= $user_top[1]['uni'] ?></span>

                                <div class="polygon"></div>

                            </div>

                            <?php
                            $img_logo_1 = 'public/dist/img/avatar2.png';
                            if ($user_top[1]['profile_img'] != '')
                            {
                                $img_logo_1 = $user_top[1]['profile_img'];
                            }
                            ?>


                            <div class="col s12 m12" style="margin-top: 20px;">
                                <div class="flexbox">
                                    <div style="width: 90px;height: 90px;background: #293260 !important;border-radius: 100%;"
                                         class="pulse">
                                        <img class="pulse" src="<?= $img_logo_1 ?>"
                                             style="width: 90px;border-radius: 100%;height: 90px;"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m12">
                                <p style="text-align: center;color: #fff;font-size: 14px;"><?= $user_top[1]['name'] . " " . $user_top[1]['fam'] ?></p>
                            </div>


                        </div>

                    </div>


                </div>
            </div>


        </div>
    </div>


    <div class="section" style="margin-bottom:-21px !important;background: rgb(2,0,36);box-shadow: 0px 0px 5px 3px rgba(0,0,0,0.5);
background: linear-gradient(90deg, rgba(2,0,36,0.16288513696494222) 0%, rgba(41,50,96,1) 49%, rgba(2,0,36,0.17408961875765927) 100%); ">

        <div class="container" style="display: none">
            <div class="row">

                <div class="col s12 m3 l4 flexbox " data-aos="fade-right">

                    <img src="public/img/newsletter.png" style="width: 45%;margin-top: 4%;margin-bottom: -2%;"/>

                </div>

                <div class="col s12 m9 l8">

                    <div class="col s12" data-aos="fade-down" data-aos-duration="1000">
                        <p style="text-align: center;direction: rtl;font-size: 17px;color: #fff;">در خبر نامه ما مشترک
                            شوید
                            تا از آخرین محصولات باخبر گردید.</p>
                    </div>

                    <div class="col s12" data-aos="fade-up" data-aos-duration="1000">
                        <div class="col s12 m9 l9 input-field"
                             style="height:55px;border-radius: 5px;background: #293260;box-shadow: 0 0px 5px 2px rgba(0,0,0,0.5);">
                            <div class="row">
                                <div class="col s10">
                                    <input id="icon_prefix" type="text"
                                           style="color: #fff;direction: rtl;margin-top: 4px;"
                                           placeholder="ایمیل ...">
                                </div>
                                <div class="col s2" style="text-align: center">
                                    <i class="fa fa-mail-bulk"
                                       style="font-size: 20px;margin-top: 15px;color: #ffd600;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m3 l3">
                            <button class="btn waves-effect"
                                    style="direction: rtl;height: 50px;margin-top: 17px;background: #ffd600;color: #000;">
                                مشترک شدن!
                            </button>
                        </div>


                    </div>


                </div>

            </div>
        </div>


        <div class="container" style="width: 65% !important;margin-top: 50px;margin-bottom: 50px;">
            <div class="row">


                <div class="flexbox">
                    <div class="col s6 m3" data-aos="zoom-out-right" data-aos-duration="500" data-aos-delay="300">

                        <div class="col s12 flexbox">
                            <a class="btn-floating matblue btn-large pulse"
                               style="text-align: center;line-height: 4.4;"><i
                                        style="font-size: 21px;" class="fa fa-users"></i></a>
                        </div>
                        <div class="col s12 flexbox" style="color: #fff;">
                            <p style="text-align: center;margin-top: 21px;margin-bottom: 0px;font-size: 26px;font-family: arial;">
                                <span class="counter"><?=  $tot_countss[1]; ?></span></p>
                        </div>
                        <div class="col s12 flexbox" style="color: #fff;">
                            <p style="text-align: center;margin-top: 0px;">محصلین یارا</p>
                        </div>

                    </div>


                    <div class="col s6 m3" data-aos="zoom-out-right" data-aos-duration="1000">

                        <div class="col s12 flexbox">
                            <a class="btn-floating matblue btn-large pulse"
                               style="text-align: center;line-height: 4.4;"><i
                                        style="font-size: 21px;" class="fa fa-book"></i></a>
                        </div>
                        <div class="col s12 flexbox" style="color: #fff;">
                            <p style="text-align: center;margin-top: 21px;margin-bottom: 0px;font-size: 26px;font-family: arial;">
                                <span class="counter"><?=  $tot_countss[2] ?></span></p>
                        </div>
                        <div class="col s12 flexbox" style="color: #fff;">
                            <p style="text-align: center;margin-top: 0px;">دایره لغات نرم افزار</p>
                        </div>

                    </div>


                    <div class="col s6 m3" data-aos="zoom-out-left" data-aos-duration="1000">

                        <div class="col s12 flexbox">
                            <a class="btn-floating matblue btn-large pulse"
                               style="text-align: center;line-height: 4.4;"><i
                                        style="font-size: 21px;" class="fa fa-comments"></i></a>
                        </div>
                        <div class="col s12 flexbox" style="color: #fff;">
                            <p style="text-align: center;margin-top: 21px;margin-bottom: 0px;font-size: 26px;font-family: arial;">
                                <span class="counter"><?=  $tot_countss[3] ?></span></p>
                        </div>
                        <div class="col s12 flexbox" style="color: #fff;">
                            <p style="text-align: center;margin-top: 0px;">تیکت های پاسخ داده شده</p>
                        </div>

                    </div>


                    <div class="col s6 m3" data-aos="zoom-out-left" data-aos-duration="500" data-aos-delay="300">

                        <div class="col s12 flexbox">
                            <a class="btn-floating matblue btn-large pulse"
                               style="text-align: center;line-height: 4.4;"><i
                                        style="font-size: 21px;" class="fa fa-heart"></i></a>
                        </div>
                        <div class="col s12 flexbox" style="color: #fff;">
                            <p class="counter"
                               style="text-align: center;margin-top: 21px;margin-bottom: 0px;font-size: 26px;font-family: arial;">
                                <?=  $tot_countss[0] ?></p>
                        </div>
                        <div class="col s12 flexbox" style="color: #fff;">
                            <p style="text-align: center;margin-top: 0px;">کاربر پسندی </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col s12" style="margin-top: 50px;">


        <div class="row">
            <p style="font-size: 21px;text-align: center;color: #fff;margin-top: 45px;">برخی از نظرات محصلان و
                کاربران</p>
            <div class="carousel carousel-slider center " style="height: 180px !important;">

                <?php
                if ($comment) {
                    for ($i = 0; $i < sizeof($comment); $i = $i + 2) {
                        $date_arr = explode('/', $comment[$i]['date']);
                        $years = $date_arr[0];
                        $monss = $date_arr[2];
                        $dayss = $date_arr[3];
                        $date = $dayss . " " . $monss . " " . $years;
                        ?>
                        <div style="width: 100% !important;height: 180px !important;" class="carousel-item white-text">
                            <div class="col s12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col s12 m6 l6 right" data-aos="zoom-in" data-aos-duration="1000">
                                            <div class="card-panel"
                                                 style="color: #000 !important;background:#ffd600 !important;box-shadow:0 0 7px 3px rgba(0,0,0,0.2);padding: 9px 20px;text-align: right;border-top: none !important;">
                                                <p><span id="sender_mark"
                                                         style="color:#fff !important;background:#000;font-size: 13px;margin-left: 10px;"
                                                         class="right"><?= $comment[$i]['sender'] ?></span><?= $comment[$i]['data'] ?>
                                                    <br/><span
                                                            style="margin-right: 15px;position: absolute;top: 1px;left: 11px;border-radius: 0px 0px 12px 0px;"
                                                            id="modir_mark"><?= $date ?></span></p>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($comment[$i + 1])) {
                                            $date_arr_1 = explode(' / ', $comment[$i + 1]['date']);
                                            $years = $date_arr_1[0];
                                            $monss = $date_arr_1[2];
                                            $dayss = $date_arr_1[3];
                                            $date_1 = $dayss . " " . $monss . " " . $years;
                                            ?>
                                            <div class="col s12 m6 l6" data-aos="zoom-in" data-aos-duration="1000">
                                                <div class="card-panel"
                                                     style="box-shadow:0 0 7px 3px rgba(0,0,0,0.2);padding: 9px 20px;text-align: right;border-top: none !important;">
                                                    <p><span id="sender_mark" style="font-size: 13px;margin-left: 10px;"
                                                             class="right"><?= $comment[$i + 1]['sender'] ?></span>
                                                        <?= $comment[$i + 1]['data'] ?><br/><span
                                                                style="margin-right: 15px;position: absolute;top: 1px;left: 11px;border-radius: 0px 0px 12px 0px;"
                                                                id="modir_mark"><?= $date_1 ?></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12 l6 right right-align hide-on-small-and-down"
                         style="margin-top: 17px;">
                        <span style="color: #fff;font-size: 13px;"> @ کپی برداری با ذکر منبع بلامانع است. ( 1400 - 1399 )</span>
                    </div>
                    <div class="col s12 m12 l6 left" style="margin-top: 17px;">
                        <span class="left" style="font-family:arial;color: #fff;font-size: 13px;">
                            <i class="fa fa-phone"></i>&nbsp;&nbsp;+989175414381&nbsp;&nbsp;
                             &nbsp;&nbsp;@ rastadi_pk
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="public/dist/js/jquery.waypoints.min.js"></script>
<script src="public/dist/js/jquery.counterup.min.js"></script>
<script>
    $(function () {
        $('.counter').counterUp({
            delay: 10,
            time: 500
        });
    });
</script>

<script src="public/dist/js/materialize.min.js"></script>
<script src="public/dist/js/all.min.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
