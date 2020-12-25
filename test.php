<meta charset="UTF-8"/>
<?php

/*
$folder_path = "public/course_/uploads_logo/77230/";
$file_name = "express.png";
$files  = scandir("public/course_/uploads_logo/77230");
foreach ($files as $file)
{
    if ($file === '.' or $file === '..')
    {
        continue;
    }else
    {
        unlink($folder_path."/".$file_name);
    }
}
if (rmdir($folder_path))
{
    echo "is del";
}
else{
    echo "error";
}

*/




        // $arr_idc = array();
        // foreach ($res_c as $item) {
        //     array_push($arr_idc,$item['id']);
        // }

        // $str_ids = implode(",",$arr_idc);

        // $sql_p = "select * from `payment_tbm` where `c_id_` IN ('".$str_ids."')";
        // $res_p = $this->select_query($sql_p,[]);


        // $pay_id = array();
        // foreach ($res_p as $item_p) {
        //     array_push($pay_id,$item_p['c_id_']);
        // }
    




require 'public/lib/jdf.php';

$date = jdate("Y/m/F/d", '', '', '', 'en');
$res = explode('/', $date);
//echo $res[2];
//echo $date;
$chat = array(
    array('3 آبان', 'vsdvsdvsdvsdvsdvs', '4240378133'),
    array('4 شهریور', 'vsdvsdvsdvsdvsdvs', '4240378133'),
    array('4 آذر', ' svsdvsvsdv ', '40547817')
);
$discount = json_encode(array(22,35,52));

$date_fa = '1399-06-15';
$date_en = '1399-07-15';
$now_time = date('Y-m-d');
$date_fa_arr = explode('/', $date_fa);

$slider = array(
        array('public/img/slider4.jpg' , 'با تمارین زیادی که در نرم افزار وجود داردموبایلتان را به کلاس درس تبدیل کرده ایم.','مدرسه ای در جیب شما'),
        array('public/img/slider3.jpg' , 'پشتیبانی و پیگیری ما تا آخرین سانس از آموزش با شما خواهد بود و شما را همراهی خواهیم کرد','پشتیبانی تا رسیدن به مقصد'),
        array('public/img/slider2.jpg' , 'با تمارین زیاد و پیگیری نرم افزار از کار شما ، شما میتوانید در کمترین زمان به بالاترین سطح از آموزش برسید.','جامعیت و کامل بودن نرم افزار'),
);
$pro_top = array(
        '1398/01/28','1398/01/28','1398/01/27','1398/01/26'
);
//echo json_encode($pro_top);


//echo json_encode($pro_top,JSON_UNESCAPED_UNICODE);
//$date_en = jalali_to_gregorian($date_fa_arr[0],$date_fa_arr[1],$date_fa_arr[2],'-');
//print_r(json_decode(''));
//echo json_encode($chat,JSON_UNESCAPED_UNICODE );
//$date = date('Y-m-d');
//echo $date_fa . " => now </br>";
//echo $date_en . " => last</br>";
if ($date_fa < $date_en) {
//    echo "last chat";
} else {
//    echo "now chat";
}
//echo $discount;
//$date = jdate("Y/m/d",time());
//print_r($date_fa_arr);



$res = array(
        "4240378133" => "1398"
);

$pass = 123123123;

$hash = md5($pass."emranLaruzSDRast~").md5("mygoodlkjhuhkh~");
//echo $hash;
md5($rand_pass."emranLaruzSDRast~").md5("mygoodlkjhuhkh~")


?>
<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>jQuery Countdown timer</title>
<!--    <link rel="stylesheet" href="css/example.css" type="text/css" />-->
    <link rel="stylesheet" href="public/dist/css/jquery.countdown.timer.css" type="text/css" />
    <link rel="stylesheet" href="public/style.css" type="text/css" />

</head>
<body>

<div id="back_clock">



</div>




<!--<div id="centered_div">-->
<!--    <p>Time left:</p>-->
<!--    <div id="counter">-->
<!--        <div id="counter_item1" class="counter_item">-->
<!--            <div class="front"></div>-->
<!--            <div class="digit digit0"></div>-->
<!--        </div>-->
<!--        <div id="counter_item2" class="counter_item">-->
<!--            <div class="front"></div>-->
<!--            <div class="digit digit0"></div>-->
<!--        </div>-->
<!--        <div id="counter_item3" class="counter_item">-->
<!--            <div class="front"></div>-->
<!--            <div class="digit digit_colon"></div>-->
<!--        </div>-->
<!--        <div id="counter_item4" class="counter_item">-->
<!--            <div class="front"></div>-->
<!--            <div class="digit digit0"></div>-->
<!--        </div>-->
<!--        <div id="counter_item5" class="counter_item">-->
<!--            <div class="front"></div>-->
<!--            <div class="digit digit0"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <p style="margin-top: 20px">-->
<!--        <a href="javascript:;" onclick="CounterInit(600); return false;">10 min</a>-->
<!--    </p>-->
<!---->
<!--</div>-->
<!--<div id="log">-->
<!--</div>-->
<!--<div id="log2">-->
<!--</div>-->



<script type="text/javascript" src="public/dist/js/jquery.js"></script>
<script src="public/dist/js/jquery.timeout.interval.idle.js" type="text/javascript"></script>
<script src="public/dist/js/jquery.countdown.counter.js" type="text/javascript"></script>
<script type="text/javascript">
    CounterInit(3600);
</script>
</body>
</html>