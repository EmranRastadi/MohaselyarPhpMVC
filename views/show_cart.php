<?php

$baskets = $data[0];
$tot_basket_price = 0;
$tot_without_dis = 0;

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
    <title>سبد خرید</title>


</head>
<body>

<?php
include 'menu_top.php';
?>

<!--<div style="width: 200px;height: 300px;position:fixed;background: #000;" class="d-hidden-mini"></div>-->


<div class="section">



        <div class="section" style="padding-top: 0;margin-top: -10px;">

            <div class="row">

                <p style="text-align: center;color: #fff;font-size: 19px;">بررسی و مدیریت سبد خرید</p>


                <div class="col s12">


                    <div class="card-panel">

                        <?php
                        if (sizeof($baskets) > 0) {
                            ?>

                            <div class="row">

                                <div class="col s12">
                                    <table class="responsive-table" id="show_cart_data"
                                           style="box-shadow:0 0 7px 5px rgba(0,0,0,0.3);color: #fff;border-radius: 7px;overflow: hidden">

                                        <thead>
                                        <tr class="center-align" style="background: #0d2162;">
                                            <th>عملیات</th>
                                            <th>تصویر</th>
                                            <th>اسم محصول</th>
                                            <th>قیمت نهایی (تومان)</th>
                                            <th>قیمت اصلی(تومان)</th>
                                            <th>تعداد</th>
                                        </tr>
                                        </thead>

                                        <tbody>


                                        <?php
                                        for ($i = 0; $i < sizeof($baskets); $i++) {
                                            $tot_basket_price = $tot_basket_price + $baskets[$i]['tot_price'];
                                            $tot_without_dis = $tot_without_dis + ($baskets[$i]['price_'] * $baskets[$i]['count']);
                                            ?>

                                            <tr class="center-align" id="<?= $baskets[$i]['id'] ?>"
                                                disco_p="<?= $baskets[$i]['discount'] ?>">
                                                <td class="center-align">
                                                    <i style="cursor: pointer" class="fa fa-trash"
                                                       onclick="del_pro_in_basket(<?= $baskets[$i]['id']; ?>)"></i>
                                                </td>

                                                <td class="center flexbox">
                                                    <img src="<?= $baskets[$i]['logo'] ?>"
                                                         class="responsive-img materialboxed"
                                                         width="70" height="70"/>
                                                </td>
                                                <td class="center-align">
                                                    <span><?= $baskets[$i]['mini_tit'] ?></span>
                                                </td>

                                                <td class="center-align" id="toto_price">
                                                    <span id="tot_price"><?= $baskets[$i]['tot_price'] ?></span>
                                                </td>
                                                <td class="center-align">
                                                    <span id="main_prices"><?= $baskets[$i]['price_'] ?></span>
                                                </td>
                                                <td class="center-align">
                                                    <!--                                                <i id="dic_count" style="cursor: pointer" class="fa fa-chevron-down"></i>&nbsp;&nbsp;-->
                                                    <!--                                                <span id="count_am">-->
                                                    <?//=  $baskets[$i]['count']
                                                    ?><!--</span>-->
                                                    <input id="count_am" pro_id="<?= $baskets[$i]['id']; ?>"
                                                           style="border:1px solid #ccc;max-width: 40px;text-align: center;color: #fff !important;"
                                                           type="text" value="<?= $baskets[$i]['count'] ?>"/>
                                                    <!--                                                <i id="enc_count" style="cursor: pointer" class="fa fa-chevron-up"></i>-->
                                                </td>
                                            </tr>


                                            <?php
                                        }
                                        ?>


                                        </tbody>

                                    </table>
                                </div>


                                <!--

                                <div class="col s12" style="margin-top: 15px;display: none">

                                    <div class="col s12 m6 l4 right">

                                        <div class="row">

                                            <div class="col s3">

                                                <a class="btn waves-effect"
                                                   style="width: 100%;margin-top: 2px;height: 40px !important;background: #ffc107;color: #000;font-size: 13px;">بررسی
                                                    کد</a>

                                            </div>
                                            <div class="col s9">

                                                <div id="hero_input">

                                                    <input id="input_text_forms"
                                                           style="text-align: right !important; width: 90% !important;"
                                                           name="discount_code"
                                                           placeholder="اگر کد تخفیف دارید وارد کنید"/>

                                                </div>

                                            </div>

                                        </div>


                                    </div>

                                </div>


    -->

                                <div class="col s12" style="margin-top: 25px;">

                                    <div class="row">

                                        <div class="col s12 m6 l4 right">

                                            <p style="color: #ffc107;font-size: 16px;">مجموع حساب شما</p>


                                            <table style="border: 1px solid #0d2162;box-shadow: 0 0 7px 1px rgba(0,0,0,.5);overflow: hidden;">
                                                <tr>
                                                    <td id="right-table">&nbsp;&nbsp;&nbsp; <?= $tot_without_dis ?>
                                                        تومان&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                    <td id="left-table">&nbsp;&nbsp;&nbsp;قیمت کل&nbsp;&nbsp;&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td id="right-table">&nbsp;&nbsp;&nbsp; <span
                                                                id="show_pay_amount"><?= $tot_basket_price ?></span>
                                                        تومان&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                    <td id="left-table"> &nbsp;&nbsp;&nbsp;مبلغ قابل پرداخت&nbsp;&nbsp;&nbsp;</td>
                                                </tr>
                                            </table>

                                            <a style="font-size:13px;margin-top: 15px;background: #ffc107;color: #000;"
                                               class="btn waves-effect">تسویه حساب</a>


                                        </div>

                                    </div>

                                </div>


                            </div>

                            <?php
                        }else {
                            ?>

                            <p style="text-align: center;font-size: 21px;direction:rtl;color: #fff">سبد خرید شما خالی می باشد!</p>
                            <?php
                        }
                        ?>
                    </div>


                </div>


            </div>


        </div>




</div>


<?php

include 'footer.php';
?>

<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>