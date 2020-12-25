<?php

$news = $data[0];
$news_users = $data[1][0];
$user_id = $data[1][1];
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
                <a href="#">اخبار مدیریت</a>
            </div>

        </div>

        <div class="section">

            <div class="row">


                <div class="col s12 m12 l9" style="margin-top: 20px;">


                    <?php
                    if ($news[1] == 4240378133) {


                        foreach ($news[0] as $val) {
                            $date = explode('/', $val['date']);
                            $date_show = $date[0] . " " . $date[2];
                            $resiver = 'مدرسین';
                            if ($val['resiver'] == '3') {
                                $resiver = 'محصلین';
                            }else if($val['resiver'] == '2')
                            {
                                $resiver = 'مدرسین';
                            }
                            ?>

                            <div class="col s6 m4 l4 right" id="colse_modir_div_<?= $val['id'] ?>">

                                <div class="card" style="background-color: #1a2f66 !important;">
                                    <div class="card-content white-text">
                                                       <span class="card-title"
                                                             style="width: 100%;height: 40px;font-size: 16px;">

                                                           <div style="float: right;color: orange"><?= $date_show ?></div>


                                                       </span>
                                        <p><?= $val['text'] ?></p>
                                    </div>
                                    <div class="card-action"
                                         style="direction: rtl;margin-bottom: 30px;">
                                        <span class="left white-text"><?= $resiver ?></span>

                                        <span class="right white-text"
                                              style="height: 60px;width: 40px;margin-top: -5px;">
                                                            <p class="center-align" style="padding: 0px;margin: 0px;"><i
                                                                        class="fa fa-eye"></i></p>
                                                            <p class="center-align"
                                                               style="padding: 0px;margin: 0px;"><?= sizeof(json_decode($val['viewer'],true)) ?></p>
                                                        </span>
                                        <span id="del_news_mm" pro_id="<?= $val['id'] ?>" class="right white-text"
                                              style="cursor:pointer;height: 60px;width: 40px;margin-top: -5px;">
                                                            <p class="center-align" style="padding: 0px;margin: 0px;"><i
                                                                        class="fa fa-trash"></i></p>
                                                            <p class="center-align"
                                                               style="font-size:13px;padding: 0px;margin-top: 4px;">حذف</p>
                                                        </span>

                                    </div>
                                </div>

                            </div>


                            <?php
                        }


                    } else {
                        foreach ($news_users as $val) {
                            $date = explode('/', $val['date']);
                            $date_show = $date[0] . " " . $date[2];
                            $state = '';
                            $color  = '';
                            if ($val['state'] == '1')
                            {
                                $state="خیلی مهم";
                            }else{
                                $state = "عادی";
                                $color = 'color:#000 !important;background:orange !important';
                            }
                            ?>

                            <div class="col s6 m4 l4 right" id="user_box_newss">

                                <div class="card">
                                    <div class="card-content white-text">
                               <span class="card-title" style="width: 100%;height: 40px;font-size: 16px;">

                                   <div style="float: right;"><?= $date_show ?></div>
<!--                                   <div style="float: left">-->
<!--                                       <i class="fa fa-star" style="cursor: pointer"></i>-->
<!--                                       &nbsp;&nbsp;&nbsp;-->
<!--                                       <i class="fa fa-heart" style="cursor: pointer"></i>-->
<!--                                   </div>-->

                               </span>
                                        <p><?= $val['text'] ?></p>
                                    </div>
                                    <div class="card-action" style="direction: rtl;margin-bottom: 30px;">
                                        <a pro_id="<?= $val['id'] ?>" id="ok_modir_news_" style="cursor: pointer" class="left">متوجه شدم!</a>
                                        <a id="modir_mark" class="right" style="<?= $color ?>;font-size: 12px;margin: 0px"><?= $state ?></a>
                                    </div>
                                </div>

                            </div>


                            <?php
                        }
                    }
                    ?>


                </div>

                <?php

                include 'menu_side.php';

                ?>


            </div>


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