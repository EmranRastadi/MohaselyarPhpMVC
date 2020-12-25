<?php
$del_state = '';
$count_cat = 1;
if (isset($_GET['count'])) {
    if ($_GET['count'] == '') {
    } else {
        $count_cat = $_GET['count'];
    }
}
$cat_id = $data[0];
$world_data = $data[1];
$book_name = $data[2];
$state = $data[3];
//echo $state;
if ($state) {

} else {
    header("location:" . URL . "dashboard");
}

$type_world = $data[4];
$book_id = $data[5];
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
    <title>ثبت دسته کلمات</title>

    <script>
        $(function () {
            $("#sub_count").click(function () {
                $("#count_form").submit();
            })
        })
    </script>
</head>
<body>


<?php
include 'menu_top.php';
?>


<div class="section">
    <div class="row">

        <div class="col s12">

            <div class="col s12" style="padding: 0px;">


                <div class="col s12 m12 l4 flexbox" style="padding: 0px;">


                    <form action="add_world/index/<?= $cat_id ?>/<?= $book_name; ?>/<?= $book_id; ?>" method="get"
                          id="count_form"
                          style="width: 442px;height: 50px;float: left;">

                        <div class="col s8">
                            <div id="hero_input" style="width: 100%;">

                                <input type="text" name="count" id="input_text_forms"
                                       style="direction:rtl;text-align:right;width: 100% !important;"
                                       placeholder="تعداد کلمات مد نظر را وارد کنید">

                            </div>
                        </div>


                        <div class="col s4">
                            <a style="margin-top: 5px;background: #ffc137;color: #000;font-size: 13px;;"
                               class="btn waves-effect" id="sub_count">پردازش</a>
                        </div>

                    </form>

                </div>


                <div class="col s12 m12 l8 hide-on-med-and-down">
                    <div style="direction:rtl;width: 100%;float: right;text-align: right;font-size: 21px;color: #fff;margin-right: 20px;">
                        <a href="dashboard" style="color: #28a745;">داشبورد</a>
                        <a style="color: #28a745;">/</a>
                        <a>اضافه کردن کلمات آموزشی به دسته <span style="color: #ffc107;"><?= $book_name ?></span></a>
                    </div>
                </div>


            </div>

            <div class="col s12 m12 l9" style="margin-top: 20px;">


                <form action="add_world/add_world/<?= $cat_id; ?>/<?= $book_id ?>/<?= $count_cat; ?>" method="post"
                      enctype="multipart/form-data" id="world_adding_form">


                    <div class="row">


                        <?php

                        for ($i = 0; $i < $count_cat; $i++) {
                            ?>


                            <div id="box_add_worlds">


                                <div class="col s12 m6 l6">
                                    <div id="hero_input"
                                         style="width:100%;margin-right:2%;margin-top: 2%;margin-bottom: 2%;">
                                        <i class="fa fa-edit"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="text" name="name_world_<?= $i ?>" id="input_text_forms"
                                               style="direction:rtl;text-align:right;width: 83%"
                                               placeholder="کلمه را تایپ کنید ...">

                                    </div>
                                </div>


                                <?php
                                if ($type_world == "1") {
                                    ?>

                                    <div class="col s12 m6 l6">
                                        <div id="hero_input"
                                             style="width:100%;margin-right:2%;margin-top: 2%;margin-bottom: 2%;">
                                            <i class="fa fa-atlas"
                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                            <input type="text" name="translate_world_<?= $i ?>" id="input_text_forms"
                                                   style="direction:rtl;text-align:right;width: 83%"
                                                   placeholder="ترجمه ی کلمه را تایپ کنید...">

                                        </div>
                                    </div>


                                    <?php
                                } else if ($type_world == "2") {
                                    ?>


                                    <div class="col s12 m6 l6">

                                        <div id="hero_input"
                                             style="width:100%;margin-right:2%;margin-top: 2%;margin-bottom: 2%;">
                                            <i class="fa fa-pencil-alt"
                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                            <input type="text" name="translate_world_<?= $i ?>" id="input_text_forms"
                                                   style="direction:rtl;text-align:right;width: 83%"
                                                   placeholder="توضیحاتی راجب به کلمه تایپ کنید...">

                                        </div>


                                    </div>


                                    <?php
                                }
                                ?>


                                <div class="col s12 m6 l6">

                                    <div style="width: 100%;height: 49px;position: relative;overflow: hidden;float: right;margin-right: 2%;">
                                        <div class="btn"
                                             style="direction: rtl;background: #b71c1c !important;height: 45px;width: 100%">
                                            <span>انتخاب تصویر مرتبط با کلمه</span>
                                            <input type="file" name="image_upload_<?= $i ?>"/>
                                        </div>
                                    </div>

                                </div>


                                <div class="col s12 m6 l6">

                                    <div style="width: 100%;height: 49px;position: relative;overflow: hidden;float: right;margin-right: 2%">
                                        <div class="btn"
                                             style="direction: rtl;background: #b71c1c !important;height: 45px;width: 100%">
                                            <span>انتخاب صدای تلفظ برای کلمه</span>
                                            <input type="file" name="voise_upload_<?= $i ?>"/>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <?php
                            if ($i == $count_cat - 1) {
                                ?>

                                <?php
                            } else {
                                ?>
                                <span id="bordering"></span>
                                <?php
                            }
                            ?>


                            <?php
                        }
                        ?>


                        <div class="col s12 m6 l3" style="padding: 0px;">
                            <input type="submit" style="width: 100%;background: #ffc137 !important;color: #000"
                                   class="btn waves-effect" id="btn_save_world" value="پردازش و ثبت اطلاعات"/>
                        </div>


                    </div>


                </form>


                <p style="text-align: right;margin: 10px;color: #fff;"><span><?= $book_name ?>&nbsp;&nbsp;لیست کلمات ثبت شده توسط شما در دسته </span>

                    <i class="fa fa-list-alt" style="margin-left: 7px;"></i></p>


                <div class="col s12" style="padding: 0px;">

                    <div class="row">
                        <div class="card-panel" style="padding: 0px;">


                            <?php
                            if (sizeof($world_data) > 0) {
                                ?>
                                <table class="striped" style="direction: rtl;color: #fff;" id="table_show_">
                                    <thead>
                                    <tr>
                                        <th>نام کلمه</th>
                                        <th>توضیح یا ترجمه</th>
                                        <th>صدا</th>
                                        <th>تصویر</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    foreach ($world_data as $key => $value) {
                                        ?>

                                        <tr>
                                            <td><?= $value['name__'] ?></td>
                                            <td style="max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?= $value['translate'] ?></td>
                                            <td>
                                                <audio controls>
                                                    <source src="public/<?= $value['voice__']; ?>">
                                                </audio>
                                            </td>
                                            <td><img style="width: 40px;height: 40px;border-radius: 100%;"
                                                     src="public/<?= $value['mage__'] ?>"/></td>
                                            <td>
                                                <a id="del_book" id-pro="<?= $value['id']; ?>" data-tooltip="حذف کلمه"
                                                   data-position="bottom" class="tooltipped"><i style="cursor: pointer"
                                                                                                class="fa fa-trash"></i>
                                                </a> &nbsp;&nbsp;
                                                <a href="#" data-tooltip="ویرایش کلمه" data-position="bottom"
                                                   class="tooltipped"><i
                                                            class="fa fa-edit" style="cursor: pointer"></i></a>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>

                                <?php
                            } else {
                                ?>
                                <a id="empty_book">شما تاکنون کلمه ای برای این دسته ثبت نکرده اید!!!</a>
                                <?php
                            }
                            ?>


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


<!--<div style="width: 200px;height: 300px;position:fixed;background: #000;" class="d-hidden-mini"></div>-->
<div class="main" style="display: none;">

    <div style="direction:rtl;width: 100%;float: right;text-align: right;font-size: 21px;color: #fff;margin-right: 20px;margin-top: 10px;">
        <a href="dashboard" style="color: #28a745;">خانه</a>
        <a style="color: #28a745;">/</a>
        <a>اضافه کردن کلمات آموزشی به دسته <span style="color: #ffc107;"><?= $book_name ?></span></a>

        <form action="add_world/index/<?= $cat_id ?>/<?= $book_name; ?>/<?= $book_id; ?>" method="get" id="count_form"
              style="width: 442px;height: 50px;float: left;">
            <div id="hero_input" style="width: 300px;margin-left: 40px;float: left;">

                <input type="text" name="count" id="input_text_forms"
                       style="direction:rtl;text-align:right;width: 270px !important;"
                       placeholder="تعداد کلمات مد نظر را وارد کنید">

            </div>

            <a class="btn waves-effect" id="sub_count"
               style="float: left;margin-left: 15px;height: 40px;background: #ffc107;margin-top: 4px;">پردازش</a>

        </form>
    </div>


    <div style="float: right;width: 100%;height: 100%;">


        <?php
        include 'menu_side.php';
        ?>


        <div id="left_nav">


            <form action="add_world/add_world/<?= $cat_id; ?>/<?= $book_id ?>/<?= $count_cat; ?>" method="post"
                  enctype="multipart/form-data" id="world_adding_form">

                <div id="box_world_pick">


                    <?php

                    for ($i = 0; $i < $count_cat; $i++) {
                        ?>


                        <div id="box_add_worlds">


                            <div id="hero_input" style="width:47%;margin-right:2%;margin-top: 2%;margin-bottom: 2%;">
                                <i class="fa fa-edit"
                                   style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                <input type="text" name="name_world_<?= $i ?>" id="input_text_forms"
                                       style="direction:rtl;text-align:right;width: 445px !important;"
                                       placeholder="کلمه را تایپ کنید ...">

                            </div>


                            <?php
                            if ($type_world == "1") {
                                ?>

                                <div id="hero_input"
                                     style="width:47%;margin-right:2%;margin-top: 2%;margin-bottom: 2%;">
                                    <i class="fa fa-atlas"
                                       style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                    <input type="text" name="translate_world_<?= $i ?>" id="input_text_forms"
                                           style="direction:rtl;text-align:right;width: 445px !important;"
                                           placeholder="ترجمه ی کلمه را تایپ کنید...">

                                </div>


                                <?php
                            } else if ($type_world == "2") {
                                ?>

                                <div id="hero_input"
                                     style="width:47%;margin-right:2%;margin-top: 2%;margin-bottom: 2%;">
                                    <i class="fa fa-pencil-alt"
                                       style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                    <input type="text" name="translate_world_<?= $i ?>" id="input_text_forms"
                                           style="direction:rtl;text-align:right;width: 445px !important;"
                                           placeholder="توضیحاتی راجب به کلمه تایپ کنید...">

                                </div>

                                <?php
                            }
                            ?>


                            <div style="width: 47%;height: 49px;position: relative;overflow: hidden;float: right;margin-right: 2%;">
                                <div class="btn"
                                     style="direction: rtl;background: #b71c1c !important;height: 45px;width: 100%">
                                    <span>انتخاب تصویر مرتبط با کلمه</span>
                                    <input type="file" name="image_upload_<?= $i ?>"/>
                                </div>
                            </div>

                            <div style="width: 47%;height: 49px;position: relative;overflow: hidden;float: right;margin-right: 2%">
                                <div class="btn"
                                     style="direction: rtl;background: #b71c1c !important;height: 45px;width: 100%">
                                    <span>انتخاب صدای تلفظ برای کلمه</span>
                                    <input type="file" name="voise_upload_<?= $i ?>"/>
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($i == $count_cat - 1) {
                            ?>

                            <?php
                        } else {
                            ?>
                            <span></span>
                            <?php
                        }
                        ?>


                        <?php
                    }
                    ?>


                </div>

                <input type="submit" class="btn waves-effect" id="btn_save_world" value="پردازش و ثبت اطلاعات"/>


            </form>


            <p style="direction: rtl;"><i class="fa fa-list-alt" style="margin-left: 7px;"></i>لیست کلمات ثبت شده برای
                دسته <span style="color: #ffc107;"><?= $book_name ?></span></p>

            <div id="chart_box">


                <?php
                if (sizeof($world_data) > 0) {
                    ?>
                    <table class="striped" style="direction: rtl;color: #fff;" id="table_show_">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام کلمه</th>
                            <th>توضیح یا ترجمه</th>
                            <th>صدا</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($world_data as $key => $value) {
                            ?>

                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['name__'] ?></td>
                                <td style="max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?= $value['translate'] ?></td>
                                <td>
                                    <audio controls>
                                        <source src="public/<?= $value['voice__']; ?>">
                                    </audio>
                                </td>
                                <td><img style="width: 40px;height: 40px;border-radius: 100%;"
                                         src="public/<?= $value['mage__'] ?>"/></td>
                                <td>
                                    <a id="del_book" id-pro="<?= $value['id']; ?>" data-tooltip="حذف کلمه"
                                       data-position="bottom" class="tooltipped"><i style="cursor: pointer"
                                                                                    class="fa fa-trash"></i> </a> &nbsp;&nbsp;
                                    <a href="#" data-tooltip="ویرایش کلمه" data-position="bottom" class="tooltipped"><i
                                                class="fa fa-edit" style="cursor: pointer"></i></a>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php
                } else {
                    ?>
                    <a id="empty_book">شما تاکنون کلمه ای برای این دسته ثبت نکرده اید!!!</a>
                    <?php
                }
                ?>


            </div>

        </div>
    </div>


    <div style="width: 100%;height: 55px;float: right;margin-top: 20px;border-top: 1px solid #03164a;">
        <span style="float: right;color: #fff;font-size: 13px;direction: rtl;margin-right: 17px;margin-top: 15px;"> ( Version 1.0.0 1395 - 1399 ) تمامی حقوق محفوظ میباشد.</span>
        <span style="float: left;color: #fff;font-size: 13px;margin-right: 15px;margin-top: 17px;margin-left: 15px;direction: ltr;"> <i
                    class="fa fa-phone" style="margin-right: 7px"></i> +989175414381 </span>
        <span style="float: left;color: #fff;font-size: 13px;margin-right: 15px;margin-top: 17px;margin-left: 15px;direction: ltr;"> <i
                    class="fa fa-mail-bulk" style="margin-right: 7px"></i> emran.rastadi@gmail.com </span>
    </div>


</div>


<!--</div>-->


<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>