<?php
$user_data = $data[0];
$pro = $data[1];
$pro_det = $pro[0];
$pro_pay = $pro[1];
//
$comment = $data[2];
$comp = $data[3];
$array_count = array();
$counter = 0;
for ($i = 0; $i < sizeof($pro_pay); $i++) {

    if ($pro_pay[$i]['id'] == '') {
    } else {

        if (array_key_exists($pro_pay[$i]['c_id_'], $array_count)) {
            $array_count[$pro_pay[$i]['c_id_']] = $array_count[$pro_pay[$i]['c_id_']] + 1;
        } else {
            $array_count[$pro_pay[$i]['c_id_']] = 1;
        }
    }
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
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
    <script src="public/dist/js/jquery.js"></script>
    <link rel="stylesheet" href="public/dist/css/all.css"/>
    <link rel="stylesheet" href="public/dist/css/morris.css"/>
    <link rel="stylesheet" href="public/dist/css/materialize.min.css"/>
    <link rel="stylesheet" href="public/style.css"/>
    <title>تنظیمات صفحه اصلی</title>


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
                <a href="#">تنظیمات صفحه اصلی</a>
            </div>

        </div>

        <div class="section">

            <div class="row">


                <div class="col s12">


                    <div class="row">


                        <div class="col s12 m12 l9" style="margin-top: 15px;">


                            <div class="col s12"
                                 style="padding: 0px;background: #17378d;margin-top: 7px;border-radius: 3px;overflow: hidden">


                                <div class="col s12" style="padding: 0px;">

                                    <div id="top_tabs">
                                        <ul>
                                            <li class="active_tab">
                                                اعضا &nbsp;&nbsp;<i class="fa fa-users"></i>
                                            </li>
                                            <li>
                                                اسلایدر &nbsp;&nbsp;<i class="fa fa-paint-brush"></i>
                                            </li>

                                            <li>
                                                آدرس &nbsp;&nbsp;<i class="fa fa-map-marked"></i>
                                            </li>
                                            <li>
                                                پیام ها &nbsp;&nbsp;<i class="fa fa-envelope"></i>
                                            </li>
                                            <li>
                                                اخبار &nbsp;&nbsp;<i class="fa fa-pencil-ruler"></i>
                                            </li>
                                            <li>
                                                محصولات &nbsp;&nbsp;<i class="fa fa-shopping-cart"></i>
                                            </li>

                                        </ul>
                                    </div>

                                </div>


                                <div class="col s12">

                                    <div id="tab_contents" style="width: 100%;float: right;">
                                        <section style="display: block;">


                                            <?php
                                            foreach ($user_data as $value) {

//                                                $value['oficial']

                                                $official = '';
                                                $date_kham = explode('/', $value['date_reg']);

                                                $names = $value['name'] . " " . $value['fam'];
                                                $mon = $date_kham[2];
                                                $day = $date_kham[3];
                                                $year = $date_kham[0];
                                                $img = '';
                                                if ($value['oficial'] == 0) {
                                                    $official = 'محصل';
                                                } else {
                                                    $official = 'مدرس';
                                                }
                                                if ($value['profile_img'] == '') {
                                                    $img = 'public/dist/img/avatar04.png';
                                                } else {
                                                    $img = $value['profile_img'];
                                                }

                                                $date_our = $day . " " . $mon . " " . $year;
                                                ?>
                                                <div class="col s6 m4 l3">

                                                    <div class="card-panel right"
                                                         style="background: none !important;padding:10px;border: none !important;box-shadow: none !important;">
                                                        <img src="<?= $img ?>"
                                                             class="responsive-img circle materialboxed"/>

                                                        <div id="pro_card_content" style="margin-top:15px;height: auto">
                                                            <p style="font-size: 12px;margin: 0px"><?= $names ?></p>
                                                            <p style="font-size: 12px;margin:0px;color: #ffc107 !important"><?= $date_our ?></p>
                                                            <p style="margin: 0px;" class="center-align"><span
                                                                        id="modir_mark"><?= $official ?></span></p>

                                                        </div>
                                                        <div class="col s12">
                                                            <?php
                                                            if ($value['oficial'] == 2) {
                                                                ?>
                                                                <p class="center-align white-text"><i onclick="remove_to_top_m(<?= $value['id'] ?>)"
                                                                            class="fa fa-trash"
                                                                            style="margin-right: 10px;cursor:pointer;"></i>
                                                                    مدیر تاپ</p>
                                                                <?php
                                                            }else {
                                                                ?>
                                                                <a class="btn waves-effect orange" onclick="add_to_top_m(<?= $value['id'] ?>)"
                                                                   style="width:100%;margin-top:7px;color: #000;font-size: 13px;">افزودن
                                                                    به مدیریت</a>
                                                                <?php
                                                            }
                                                            ?>


                                                        </div>

                                                    </div>
                                                </div>

                                                <?php
                                            }
                                            ?>


                                        </section>


                                        <!--    slider    -->
                                        <section>


                                            <div class="col s12">


                                                <div class="col s12" style="margin-top: 20px;">


                                                    <form action="add_world/add_world/<?= $cat_id; ?>/<?= $book_id ?>/<?= $count_cat; ?>"
                                                          method="post"
                                                          enctype="multipart/form-data" id="world_adding_form">


                                                        <div class="row">


                                                            <?php

                                                            for ($i = 0; $i < 4; $i++) {
                                                                ?>


                                                                <div id="box_add_worlds">


                                                                    <div class="col s12 m6 l6">
                                                                        <div id="hero_input"
                                                                             style="width:100%;margin-right:2%;margin-top: 2%;margin-bottom: 2%;">
                                                                            <i class="fa fa-edit"
                                                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                                            <input type="text"
                                                                                   name="name_world_<?= $i ?>"
                                                                                   id="input_text_forms"
                                                                                   style="direction:rtl;text-align:right;width: 83%"
                                                                                   placeholder="تیتر برای اسلاید بنویسید...">

                                                                        </div>
                                                                    </div>


                                                                    <div class="col s12 m6 l6">
                                                                        <div id="hero_input"
                                                                             style="width:100%;margin-right:2%;margin-top: 2%;margin-bottom: 2%;">
                                                                            <i class="fa fa-atlas"
                                                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                                            <input type="text"
                                                                                   name="translate_world_<?= $i ?>"
                                                                                   id="input_text_forms"
                                                                                   style="direction:rtl;text-align:right;width: 83%"
                                                                                   placeholder="توضیح مختصری برای اسلاید بنویسید...">

                                                                        </div>
                                                                    </div>


                                                                    <div class="col s12">

                                                                        <div style="width: 100%;height: 49px;position: relative;overflow: hidden;float: right;margin-right: 1%;">
                                                                            <div class="btn"
                                                                                 style="direction: rtl;background: #b71c1c !important;height: 45px;width: 100%">
                                                                                <span>انتخاب تصویر برای اسلاید</span>
                                                                                <input type="file"
                                                                                       name="image_upload_<?= $i ?>"/>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>

                                                                <?php
                                                                if ($i == 4) {
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
                                                                <input type="submit"
                                                                       style="width: 100%;background: #ffc137 !important;color: #000"
                                                                       class="btn waves-effect" id="btn_save_world"
                                                                       value="پردازش و ثبت اطلاعات"/>
                                                            </div>


                                                    </form>


                                                </div>


                                        </section>


                                        <!--  adress    -->
                                        <section>


                                            <form id="form_setting_pro">


                                                <div class="col s12">


                                                    <div class="row">


                                                        <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                            <i class="fa fa-map-marked"
                                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                            <input type="text" name="company_add" id="input_text_forms"
                                                                   style="direction:rtl;text-align:right"
                                                                   value="<?= $comp['address'] ?>"
                                                                   placeholder="آدرس شرکت">


                                                            <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">ادرس شرکت</span>

                                                        </div>


                                                    </div>


                                                </div>

                                                <div class="col s12">


                                                    <div class="row">


                                                        <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                            <i class="fa fa-envelope"
                                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                            <input type="text" name="company_mail" id="input_text_forms"
                                                                   style="direction:rtl;text-align:right"
                                                                   value="<?= $comp['email'] ?>"
                                                                   placeholder="ایمیل شرکت ...">


                                                            <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">ایمیل شرکت</span>

                                                        </div>


                                                    </div>


                                                </div>


                                                <div class="col s12">


                                                    <div class="row">


                                                        <div id="hero_input" style="margin-left: 2%;margin-bottom: 1%;">
                                                            <i class="fa fa-user"
                                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                            <input type="text" name="company_phone"
                                                                   id="input_text_forms"
                                                                   style="direction:rtl;text-align:right"
                                                                   value="<?= $comp['phone'] ?>"
                                                                   placeholder="تلفن شرکت ...">


                                                            <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">تلفن شرکت</span>

                                                        </div>


                                                    </div>


                                                </div>


                                                <div class="col s12 m6 l4" style="height: 40px;">
                                                    <a id="update_shop_address" class="btn waves-effect" type="submit"
                                                       style="background: orange !important;color: #000;">ویرایش و ثبت
                                                        اطلاعات</a>
                                                </div>

                                            </form>


                                        </section>


                                        <!--     user  msg  -->
                                        <section>


                                            <?php
                                            if ($comment) {
                                                foreach ($comment as $val_co) {
                                                    $date_arr = explode('/', $val_co['date']);
                                                    $years = $date_arr[0];
                                                    $monss = $date_arr[2];
                                                    $dayss = $date_arr[3];
                                                    $date = $dayss . " " . $monss . " " . $years;
                                                    $state = '';
                                                    if ($val_co['state'] == '1') {
                                                        $state = 'state_active';
                                                    }
                                                    ?>

                                                    <div class="col s12s m4 l4 right" id="par_com_ch"
                                                         id_p="<?= $val_co['id'] ?>">

                                                        <div class="card"
                                                             style="position:relative;background-color: #1a2f66 !important;">
                                                            <div id="load_add_to_card"
                                                                 class="msg_back_load_<?= $val_co['id'] ?>">
                                                                <div class="preloader-wrapper small active"
                                                                     style="position: absolute;right: 0;bottom: 0px;margin: auto;top: 0px;left: 0;">
                                                                    <div class="spinner-layer spinner-red-only">
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


                                                            <div class="card-content white-text">
                                                       <span class="card-title"
                                                             style="width: 100%;height: 40px;font-size: 16px;">

                                                           <div style="direction:rtl;float: right;"><?= $date ?></div>


                                                       </span>
                                                                <p><?= $val_co['data'] ?></p>
                                                            </div>
                                                            <div class="card-action"
                                                                 style="direction: rtl;margin-bottom: 30px;">
                                                                <span class="left white-text"><?= $val_co['sender'] ?></span>

                                                                <span class="right white-text" id="up_com_mod"
                                                                      id_p="<?= $val_co['id'] ?>"
                                                                      style="cursor:pointer;height: 60px;width: 40px;margin-top: -5px;">
                                                            <p class="center-align <?= $state ?>" id="icon_share_main"
                                                               style=";padding: 0px;margin: 0px;"><i
                                                                        class="fa fa-star"></i></p>
                                                            <p class="center-align"
                                                               style="font-size:13px;padding: 0px;margin-top: 2px;">اشتراک</p>


                                                          </span>
                                                                <span class="right white-text" id="delet_com_mod"
                                                                      id_p="<?= $val_co['id'] ?>"
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
                                                ?>

                                                <p class="white-text center-align"
                                                   style="direction:rtl;padding:30px;font-size: large">پیامی برای نمایش
                                                    وجود ندارید!</p>

                                                <?php
                                            }
                                            ?>
                                        </section>


                                        <!--    modir   news   -->
                                        <section>


                                            <div class="col s12" style="margin-top: 20px;">
                                                <div class="row">

                                                    <div class="col s12 m6 l6" style="margin-bottom: 15px;">
                                                        <div id="hero_input" style="width: 100%;">
                                                            <i class="fa fa-list"
                                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>


                                                            <div class="input-field col s12"
                                                                 style="width:88%;margin-top: 0px;margin-left: 15px;color: #fff">
                                                                <select name="msg_all_reciver">
                                                                    <option value="" disabled selected> گروه گیرنده
                                                                    </option>
                                                                    <option value="2">مدرسین</option>
                                                                    <option value="3">محصلین</option>
                                                                </select>
                                                            </div>


                                                        </div>
                                                    </div>

                                                    <div class="col s12 m6 l6" style="margin-bottom: 15px;">
                                                        <div id="hero_input" style="width: 100%;">
                                                            <i class="fa fa-transgender"
                                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>


                                                            <div class="input-field col s12"
                                                                 style="width: 88%;margin-top: 0px;margin-left: 15px;color: #fff">
                                                                <select name="type_msg_level">
                                                                    <option value="" disabled selected>نوع پیام</option>
                                                                    <option value="1">خیلی مهم</option>
                                                                    <option value="2">عادی</option>
                                                                </select>
                                                            </div>


                                                        </div>
                                                    </div>

                                                    <div class="col s12" style="margin-bottom: 15px;">

                                                        <div id="hero_input"
                                                             style="padding-right:10px;padding-top:10px;width: 100%;height: 105px;">
                    <textarea name="msg_all_text"
                              style="border:none;outline:none;min-height: 90px;max-height: 90px;min-width: 100%;max-width: 100%;"
                              placeholder="متن پیام را تایپ کنید..."></textarea>
                                                        </div>

                                                    </div>

                                                    <div class="col s12 m5 l3">
                                                        <div id="hero_input" class="msg_send_all"
                                                             style="float: right;width: 100%;height: 40px;background: #28a745 !important;color: #fff !important;">
                                                            <input type="submit"
                                                                   class="btn waves-effect"
                                                                   style="background:#ffc107;width: 100%;height: 100%;padding: 0px;cursor:pointer;"
                                                                   value="ارسال پیام"/>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                        </section>


                                        <!--     product  -->

                                        <section>


                                            <table class="striped responsive-table"
                                                   style="border:1px solid orange;margin-top:15px;margin-bottom:15px;direction: rtl;color: #fff;"
                                                   id="table_show_">
                                                <thead>
                                                <tr>
                                                    <th>ردیف</th>
                                                    <th>فروش ها</th>
                                                    <th>نام کتاب</th>
                                                    <th>نویسنده</th>
                                                    <th>توضیح مختصر</th>
                                                    <th>قیمت (تومان)</th>
                                                    <th>تصویر</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                foreach ($pro_det as $key => $value) {
                                                    $counts = 0;
                                                    for ($i = 0; $i < sizeof($array_count); $i++) {
                                                        if (array_key_exists($value['id'], $array_count)) {
                                                            $counts = $array_count[$value['id']];
                                                        } else {
                                                            $counts = 0;
                                                        }
                                                    }
                                                    ?>

                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $counts ?></td>
                                                        <td><?= $value['name_c'] ?></td>
                                                        <td><?= $value['name'] . " " . $value['fam'] ?></td>
                                                        <td style="max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?= $value['mini_tit'] ?></td>
                                                        <td><?= $value['price_'] ?></td>
                                                        <td><img style="width: 40px;height: 40px;border-radius: 100%;"
                                                                 src="<?= $value['logo'] ?>"/></td>
                                                        <td>
                                                            <a href="#del_modal" data-tooltip="حذف کتاب"
                                                               data-position="bottom"
                                                               class="tooltipped modal-trigger"><i
                                                                        style="cursor: pointer"
                                                                        class="fa fa-trash"></i> </a> &nbsp;&nbsp;
                                                            <?php
                                                            if ($value['m_state'] != 2) {
                                                                ?>
                                                                <a data-tooltip="تایید نهایی"
                                                                   data-position="bottom"
                                                                   class="tooltipped"><i
                                                                            style="cursor: pointer"
                                                                            class="fa fa-check"></i> </a> &nbsp;&nbsp;
                                                                <?php
                                                            } else {
                                                                ?>


                                                                <a data-tooltip="موجود در اپ"
                                                                   data-position="bottom"
                                                                   class="tooltipped"><i
                                                                            style="cursor: pointer;color: green"
                                                                            class="fa fa-check-double"></i>
                                                                </a> &nbsp;&nbsp;

                                                                <?php
                                                            }
                                                            ?>
                                                            <label for="check_remember"
                                                                   style="float: right;color: #fff;margin-left: 10px;">

                                                                <input type="checkbox" name="check_top_pros"
                                                                       id_p="<?= $value['id'] ?>"
                                                                       class="filled-in" id="check_remember_top"/>

                                                                <span style="font-size: 13px;"></span>
                                                            </label>


                                                        </td>
                                                    </tr>

                                                    <div id="del_modal" class="modal bottom-sheet"
                                                         style="direction: rtl;font-size: 13px;background: #17378d;color: #fff;">
                                                        <div class="modal-content">
                                                            <h4>آیا نسبت به حذف کتاب مطمئن هستید؟</h4>
                                                            <p>1- تمامی زیر دسته های این کتاب حذف خواهند شد.</p>
                                                            <p>2- تمامی کلمات ثبت شده در این کتاب و زیر دسته های آن حذف
                                                                خواهد شد.</p>
                                                            <p>3- تمامی فایل های آپلودی توسط شما برای کلمات موجود در این
                                                                کتاب حذف خواهند
                                                                شد.</p>
                                                            <p>4- درصورتیکه بعدا تمایل به ریکاوری داشته باشید ؛ زمانبر و
                                                                پر هزینه خواهد
                                                                بود.</p>
                                                        </div>
                                                        <div class="modal-footer"
                                                             style="background: #0d2162 !important;">
                                                            <a id-pro="<?= $value['id']; ?>" id="del_book"
                                                               class="modal-close waves-effect waves-green btn-flat">مطمئنم</a>
                                                        </div>
                                                    </div>


                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>


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


</div>


<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>