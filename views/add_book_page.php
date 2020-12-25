<?php
$del_state = '';
$cat_data = $data[0];
$book_list = $data[1];
if (isset($data[2])) {
    $del_state = $data[2];
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
    <title>ثبت کتاب جدید</title>

</head>
<body>

<?php
include 'menu_top.php';
?>


<div class="section">

    <div class="row">

        <div class="col s12">


            <div class="col s12">

                <div style="direction:rtl;width: 100%;float: right;text-align: right;font-size: 21px;color: #fff;margin-right: 20px;">
                    <a href="dashboard" style="color: #28a745;">داشبورد</a>
                    <a style="color: #28a745;">/</a>
                    <a href="#">افزودن کتاب جدید</a>
                </div>

            </div>

            <div class="col s12 m12 l9" style="margin-top: 20px;">


                <form action="add_book/add_book" method="post" enctype="multipart/form-data" id="book_adding_form">


                    <div class="col s12" style="padding: 0px;margin-bottom: 15px;">
                        <div class="col s12 m6 l6" style="margin-bottom: 15px;">

                            <div id="hero_input" style="width: 100%;">
                                <i class="fa fa-edit"
                                   style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                <input type="text" name="book_mini_desc" id="input_text_forms"
                                       style="direction:rtl;text-align:right;width: 82% !important;"
                                       placeholder="توضیحات مختصر برای کتاب">

                            </div>

                        </div>

                        <div class="col s12 m6 l6" style="margin-bottom: 15px;">

                            <div id="hero_input" style="width: 100%;">
                                <i class="fa fa-book"
                                   style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                <input type="text" name="book_name" id="input_text_forms"
                                       style="direction:rtl;text-align:right;width: 82% !important;"
                                       placeholder="نام کتاب">

                            </div>

                        </div>

                        <div class="col s12 m6 l6" style="margin-bottom: 15px;">

                            <div id="hero_input"
                                 style="padding-right:10px;padding-top:10px;width: 100%;height: 105px;">
                    <textarea name="book_full_desc"
                              style="border:none;outline:none;min-height: 90px;max-height: 90px;min-width: 100%;max-width: 100%;"
                              placeholder="توضیحات کاملی راجب کتاب بنویسید..."></textarea>
                            </div>

                        </div>

                        <div class="col s12 m6 l6" style="margin-bottom: 15px;">

                            <div class="col s12" style="padding: 0px;margin-bottom: 5px;">

                                <div id="hero_input" style="width: 100%;margin-left: 2%;margin-bottom: 2%;">
                                    <i class="fa fa-money-bill-wave"
                                       style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                    <input type="text" name="book_price" id="input_text_forms"
                                           style="direction:rtl;text-align:right;width:82% !important;"
                                           placeholder="قیمت مد نظر شما برای انتشار کتاب">

                                </div>

                            </div>

                            <div class="col s12" style="padding: 0px;">

                                <div style="width: 100%;height: 49px;position: relative;overflow: hidden;">
                                    <div class="btn"
                                         style="direction: rtl;background: #b71c1c !important;height: 45px;width: 100%;font-size: 11px;">
                                        <span>آیکون برای نمایش کتاب (تصویر بعدا قابل ویرایش نمیباشد.در انتخاب آن دقت کنید)</span>
                                        <input type="file" name="book_icon"/>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col s12 m6 l6" style="margin-bottom: 15px;">
                            <div id="hero_input" style="width: 100%;">
                                <i class="fa fa-list"
                                   style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>


                                <div class="input-field col s12"
                                     style="width:88%;margin-top: 0px;margin-left: 15px;color: #fff">
                                    <select name="book_cat">
                                        <option value="" disabled selected>یک دسته بندی را انتخاب کنید</option>

                                        <?php
                                        foreach ($cat_data as $value) {
                                            ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php
                                        }
                                        ?>
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
                                    <select name="book_types">
                                        <option value="" disabled selected>انتخاب نوع آموزش</option>
                                        <option value="1">زبان خارجی میباشد و نیاز به ترجمه هست</option>
                                        <option value="2">زبان داخلی میباشد و نیاز به توضیحات دارد</option>
                                    </select>
                                </div>


                            </div>
                        </div>


                        <div class="col s12">

                            <div class="row">

                                <div class="col s12 l6 l6" style="padding: 0px;margin-bottom: 5px;">

                                    <div id="hero_input" style="width: 100%;margin-left: 2%;margin-bottom: 2%;">
                                        <i class="fa fa-arrow-down"
                                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                        <input type="text" name="discount_price" id="input_text_forms"
                                               style="direction:rtl;text-align:right;width:82% !important;"
                                               placeholder="میزان تخفیف (درصد)">

                                    </div>

                                </div>


                                <div class="col s12 m6 l3">

                                    <div id="hero_input"
                                         style="float: right;width: 100%;height: 40px;background: #28a745 !important;color: #fff !important;">
                                        <input type="submit" id="book_sub_btn" class="btn waves-effect"
                                               style="background:#ffc107;width: 100%;height: 100%;padding: 0px;cursor:pointer;"
                                               value="بررسی و ثبت کتاب"/>
                                    </div>

                                </div>


                            </div>

                        </div>


                    </div>


                </form>


                <p style="text-align: right;margin: 10px;color: #fff;">لیست کتاب های ثبت شده توسط شما <i
                            class="fa fa-list-alt" style="margin-left: 7px;"></i></p>


                <div class="col s12" style="padding: 0px;">

                    <div class="card-panel" style="margin: 0px;padding: 0px;border-radius: 5px;overflow: hidden">


                        <?php
                        if (sizeof($book_list) > 0) {
                            ?>
                            <table class="striped" style="direction: rtl;color: #fff;" id="table_show_">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام کتاب</th>
                                    <th>توضیح مختصر</th>
                                    <th>تخفیف (درصد)</th>
                                    <th>قیمت (تومان)</th>
                                    <th>تصویر</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($book_list as $key => $value) {
                                    ?>

                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['name_c'] ?></td>
                                        <td style="max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?= $value['mini_tit'] ?></td>
                                        <td><?= $value['discount'] ?></td>
                                        <td><?= $value['price_'] ?></td>
                                        <td><img style="width: 40px;height: 40px;border-radius: 100%;"
                                                 src="<?= $value['logo'] ?>"/></td>
                                        <td>
                                            <a href="#del_modal" data-tooltip="حذف کتاب"
                                               data-position="bottom" class="tooltipped modal-trigger"><i
                                                        style="cursor: pointer"
                                                        class="fa fa-trash"></i> </a> &nbsp;&nbsp;
                                            <a href="add_cat_world/index/<?= $value['id']; ?>/<?= $value['name_c']; ?>"
                                               data-tooltip="افزودن دسته" data-position="bottom"
                                               class="tooltipped modal-trigger"><i
                                                        style="cursor: pointer" class="fa fa-book-medical"></i> </a>
                                            &nbsp;&nbsp;
                                            <a href="#modal_up_<?= $value['id'] ?>" data-tooltip="ویرایش کتاب"
                                               data-position="bottom"
                                               class="tooltipped modal-trigger"><i
                                                        class="fa fa-edit" style="cursor: pointer"></i></a>

                                        </td>
                                    </tr>


                                    <div id="modal_up_<?= $value['id'] ?>" class="modal"
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


                                            <p style="color: #fff;text-align: center;font-size:16px;">جزئیات این
                                                کتاب</p>
                                            <p style="color: #fff;text-align: center;direction:rtl;font-size:13px;">برای
                                                بروزرسانی ، شما باید تصویر ، صدا و دسته بندی ها را مجدد ویرایش یا انتخاب
                                                کنید.</p>


                                            <form action="add_book/update_book" method="post" enctype="multipart/form-data" class="book_update_form"
                                                  id="book_update_form_<?= $value['id'] ?>">


                                                <div class="col s12" style="padding: 0px;margin-bottom: 15px;">

                                                    <div class="col s12 m6 l6" style="margin-bottom: 15px;">

                                                        <div id="hero_input" style="width: 100%;">
                            <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">توضیحات  کوتاه </span>
                                                            <i class="fa fa-edit"
                                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                            <input type="text" name="book_mini_desc_<?= $value['id'] ?>"
                                                                   id="input_text_forms"
                                                                   style="direction:rtl;text-align:right;width: 82% !important;"
                                                                   value="<?= $value['mini_tit'] ?>"
                                                                   placeholder="توضیحات مختصر برای کتاب">

                                                        </div>

                                                    </div>

                                                    <div class="col s12 m6 l6" style="margin-bottom: 15px;">

                                                        <div id="hero_input" style="width: 100%;">
                            <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">نام کتاب </span>
                                                            <i class="fa fa-book"
                                                               style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                            <input type="text" name="book_name_<?= $value['id'] ?>" id="input_text_forms"
                                                                   value="<?= $value['name_c'] ?>"
                                                                   style="direction:rtl;text-align:right;width: 82% !important;"
                                                                   placeholder="نام کتاب">

                                                        </div>

                                                    </div>

                                                    <div class="col s12 m6 l6" style="margin-bottom: 15px;">

                                                        <div id="hero_input"
                                                             style="padding-right:10px;padding-top:10px;width: 100%;height: 105px;">
                                 <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">توضیحاتی راجب کتاب </span>
                                                            <textarea name="book_full_desc_<?= $value['id'] ?>"
                                                                      style="mborder:none;outline:none;min-height: 90px;max-height: 90px;min-width: 100%;max-width: 100%;"
                                                                      placeholder="توضیحات کاملی راجب کتاب بنویسید..."><?= $value['long_tite'] ?></textarea>
                                                        </div>

                                                    </div>

                                                    <div class="col s12 m6 l6">

                                                        <div class="col s12" style="padding: 0px;margin-bottom: 5px;">

                                                            <div id="hero_input"
                                                                 style="width: 100%;margin-left: 2%;margin-bottom: 2%;">
                                <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">قیمت </span>
                                                                <i class="fa fa-money-bill-wave"
                                                                   style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                                <input type="text" name="book_price_<?= $value['id'] ?>"
                                                                       id="input_text_forms"
                                                                       style="direction:rtl;text-align:right;width:82% !important;"
                                                                       value="<?= $value['price_'] ?>"
                                                                       placeholder="قیمت مد نظر شما برای انتشار کتاب">

                                                            </div>

                                                        </div>


                                                        <div class="col s12"
                                                             style="padding: 0px;margin-bottom: 5px;">

                                                            <div id="hero_input"
                                                                 style="width: 100%;margin-left: 2%;margin-bottom: 2%;">
                                                                 <span id="modir_mark" style="position: absolute;top: 0px;bottom: 0px;height: 21px;
                                                        margin: auto;left: 10px;">تخفیف ( درصد ) </span>
                                                                <i class="fa fa-arrow-down"
                                                                   style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>
                                                                <input type="text" name="discount_price_<?= $value['id'] ?>"
                                                                       id="input_text_forms"
                                                                       value="<?= @$value['discount'] ?>"
                                                                       style="direction:rtl;text-align:right;width:82% !important;"
                                                                       placeholder="میزان تخفیف (درصد)">

                                                            </div>

                                                        </div>


                                                    </div>


                                                    <div class="col s12">
                                                        <div class="row">

                                                            <div class="col s12 m6 l6">
                                                                <div id="hero_input"
                                                                     style="width: 100%;margin-top:15px;">
                                                                    <i class="fa fa-list"
                                                                       style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>


                                                                    <div class="input-field col s12"
                                                                         style="width:83%;margin-top: 0px;margin-left: 15px;color: #fff">
                                                                        <select name="book_cat_<?= $value['id'] ?>" selected="1">
                                                                            <option value="" disabled selected>یک دسته
                                                                                بندی را انتخاب کنید
                                                                            </option>

                                                                            <?php
                                                                            foreach ($cat_data as $values) {
                                                                                ?>
                                                                                <option value="<?= $values['id'] ?>"><?= $values['name'] ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="col s12 m6 l6" style="margin-bottom: 15px;">
                                                                <div id="hero_input"
                                                                     style="width: 100%;margin-top:15px;">
                                                                    <i class="fa fa-transgender"
                                                                       style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>


                                                                    <div class="input-field col s12"
                                                                         style="width: 83%;margin-top: 0px;margin-left: 15px;color: #fff">
                                                                        <select name="book_types_<?=  $value['id'] ?>">
                                                                            <option value="" disabled selected>انتخاب
                                                                                نوع آموزش
                                                                            </option>
                                                                            <option value="1">زبان خارجی میباشد و نیاز
                                                                                به ترجمه هست
                                                                            </option>
                                                                            <option value="2">زبان داخلی میباشد و نیاز
                                                                                به توضیحات دارد
                                                                            </option>
                                                                        </select>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <div class="col s12">

                                                        <div class="row">

                                                            <div class="col s12 m6 l6">
                                                                <div id="hero_input"
                                                                     style="float: right;width: 100%;height: 40px;background: #28a745 !important;color: #fff !important;">

                                                                    <a id="book_sub_btn_up" onclick="update_book(<?= $value['id'] ?>)"
                                                                       class="btn waves-effect"
                                                                       style="color:#000;background:#ffc107;width: 100%;height: 100%;padding: 0px;cursor:pointer;">
                                                                        بررسی و ویرایش کتاب
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
                                            <h4>آیا نسبت به حذف کتاب مطمئن هستید؟</h4>
                                            <p>1- تمامی زیر دسته های این کتاب حذف خواهند شد.</p>
                                            <p>2- تمامی کلمات ثبت شده در این کتاب و زیر دسته های آن حذف خواهد شد.</p>
                                            <p>3- تمامی فایل های آپلودی توسط شما برای کلمات موجود در این کتاب حذف خواهند
                                                شد.</p>
                                            <p>4- درصورتیکه بعدا تمایل به ریکاوری داشته باشید ؛ زمانبر و پر هزینه خواهد
                                                بود.</p>
                                        </div>
                                        <div class="modal-footer" style="background: #0d2162 !important;">
                                            <a id-pro="<?= $value['id']; ?>" id="del_book"
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
                            <a id="empty_book">شما تاکنون کتابی ثبت نکرده اید!!!</a>
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
</div>



<!--<div style="width: 200px;height: 300px;position:fixed;background: #000;" class="d-hidden-mini"></div>-->


<script src="public/dist/js/all.min.js"></script>
<script src="public/dist/js/morris.min.js"></script>
<script src="public/dist/js/raphael.min.js"></script>
<script src="public/dist/js/materialize.min.js"></script>
<script src="public/java_code.js"></script>
</body>
</html>