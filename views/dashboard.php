<?php
$str_res = $data[1];
$course = $data[2];
$pay_report = $data[3];
$ticket = $data[4]['tickets'];
$sender_data = $data[4]['users'];
$user_data = $data[6];
$count_pay = $pay_report['count_pay'];
$total_pay = $pay_report['total_pay'];
$customer_data = $pay_report['user_data'];

$date_today = jdate("l d F Y");
$date_chat = jdate('d F');
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


    <!--    <link rel="stylesheet" href="public/dist/Chart.min.css"/>-->
    <!---->
    <!--    <script src="public/dist/Chart.bundle.min.js"></script>-->
    <!--    <script src="public/dist/Chart.min.js"></script>-->


    <link rel="stylesheet" href="public/dist/css//morris.css">
    <!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
    <script src="public/dist/js/raphael.min.js"></script>
    <script src="public/dist/js/morris.min.js"></script>


    <title>داشبورد</title>


</head>
<body>


<?php
require 'menu_top.php';
?>


<div class="section">

    <div class="row">


        <div class="col s12">

            <div style="width: 100%;float: right;text-align: right;font-size: 21px;color: #fff;margin-right: 20px;">
                داشبورد
            </div>

            <div class="col s12">

                <div class="col s12 m6 l3">
                    <div class="card-panel" id="card-paenl-index">
                        <div class="row valign-wrapper">
                            <div class="col s2"
                                 id="icon-card-panel">
                                <i class="fa fa-users responsive-img"> </i><!-- notice the "circle" class -->
                            </div>
                            <div class="col s10">
              <span style="color: #fff;">
مشتریان شما
              </span>
                                </br>
                                <span style="color: #ffc107;">
<?= sizeof($customer_data); ?> نفر
              </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col s12 m6 l3">
                    <div class="card-panel" id="card-paenl-index">
                        <div class="row valign-wrapper">
                            <div class="col s2"
                                 id="icon-card-panel" style="color: #28a745 !important">
                                <i class="fa fa-shopping-cart responsive-img"> </i><!-- notice the "circle" class -->
                            </div>
                            <div class="col s10">
              <span style="color: #fff;">
فروش های شما
              </span>
                                </br>
                                <span style="color: #28a745 !important;">
<?= $count_pay ?> فروش
              </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col s12 m6 l3">
                    <div class="card-panel" id="card-paenl-index">
                        <div class="row valign-wrapper">
                            <div class="col s2"
                                 id="icon-card-panel" style="color: #dc3545 !important">
                                <i class="fa fa-book responsive-img"> </i><!-- notice the "circle" class -->
                            </div>
                            <div class="col s10">
              <span style="color: #fff;">
دوره های آموزشی
              </span>
                                </br>
                                <span style="color: #dc3545 !important">
<?= sizeof($course); ?> دوره
              </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col s12 m6 l3">
                    <div class="card-panel" id="card-paenl-index">
                        <div class="row valign-wrapper">
                            <div class="col s2"
                                 id="icon-card-panel" style="color: #17a2b8 !important">
                                <i class="fa fa-book responsive-img"> </i><!-- notice the "circle" class -->
                            </div>
                            <div class="col s10">
              <span style="color: #fff;">
گردش مالی شما
              </span>
                                </br>
                                <span style="color: #17a2b8 !important">
