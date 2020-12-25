<?php
$del_state = '';
$count_cat = 2;
if (isset($_GET['count'])) {
    if ($_GET['count'] == '') {
    } else {
        $count_cat = $_GET['count'];
    }
}
$cat_id = $data[0];
$cat_data = $data[1];
$book_name = $data[2];
$state = $data[3];
$book_id = $data[4];
if ($state) {

} else {
    header("location:" . URL . "dashboard");
}

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


        <div class="col s12" style="padding: 0px;">


            <div class="col s12 m12 l4 flexbox" style="padding: 0px;">


                <form action="add_cat_world/index/<?= $cat_id ?>/<?= $book_name; ?>/" method="get" id="count_form"
                      style="width: 442px;height: 50px;float: left;">

                    <div class="col s8">
                        <div id="hero_input" style="width: 100%;">

                            <input type="text" name="count" id="input_text_forms"
                                   style="direction:rtl;text-align:right;width: 100% !important;"
                                   placeholder="تعداد دسته های مد نظر را وارد کنید">

                        </div>
                    </div>


                    <div class="col s4">
                        <a style="margin-top: 5px;background: #ffc137;color: #000;font-size: 13px;;" class="btn waves-effect" id="sub_count">پردازش</a>
                    </div>

                </form>

            </div>


            <div class="col s12 m12 l8 hide-on-med-and-down">
                <div style="direction:rtl;width: 100%;float: right;text-align: right;font-size: 21px;color: #fff;margin-right: 20px;">
                    <a href="dashboard" style="color: #28a745;">داشبورد</a>
                    <a style="color: #28a745;">/</a>
                    <a>اضافه کردن دسته کلمات به <span style="color: #ffc107;"><?= $book_name ?></span></a>
                </div>
            </div>


        </div>


        <div class="col s12 m12 l9" style="margin-bottom:20px;padding: 0px;margin-top: 20px;">




            <form action="add_cat_world/add_cat/<?= $cat_id; ?>" method="post" id="cat_adding_form">

                <div style="width: 100%;float: right;">

                    <?php
                    for ($i = 0; $i < $count_cat; $i++) {
                        ?>

                        <div class="col s12 m6 l6" style="margin-bottom: 15px;">

                            <div id="hero_input" style="width: 100%;">
                                <a
                                        style="float: right;margin-right:7px;color: #ffc107 !important;width: 30px;height: 100%;text-align: center;font-size: 19px;line-height: 2.2;"><?= $i + 1 ?></a>
                                <input type="text" name="cat_name_<?= $i ?>" id="input_text_forms"
                                       style="direction:rtl;text-align:right;width: 81% !important;"
                                       placeholder="نام دسته را وارد کنید...">

                            </div>

                        </div>


                        <?php
                    }
                    ?>

                    <div class="col s12 m6 l3" style="margin-bottom: 15px;">
                        <a class="btn waves-effect" id="sub_cat_www"
                           style="width:100% !important;height: 40px;background: #dc3545;margin-top: 4px;direction: rtl;">ثبت
                            دسته بندی برای <?= $book_name; ?></a>
                    </div>


                </div>

            </form>



            <p style="text-align: right;margin: 10px;color: #fff;"><span><?= $book_name ?>&nbsp;&nbsp;لیست کتاب های ثبت شده توسط شما در دسته </span>

                <i class="fa fa-list-alt" style="margin-left: 7px;"></i></p>


            <div class="col s12">

                <div class="card-panel" style="margin: 0px;padding: 0px;border-radius: 5px;overflow: hidden">

                <?php
                if (sizeof($cat_data) > 0) {
                    ?>
                    <table class="striped" style="direction: rtl;color: #fff;" id="table_show_">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام دسته</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($cat_data as $key => $value) {
                            ?>

                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['cat_name'] ?></td>
                                <td>
                                    <a href="#del_modal" data-tooltip="حذف دسته"
                                       data-position="bottom" class="tooltipped modal-trigger"><i
                                                style="cursor: pointer"
                                                class="fa fa-trash"></i> </a> &nbsp;&nbsp;
                                    <a href="add_world/index/<?= $value['id']; ?>/<?= $value['cat_name'] ?>/<?= $book_id ?>"
                                       data-tooltip="افزودن کلمه به دسته"
                                       data-position="bottom" class="tooltipped"><i style="cursor: pointer"
                                                                                    class="fa fa-book-medical"></i> </a>
                                    &nbsp;&nbsp;
                                    <a  href="#modal_up_cat_<?= $value['id']; ?>" data-tooltip="ویرایش دسته" data-position="bottom" class="tooltipped modal-trigger"><i
                                                class="fa fa-edit" style="cursor: pointer"></i></a>

                                </td>
                            </tr>












                            <div id="modal_up_cat_<?= $value['id'] ?>" class="modal"
                                 style=";background: #0d2162;width: 30%;height: 250px;border-radius: 5px;">
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


                                    <p style="color: #fff;text-align: center;font-size:16px;">جزئیات این دسته از کتاب برای ویرایش</p>


                                    <form action="add_book/update_book" method="post" enctype="multipart/form-data" class="book_update_form"
                                          id="book_update_form_<?= $value['id'] ?>">


                                        <div class="col s12" style="padding: 0px;margin-bottom: 15px;">




                                            <div class="col s12" style="margin-bottom: 15px;">

                                                <div id="hero_input" style="width: 100%;">
                            <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">نام جدید دسته</span>
                                                    <i class="fa fa-edit"
                                                       style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                    <input type="text" name="cat_new_name_<?= $value['id'] ?>"
                                                           id="input_text_forms"
                                                           style="direction:rtl;text-align:right;width: 82% !important;"
                                                           value="<?= $value['cat_name'] ?>"
                                                           placeholder="نام جدید دسته">

                                                </div>

                                            </div>



                                            <div class="col s12">

                                                <div class="row">

                                                    <div class="col s12 m6 l6">
                                                        <div id="hero_input"
                                                             style="float: right;width: 100%;height: 40px;background: #28a745 !important;color: #fff !important;">

                                                            <a id="cat_sub_btn_up" onclick="update_cat(<?= $value['id'] ?>)"
                                                               class="btn waves-effect"
                                                               style="color:#000;background:#ffc107;width: 100%;height: 100%;padding: 0px;cursor:pointer;">
                                                                بررسی و ویرایش دسته
                                                            </a>

                                                        </div>

                                                    </div>


                                                </div>

                                            </div>

                                        </div>


                                    </form>


                                </div>
                            </div>















                            <div id="del_modal" class="modal bottom-sheet"
                                 style="direction: rtl;font-size: 13px;background: #17378d;color: #fff;">
                                <div class="modal-content">
                                    <h4>آیا نسبت به حذف این دسته از کلمات مطمئن هستید؟</h4>
                                    <p>1- تمامی کلمات ثبت شده در این دسته حذف خواهد شد.</p>
                                    <p>2- تمامی فایل های آپلودی توسط شما برای کلمات این دسته حذف خواهند شد.</p>
                                    <p>4- درصورتیکه بعدا تمایل به ریکاوری داشته باشید ؛ زمانبر و پر هزینه خواهد بود.</p>
                                </div>
                                <div class="modal-footer" style="background: #0d2162 !important;">
                                    <a id-pro="<?= $value['id']; ?>" id="del_cat"
                                       class="modal-close waves-effect waves-green btn-flat">مطمئنم</a>
                                </div>
                            </div>


                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php
                } else {
                    ?>
                    <a id="empty_book">شما تاکنون برای کتاب <span style="color: #ffc107;"><?= $book_name; ?></span> دسته
                        ای ثبت نکرده اید!!!</a>
                    <?php
                }
                ?>


                </div>

            </div>



        </div>

        <?php

        include 'menu_side.php';

        ?>



    </div>
</div>


<!--<div style="width: 200px;height: 300px;position:fixed;background: #000;" class="d-hidden-mini"></div>-->



<!--</div>-->


<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>