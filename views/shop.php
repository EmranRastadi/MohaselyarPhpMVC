<?php
$cat = $data[0];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>فروشگاه یارا</title>
    <link rel='stylesheet' href='public/style.css'/>
    <script src="public/dist/js/jquery.js"></script>
    <script src="public/java_code.js"></script>
    <link rel="stylesheet" href="public/dist/css/materialize.min.css"/>
    <link rel="stylesheet" href="public/dist/css/all.css"/>
</head>
<body>

<script>

    (function ($) {
        $(function () {

            $('.sidenav').sidenav();

        }); // end of document ready
    })(jQuery); // end of jQuery name space

    $(document).ready(function () {
        $('.parallax').parallax();
    });


    // Or with jQuery


</script>

<?php
include 'menu_top.php';
?>


<div class="section" style="margin-top: -30px;">


    <div class="section">

        <div class="col s12 container">
            <div class="row" style="margin-top: 15px;margin-bottom: 0px;">
                <div class="input-field col s12 m6 l3">
                    <select id="select-toped" class="meyarha">
                        <option value="" disabled selected>مرتب سازی بر اساس معیار ها</option>
                        <option value="0" class="right">گرانترین ها</option>
                        <option value="1" class="right">ارزان ترین ها</option>
                        <option value="3" class="right"> تخفیف</option>
                    </select>
                    <label></label>
                </div>


                <div class="input-field col s12 m6 l3">

                    <select id="select-toped" class="select_cat">
                        <option value="" disabled selected>مرتبط سازی بر اساس دسته بندی</option>

                        <?php
                        foreach ($cat as $val_cat) {
                            ?>
                            <option value="<?= $val_cat['id'] ?>" class="right"><?= $val_cat['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label></label>

                </div>
                <div class="col s12 m6 l3"></div>
                <div class="input-field col s12 m12 l6">

                    <div id="hero_input">

                        <i class="fa fa-search"
                           style="float: right;color: #ffc107 !important;margin-right: 15px;margin-top: 13px;"></i>

                        <input id="input_text_forms_search" style="direction:rtl;width: 88% !important;text-align: right"
                               name="search_in_shop"
                               placeholder="لطفا نام محصول مورد نظر را تایپ کنید..."/>
                    </div>

                </div>

            </div>
            <div class="divider"></div>
        </div>

        <div class="row" style="margin-top: 15px;position:relative;">
            <div class="col s12" id="pro_box_shop_main" style="position:relative;">
            </div>
            <div id="back_stage_shop">
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
                    <span style="float: right;margin-right: 67px;direction: rtl;line-height: 3.7;font-size: 18px;">لطفا کمی منتظر بمانید ...</span>
                </div>
            </div>
        </div>

        <div class="col s12" style="display: none">
            <ul class="pagination flexbox">
                <li class="disabled"><a href="#!"><i class="fa fa-chevron-left"></i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="fa fa-chevron-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>









<div id="shop_boxing_det" class="modal modal-fixed-footer">
    <div id="main_modals">

    </div>
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
            <span style="float: right;margin-right: 67px;direction: rtl;line-height: 3.7;font-size: 18px;">لطفا کمی منتظر بمانید ...</span>
        </div>
    </div>
</div>









<?php
include 'footer.php';
?>


<!--<script src="/javascripts/all.min.js" type="text/javascript"></script>-->
<!--<script src="/javascripts/materilize.min.js" type="text/javascript"></script>-->


<script src="public/dist/js/materialize.min.js"></script>
<script src="public/dist/js/all.min.js"></script>

</body>

</html>