<?= $total_pay ?> تومان
              </span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col s12 m12 l9">


                <div class="row" style="margin-top: 15px;">


                    <div class="col s12">


                        <p style="display:none;text-align: right;color: #fff">نمودار فروش شما طی ماه های قبل <i
                                    class="fa fa-chart-line"
                                    style="margin-left: 7px;"></i>
                        </p>

                        <div class="card-panel">

                            <div id="user_pay_changer" style="height: 250px;">

                                <?php
                                if (!$str_res)
                                {
                                    ?>

                                    <p style="position: absolute;top: 0px;left: 0px;right: 0px;text-align: center;color: #fff;direction: rtl;font-size: 19px;">بعد از اولین فروش ، نمودار برای شما فعال خواهد شد.</p>

                                <?php
                                }
                                ?>

                            </div>


                        </div>


                    </div>


                    <div class="col s12 m6 l6">


                        <div class="card-panel" style="padding: 12px;border-radius: 5px;">


                            <div class="row">

                                <div id="header" class="col s12">

                                    <span style="float: right;color: #fff"> برخی از مشتریان شما</span>
                                    <span id="modir_mark" style="float: left;"> <?= sizeof($customer_data) ?>
                                        عضو </span>

                                </div>

                                <div class="divider col s12" style="margin-top: 15px;background: #39618a"></div>

                                <div class="col s12">


                                    <?php
                                    if (sizeof($customer_data) > 0) {
                                        foreach ($customer_data as $value) {

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


                                                    <img src="<?= $img ?>" style="width: 100%; !important;height: 150px !important;"
                                                         class="responsive-img circle"/>

                                                    <div id="pro_card_content" style="margin-top:15px;height: auto">
                                                        <p style="font-size: 12px;margin: 0px"><?= $value['names'] ?></p>
                                                        <p style="font-size: 12px;margin:0px;color: #ffc107 !important"><?= $date_our ?></p>

                                                    </div>

                                                </div>
                                            </div>

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

                            </div>


                        </div>


                    </div>

                    <div class="col s12 m6 l6">

                        <div class="card-panel"
                             style="overflow: hidden;padding: 12px;border-radius: 5px;position:relative;">


                            <div class="row" style="margin-bottom: -12px;">

                                <div id="header" class="col s12" style="direction: rtl;color: #fff">


                                    <span class="more_icons active_icon" id="icon"
                                          style="float:right;margin-left: 20px;margin-right: 0px;font-size: 17px;cursor: pointer"><i
                                                class="fa fa-ellipsis-v"></i> </span>

                                    <span id="icon" class="refresh_chat"
                                          style="float:right;margin-left: 20px;margin-right: 0px;font-size: 17px;cursor: pointer"><i
                                                class="fa fa-recycle" aria-hidden="true"></i> </span>

                                    <span style="font-size: 13px;color: #fff;" id="title_chats"
                                          class="title_chats__"></span>


                                    <span id="modir_mark" style="float: left"><?= sizeof($ticket) ?> تیکت جدید</span>


                                </div>

                                <div class="divider col s12" style="margin-top: 15px;"></div>

                                <div class="col s12" id="page_chat">


                                    <div id="back_stage_contact">


                                        <?php
                                        if (sizeof($ticket) > 0) {
                                            foreach ($ticket as $key => $value) {

                                                $user_nic = '';
                                                if ($sender_data[$key]['names'] != '') {
                                                    $user_nic = $sender_data[$key]['names'];
                                                } else {
                                                    $user_nic = "کاربر نامشخص";
                                                }
                                                $user_id = $sender_data[$key]['id'];
                                                $user_img = $sender_data[$key]['img'];

                                                $date = explode('/', $value['first_date']);
                                                $date_show = $date[3] . " " . $date[2];
                                                ?>


                                                <div class="col s12 ">


                                                    <div class="card-panel" id="card-paenl-index"
                                                         style="background:none !important;padding: 0px;box-shadow: none !important;margin-bottom: -10px;">
                                                        <div class="row valign-wrapper" style="margin-bottom: 5px;">
                                                            <div class="col s12" style="padding-right: 0px;">


                                                                <div class="col s10 back_ticket"
                                                                     id="<?= $value['id']; ?>"
                                                                     style="margin-top:7px;position:relative;background: #ffc107 !important;font-size: 12px;padding: 10px;text-align: justify;border-radius: 5px;">
                                                                    <div id="chev_right"></div>
                                                                    <span style="width: 100%;color: #000;">

                                                                <div id="modir_mark"
                                                                     style="left: 5px;position: absolute;bottom: 5px;"><?= $date_show; ?></div>

<a id="sender_mark" style="float: right;margin-left: 7px"><?= $user_nic ?></a>

                                                                        <?= $value['title'] ?>
              </span>

                                                                </div>


                                                                <div class="col s2">

                                                                    <img src="public/dist/img/avatar.png"
                                                                         class="responsive-img circle"/>

                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>


                                                </div>


                                                <?php
                                            }
                                        } else {
                                            ?>

                                            <p style="text-align: center;font-size: 21px;color: #fff;direction: rtl;">
                                                شما هنوز تیکتی دریافت نکرده اید.</p>

                                            <?php
                                        }
                                        ?>
                                    </div>


                                    <!--     modir sender   -->


                                    <div id="loading_chats">

                                        <div class="preloader-wrapper big active"
                                             style="position: absolute;left: 0px;right: 0px;top: 0px;bottom: 0px;margin: auto;">
                                            <div class="spinner-layer spinner-blue">
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

                                            <div class="spinner-layer spinner-red">
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

                                            <div class="spinner-layer spinner-yellow">
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

                                            <div class="spinner-layer spinner-green">
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

                                    </div>


                                    <p id="select_chat">

                                        <img src="<?= URL ?>public/img/chat.png" width="80"/><br/>
                                        یک چت را برای پاسخگویی انتخاب کنید...
                                    </p>

                                    <div class="col s12" date-chat="<?= $date_chat ?>" id="chat_box_data" id-box="">


                                    </div>


                                    <!--

                                    <div class="col s12">


                                        <div class="card-panel" id="card-paenl-index"
                                             style="padding: 0px;box-shadow: none !important;">
                                            <div class="row valign-wrapper" style="margin-bottom: 5px;">
                                                <div class="col s12">

                                                    <div class="col s2">

                                                        <img src="public/dist/img/avatar.png"
                                                             class="responsive-img circle"/>

                                                    </div>
                                                    <div class="col s10"
                                                         style="position:relative;background: #dc3545 !important;font-size: 12px;padding: 10px;text-align: justify;border-radius: 5px;">
                                                        <div id="chev_left"></div>
                                                        <span style="width: 100%;color: #000;">
<a id="sender_mark" style="float: right;margin-left: 7px">شما</a>
گردش مالی شماگردش مالی شماگردش مالی شماگردش مالی شماگردش مالی شماگردش مالی شماگردش مالی شماگردش مالی شما
              </span>

                                                    </div>

                                                </div>


                                            </div>
                                            <p class="col s12"
                                               style="text-align: right;margin: 0px;font-size: 11px;color: #ffc107;">
                                                27 آبان ( 17:30 )<i class="fa fa-check-double"
                                                                    style="margin-right: 15px;color: #fff"></i></p>

                                        </div>


                                    </div>

                                    -->
                                    <!--   user sender    -->


                                    <div id="end_page_chat" style="width: 100%;float: right"></div>

                                </div>


                                <div class="col s12">

                                    <div class="progress" id="tic_progress" style="display: none">
                                        <div class="indeterminate"></div>
                                    </div>

                                </div>

                                <div class="col s12" id="send_ticket_text">

                                    <div id="form_ticket" style="margin-top: 7px;">
                                        <form>

                                            <a class="waves-effect waves-light btn" id="btn_in_form">
                                                ارسال&nbsp;&nbsp;<i
                                                        class="fa fa-reply"></i></a>
                                            <input type="text" style="width: 71%;" name="msg_text_tic"
                                                   placeholder="تایپ کنید ..." id="input_text_form"/>


                                        </form>
                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>


                </div>


            </div>


            <?php

            include 'menu_side.php';


            ?>


        </div>


    </div>


</div>


<script>

    var months = ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"];
    var datas = [<?php echo $str_res; ?>];
    Morris.Line({
        element: 'user_pay_changer',
        data: datas,
        xkey: 'm',
        ykeys: ['a'],
        labels: ['1398'],
        resize: 'true',
        gridTextFamily: 'b yekan',
        xLabelFormat: function (x) { // <--- x.getMonth() returns valid index
            var month = months[x.getMonth()];
            return month;
        },
        dateFormat: function (x) {
            var month = months[new Date(x).getMonth()];
            return month;
        },
    });


</script>


<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>