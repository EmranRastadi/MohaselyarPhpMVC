<?php
$model_obj = new Model();
$user_dat = $model_obj->user_data();
$counter_pro = $user_dat[1];
$count_msg = sizeof($model_obj->get_msg_count());
$check_modir = $user_dat[2];
?>

<div class="col hide-on-med-and-down m12 l3">


    <div class="section row">

        <div class="col s6 m6 l12">

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header" style="font-size: 19px;line-height: 1.1;">
                        <i class="fa fa-desktop" style="margin-left: 15px;font-size: 19px;"></i><a
                                href="<?= URL ?>dashboard">داشبورد</a>
                    </div>
                </li>

                <?php
                if ($check_modir == '4240378133') {
                    ?>

                    <li>
                        <div class="collapsible-header" style="font-size: 19px;line-height: 1.1;">
                            <i class="fa fa-chess-queen" style="margin-left: 15px;font-size: 19px;"></i><a
                                    href="<?= URL ?>setting_main">مدیریت</a>
                        </div>
                    </li>
                    <?php
                }
                ?>
                <li>
                    <div class="collapsible-header"><i class="fa fa-pencil-ruler"
                                                       style="margin-left: 15px;font-size: 19px;"></i><a
                                href="<?= URL ?>modir_news">اخبار مدیریت</a>
                        <span
                            <?php
                            if ($count_msg > 0)
                            {
                            if ($check_modir !== '4240378133')
                            {
                            ?>
                                id="modir_mark" style="top: 6px !important;"
                                class="modir_news_counts"><?= $count_msg ?></span>
                        <?php
                        }
                        }
                        ?>

                    </div>
                </li>
                <li class="active">
                    <div class="collapsible-header"><i class="fa fa-edit"
                                                       style="margin-left: 15px;font-size: 19px;"></i><a
                                href="<?= URL ?>add_book">مدیریت محصولات</a>
                    </div>
                </li>

                <li style="display: none;">
                    <div class="collapsible-header" style="font-size: 19px;line-height: 1.1;">
                        <i class="fa fa-paper-plane" style="margin-left: 15px;font-size: 19px;"></i><a
                                href="<?= URL ?>inboxMsg">مدیریت پیام ها</a>
                    </div>
                </li>

                <li>
                    <div class="collapsible-header"><i class="fa fa-cogs"
                                                       style="margin-left: 15px;font-size: 19px;"></i><a
                                href="<?= URL ?>profile">شخصی</a>
                    </div>

                </li>

            </ul>
        </div>

        <div class="col s6 m6 l12">

            <div class="card-panel" style="padding: 13px;border-radius: 5px;">

                <div class="row">


                    <?php
                    $pro_set = 'block';
                    if ($counter_pro == 100) {
                        $pro_set = 'none';
                    }
                    ?>

                    <div class="col s12"
                         style="display:<?= $pro_set ?>;margin-bottom: 10px;position: relative;height: 178px;">
                        <div style="width: 100%;height: 18px;color: #fff;font-size: 13px;text-align: center !important;">
                            <span style="float: right;width: 100%;">تنظیمات پروفایل</span>
                            <div style="width: 150px;height: 142px;position: absolute;left: 0px;right: 0px;margin: 43px auto;">

                                <svg style="position: relative;width: 150px;height: 150px;z-index: 9;">
                                    <circle r="70" cx="70" cy="70" style="width: 100%;height: 100%;fill: none;stroke: #b71c1c;stroke-width: 10;stroke-linecap: round;transform: translate(5px , 5px);">

                                    </circle>
                                    <circle style="width: 100%;height: 100%;fill: none;stroke: black;stroke-width: 10;stroke-linecap: round;transform: translate(5px , 5px);stroke-dasharray: <?= 360 - round(($user_dat[1] * 3600) / 10, 0); ?>;stroke-dashoffset: <?= (round(($user_dat[1] * 3600) / 10, 0)); ?>;stroke: orange;"
                                            r="70"
                                            cx="70" cy="70">
                                    </circle>
                                </svg>

                                <span id="progress_label"><?= round(($user_dat[1] * 100), 0) ?>%</span>
                                <!--                                <span id="progress_label">-->
                                <? //= round(($user_dat[1]*36)/10,0); ?><!--%</span>-->
                            </div>
                        </div>
                    </div>

                    <!--                        <div class="col s12" style="margin-bottom: 10px;">-->
                    <!--                            <div style="width: 100%;height: 18px;color: #fff;font-size: 13px;">-->
                    <!--                                <span style="float: right;">تیکت های جواب شده</span>-->
                    <!--                                <span style="float: left;">30%</span>-->
                    <!--                            </div>-->
                    <!--                            <div class="progress">-->
                    <!--                                <div class="determinate" style="width: 30%;background: #28a745 !important"></div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!---->
                    <!--                        <div class="col s12" style="margin-bottom: 10px;">-->
                    <!--                            <div style="width: 100%;height: 18px;color: #fff;font-size: 13px;">-->
                    <!--                                <span style="float: right;">رضایت مشتری</span>-->
                    <!--                                <span style="float: left;">60%</span>-->
                    <!--                            </div>-->
                    <!--                            <div class="progress">-->
                    <!--                                <div class="determinate" style="width: 60%;background: #17a2b8"></div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->

                </div>


            </div>

        </div>

    </div>

</div>
