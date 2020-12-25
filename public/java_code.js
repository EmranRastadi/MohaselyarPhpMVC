/**
 * Created by laruz on 3/18/2020.
 */
function reload_page() {
    $(window).on('load', function () {
        $('#top_progress').addClass('dis');
    });
}
reload_page();


$(function () {

    $("#select_chat").click(function () {
        $("#back_stage_contact").addClass("fade_back_stage");
        $("span.more_icons").toggleClass("active_icon");
    });

    $(".back_ticket").click(function () {
        var ids = $(this).attr('id');
        $("#chat_box_data").attr("id-box", ids);
        $("span.more_icons").toggleClass("active_icon");
        get_chats(ids);
    });

    $(".refresh_chat").click(function () {
        var chat_id = $("#chat_box_data").attr('id-box');
        if (chat_id == '') {
            toasting("شما هنوز تیکتی را انتخاب نکرده اید.")
        } else {
            get_chats(chat_id);
        }
    });

    $("#btn_in_form").click(function () {
        var that = $(this);
        var text_tic = $("input[name=msg_text_tic]").val();
        var chat_id = $("#chat_box_data").attr('id-box');
        var chat_date = $("#chat_box_data").attr('date-chat');
        if (chat_id == '') {
            toasting("ابتدا یک تیکت را برای پاسخگویی انتخاب کنید.")
        } else {
            if (text_tic != '') {
                $("#tic_progress").fadeIn(0);
                that.attr('disabled', true);
                var img = $("#mini_pro_img").attr("src");


                var data = {
                    text: text_tic,
                    chat_id: chat_id,
                    date: chat_date
                };

                $.post('dashboard/insert_tic_replay', data, function (msg) {
                    $("#chat_box_data").append('<div class="col s12"><div class="card-panel" id="card-paenl-index" style="padding: 0px;box-shadow: none !important;"><div class="row valign-wrapper" style="margin-bottom: 5px;"><div class="col s12"><div class="col s10" style="position:relative;background: #ffc107 !important;font-size: 12px;padding: 10px;text-align: justify;border-radius: 5px;"> <div id="chev_right"></div><span style="width: 100%;color: #000;"><div class="col s12" style="height: 30px;"><div class="row"><div class="col s6 left"><a class="left" id="modir_mark" style="text-align: left;margin: 0px;font-size: 11px;color: #fff3e0;">' + chat_date + '</a></div><div class="col s6 right"><a id="sender_mark" style="float: right;margin-left: 7px;">شما</a></div></div> </div><div class="col s12"><span>' + text_tic + '</span></div></span></div><div class="col s2"><img src="' + img + '" class="responsive-img circle" style="width: 50px;height:50px;"/></div></div></div></div></div>');
                    var scr = $('#page_chat')[0].scrollHeight;
                    $('#page_chat').animate({scrollTop: scr}, 2000);
                    $("input[name=msg_text_tic]").val('');
                    that.attr('disabled', false);
                    $("#tic_progress").fadeOut(0);
                });

            } else {
                toasting("لطفا چیزی تایپ کنید...")
            }
        }
    });


});


function get_chats(id) {

    var ids = id;

    $("#chat_box_data").html('');
    $("#title_chats").empty();
    $("#select_chat").fadeOut(0);
    $("#back_stage_contact").removeClass("fade_back_stage");
    $("#loading_chats").fadeIn();
    $.ajax({

        url: 'dashboard/get_once_chat',
        type: 'POST',
        data: {id: ids},
        success: function (msg) {

            setTimeout(function () {
                $("#loading_chats").fadeOut();
                var resiver_name = msg['resiver_name'];
                var resiver_id = msg['resiver_code'];
                var sender_name = msg['sender_name'];
                var sender_code = msg['sender_code'];
                var title = msg['title'];
                var chat = JSON.parse(msg['data']);

                var img_s = 'public/dist/img/avatar3.png';
                var img_r = 'public/dist/img/avatar04.png';
                if (msg['sender_img'] != '') {
                    img_s = msg['sender_img'];
                }
                if (msg['resiver_img'] != '') {
                    var img_r = msg['resiver_img'];
                }

                console.log(chat);
                $.each(chat, function (i, v) {
                    var date = chat[i][0];
                    var chat_desc = chat[i][1];
                    var user = chat[i][2];

                    if (user == resiver_id) {
                        //   modir
                        $("#chat_box_data").append('<div class="col s12"><div class="card-panel" id="card-paenl-index" style="padding: 0px;box-shadow: none !important;"><div class="row valign-wrapper" style="margin-bottom: 5px;"><div class="col s12"><div class="col s10" style="position:relative;background: #ffc107 !important;font-size: 12px;padding: 10px;text-align: justify;border-radius: 5px;"> <div id="chev_right"></div><span style="width: 100%;color: #000;"><div class="col s12" style="height: 30px;"><div class="row"><div class="col s6 left"><a class="left" id="modir_mark" style="text-align: left;margin: 0px;font-size: 11px;color: #fff3e0;">' + date + '</a></div><div class="col s6 right"><a id="sender_mark" style="float: right;margin-left: 7px;">شما</a></div></div> </div><div class="col s12"><span>' + chat_desc + '</span></div></span></div><div class="col s2"><img src="' + img_r + '" class="responsive-img circle" style="width: 50px;height:50px;"/></div></div></div></div></div>')
                    } else {
                        $("#chat_box_data").append('<div class="col s12"><div class="card-panel" id="card-paenl-index" style="padding: 0px;box-shadow: none !important;"><div class="row valign-wrapper" style="margin-bottom: 5px;"><div class="col s12"><div class="col s2"><img src="' + img_s + '" class="responsive-img circle" style="width: 50px;height: 50px;"/></div><div class="col s10" style="position:relative;background: #dc3545 !important;font-size: 12px;padding: 10px;text-align: justify;border-radius: 5px;"><div id="chev_left"></div><div class="col s12" style="height: 30px;"><div class="row"><div class="col s6 left"><a class="left" id="modir_mark" style="text-align: left;margin: 0px;font-size: 11px;color: #fff;background: #000">' + date + '</a></div><div class="col s6 right"><a id="sender_mark" style="float: right;margin-left: 7px;">' + sender_name + '</a></div></div> </div><div class="col s12">' + chat_desc + '</div></div></div></div></div>');
                    }
                });
                $("#title_chats").append('<span style="color: #ffc107">موضوع :</span>' + title);
                var scr = $('#page_chat')[0].scrollHeight;
                $('#page_chat').animate({scrollTop: scr}, 2000);
            }, 1000)

        },
        dataType: 'json'

    });
};


$(function () {

    $("form#ticket_form_sender").on('submit', function () {

        var formdata = new FormData(this);
        var forms = $(this);

        forms.find('[name]').each(function () {
            var that = $(this),
                names = that.attr('name'),
                valu = that.val();
            formdata.append(names, valu);
        });

        $("#top_progress").fadeIn(0);

        $.ajax({
            url: 'inboxMsg/write_new_msg',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            cache: false,
            success: function (msg) {
                setTimeout(function () {
                    $("#top_progress").fadeOut(0);
                    switch (msg) {
                        case 'empty' :
                            toasting("یک یا چند فرم خالی میباشد.");
                            break;
                        case 'type':
                            toasting('تصویر باید jpg , jpeg یا png باشد.');
                            break;
                        case 'size':
                            toasting("حجم تصویر بیشتر از 100kb است.");
                            break;
                        case 'upload_error':
                            toasting("ارتباط با سیستم قطع است ! مجددا تلاش کنید.");
                            break;
                        case 'uploaded':
                            toasting("پیام با موفقیت ارسال شد.هم اکنون به صندوق دریافتی منتقل خواهید شد.");
                            setTimeout(function () {
                                location.reload(true);
                            }, 1500);
                            break;
                    }
                }, 1000);
            }
        });

        return false;
    });

});


$(function () {

    $("form#world_adding_form").on('submit', function () {

        var data_form = new FormData(this);
        var that_ = $(this),
            url = that_.attr('action'),
            meth = that_.attr('method');

        that_.find('[name]').each(function () {
            var that_n = $(this),
                index_k = that_n.attr('name'),
                val_ = that_n.val();
            data_form.append(index_k, val_);
        });

        $.ajax({
            url: url,
            type: meth,
            data: data_form,
            cache: false,
            contentType: false,
            processData: false,
            success: function (msg) {
                switch (msg)
                {
                    case 'empty':
                        toasting("برخی از فیلد ها خالی میباشند.");
                        setTimeout(function () {
                            location.reload(true);
                        },700);
                        break;
                    case 'ok':
                        toasting("با موفقیت ثبت شدند.کمی صبر کنید...");
                        setTimeout(function () {
                            location.reload(true);
                        },1000);
                        break;
                    case 'err':
                        toasting("مشکلی پیش آمده است!");
                        break;
                    case 'type':
                        toasting("در انتخاب نوع فایل ها دقت کنید.");
                        break;
                    case 'size':
                        toasting("سایز تصویر یا صدا زیاد میباشد.");
                        break;
                }
            }

        });

        return false;
    });

});


$(function () {
    $("#sub_cat_www").click(function () {


        $("#top_progress").fadeIn(0);
        var forms_ = $("form#cat_adding_form"),
            url = forms_.attr("action"),
            type = forms_.attr("method");

        var data = {};
        forms_.find("[name]").each(function (index, val) {
            var that = $(this);
            var keys = that.attr('name'),
                vals = that.val();
            data[keys] = vals;
        });

        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function (msg) {
                $("#top_progress").fadeOut(0);
                switch (msg) {
                    case 'ok':
                        toasting("با موفقیت ثبت شدند.");
                        setTimeout(function () {
                            location.reload(true);
                        }, 1000);
                        break;
                    case 'no':
                        toasting("خطایی پیش آمده است ! مجددا تلاش کنید.");
                        break;
                    case 'empty':
                        toasting("یک یا چند فیلد خالی بود.");
                        setTimeout(function () {
                            location.reload(true);
                        }, 1000);
                        break;
                }
            }
        });


    });

});


function update_cat(id) {
    $("#modal_up_cat_"+id+" #load_add_to_card").fadeIn(0);
    var name_cat = $("input[name=cat_new_name_"+id+"]").val();
    $.post('add_cat_world/up_cat',{id:id,name:name_cat},function (msg) {
        $("#modal_up_cat_"+id+" #load_add_to_card").fadeOut();
        switch (msg)
        {
            case 'ok':
                toasting("با موفقیت بروزرسانی شد!کمی صبر کنید...");
                setTimeout(function () {
                    location.reload(true);
                },1000);
                break;
            case 'no':
                toasting("خطایی پیش آمده است!مجددا تلاش کنید...");
                break;
            case 'empty':
                toasting("لطفا فیلد را خالی نگذارید...");
                break;
        }
    })
}



function update_book(id) {
    $("#modal_up_"+id+" #load_add_to_card").fadeIn(0);
    var url = $("form#book_update_form_"+id).attr('action');
    var par = $("form#book_update_form_"+id);
    var mini_desc = $("input[name=book_mini_desc_"+id+"]").val();
    var book_name = $("input[name=book_name_"+id+"]").val();
    var full_desc = $("textarea[name=book_full_desc_"+id+"]").val();
    var price = $("input[name=book_price_"+id+"]").val();
    var discount = $("input[name=discount_price_"+id+"]").val()
    var cat = $("select[name=book_cat_"+id+"]").val()
    var type = $("select[name=book_types_"+id+"]").val()

    $.post(url,{mini:mini_desc,name:book_name,full:full_desc,price:price,disc:discount,cat:cat,type:type,id:id},function (msg) {

        $("#modal_up_"+id+" #load_add_to_card").fadeOut();
        switch (msg)
        {
            case 'ok':
                toasting("با موفقیت بروزرسانی شد!کمی صبر کنید...");
                setTimeout(function () {
                    location.reload(true);
                },1000);
                break;
            case 'no':
                toasting("خطایی پیش آمده است!مجددا تلاش کنید...");
                break;
            case 'empty':
                toasting("برخی از فیلد ها ، دسته بندی ها خالی است.");
                break;
        }
    })

}


$(function () {



    // $("a#book_sub_btn_up").click(function () {
    //     var par = $(this).closest('form.book_update_form').attr('action');
    //     // var url = par.attr('id');
    //     alert(par);
    // });
    /*
    $("form#book_update_form").on('submit',function () {
        alert("sub");
        // var id = $(this).attr('pro_id');
        var form_file = new FormData(this);
        var form_ = $(this),
            url = form_.attr('action'),
            type = form_.attr('method'),
            data = {};

        form_.find('[name]').each(function (index, value) {
            var that = $(this),
                name = that.attr('name'),
                values = that.val();
            form_file.append(name, values);
        });

        // form_file.append('id_pro',id);

        // $("#top_progress").fadeIn(0);
        $.ajax({
            url: url,
            type: type,
            data: form_file,
            cache: false,
            contentType: false,
            processData: false,
            success: function (msg) {
                // setTimeout(function () {
                //     $("#top_progress").fadeOut(0);
                //     switch (msg) {
                //         case 'empty' :
                //             toasting("یک یا چند فرم خالی میباشد.");
                //             break;
                //         case 'type':
                //             toasting('تصویر باید jpg , jpeg یا png باشد.');
                //             break;
                //         case 'size':
                //             toasting("حجم تصویر بیشتر از 100kb است.");
                //             break;
                //         case 'upload_error':
                //             toasting("ارتباط با سیستم قطع است ! مجددا تلاش کنید.");
                //             break;
                //         case 'uploaded':
                //             toasting("کلاس با موفقیت اضافه شد.");
                //             setTimeout(function () {
                //                 location.reload(true);
                //             }, 1000);
                //             break;
                //     }
                // }, 1000);
                alert(msg);
            }
        });
        return false;
    });
*/





});

$(function () {

    $("form#book_adding_form").on('submit', function () {
        var form_file = new FormData(this);
        var form_ = $(this),
            url = form_.attr('action'),
            type = form_.attr('method'),
            data = {};

        form_.find('[name]').each(function (index, value) {
            var that = $(this),
                name = that.attr('name'),
                values = that.val();
            form_file.append(name, values);
        });

        $("#top_progress").fadeIn(0);
        $.ajax({
            url: url,
            type: type,
            data: form_file,
            cache: false,
            contentType: false,
            processData: false,
            success: function (msg) {
                setTimeout(function () {
                    $("#top_progress").fadeOut(0);
                    switch (msg) {
                        case 'empty' :
                            toasting("یک یا چند فرم خالی میباشد.");
                            break;
                        case 'type':
                            toasting('تصویر باید jpg , jpeg یا png باشد.');
                            break;
                        case 'size':
                            toasting("حجم تصویر بیشتر از 100kb است.");
                            break;
                        case 'upload_error':
                            toasting("ارتباط با سیستم قطع است ! مجددا تلاش کنید.");
                            break;
                        case 'uploaded':
                            toasting("کلاس با موفقیت اضافه شد.");
                            setTimeout(function () {
                                location.reload(true);
                            }, 1000);
                            break;
                    }
                }, 1000);
            }
        });
        return false;
    });



    // $("input#book_sub_btn_up").click(function () {
    //     alert("vsdv");
    // })








    $("span.more_icons").click(function () {
        $("span.more_icons").toggleClass("active_icon");
        $("#back_stage_contact").toggleClass("fade_back_stage");
    });

    var items = ".collapsible-header";
    $(items).click(function () {
        $("span#icon ", this).toggleClass("active_icon");
    });


    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function () {
        $('select').formSelect();
    });


    $("a#del_cat").click(function () {

        var id_cat = $(this).attr("id-pro");
        $.post("add_cat_world/del_cat", {id: id_cat}, function (msg) {
            if (msg == "ok") {
                toasting("دسته با موفقیت حذف شد.");
                setTimeout(function () {
                    location.reload(true);
                }, 1000);
            } else {
                toasting("خطایی پیش آمده است . مجددا تلاش کنید.");
            }

        })

    });


    $("a#del_book").click(function () {
        var id_pro = $(this).attr('id-pro');
        $.post('add_book/del_book', {id: id_pro}, function (msg) {
            toasting("کتاب با موفقیت حذف شد.");
            setTimeout(function () {
                location.reload(true);
            }, 1000);

        });
    });


    $(".select_cat").on('change', function () {
        var text = $("option:selected", this);
        var ordered = $(".meyarha option:selected").val();
        var val_opt = $(this).val();
        var search = $("#input_text_forms_search").val();
        var text2 = text.text();
        get_data(val_opt, ordered, search);
    });
    $(".meyarha").on('change', function () {
        var order = $(this).val();
        var search = $("#input_text_forms_search").val();
        var cat_sel = $(".select_cat option:selected").val();
        get_data(cat_sel, order, search);
    });

    $("#input_text_forms_search").keyup(function () {
        var search_text = $(this).val();
        var cat_sel = $(".select_cat option:selected").val();
        var ordered = $(".meyarha option:selected").val();
        get_data(cat_sel, ordered, search_text);

    })

});


function get_data(cat, order, search) {
    $("#pro_box_shop_main").html('');
    $("#back_stage_shop").fadeIn(0);
    var data = {cat: cat, order: order, search: search};
    $.ajax({
        url: 'shop/get_product',
        data: data,
        type: 'POST',
        success: function (msg) {
            $("#back_stage_shop").fadeOut(0);
            for (var i = 0; i < msg.length; i++) {
                var prices = 0;
                if (msg[i]['discount'] != 0) {
                    prices = '<span class="badge" style="background: darkred;border-radius: 5px;color: #fff;position: relative"><span id="stroke_broke"></span>' + msg[i]["price_"] + '</span><span>' + msg[i]["dis"] + '</span> تومان ';
                } else {
                    prices = '<span>' + msg[i]["price_"] + '</span> تومان ';
                }
                $("#pro_box_shop_main").append('<div onclick="click_on_pro(' + msg[i]['id'] + ')" class="col s12 m4 l3 modal-trigger right" desc="' + msg[i]['long_tite'] + '" pro_id="' + msg[i]['id'] + '" cat_id="' + msg[i]['type_c'] + '"  id="box_shoping_clicks" href="#shop_boxing_det"><div class="card hoverable" id="shop_boxing_' + msg[i]["id"] + '"><div class="card-image" style="position: relative"><img id="image_pro" src="' + msg[i]["logo"] + '"></div><div class="card-content"><p style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: 13px;">' + msg[i]["mini_tit"] + '</p></div><div class="card-action"><p style="direction: rtl;margin: 0px;color: #ffd600;">' + prices + '<a class="left" id="add_to_basket" style="font-size: 24px;cursor: pointer;" id="' + msg[i]['id'] + '"><i class="fa fa-shopping-cart"></i></a></p></p></div></div></div>');
            }
        },
        dataType: 'json'
    });
}
get_data('', '', '');


function click_on_pro(pro_id) {
    $("#shop_boxing_det #main_modals").html('');
    $.ajax({
        url: 'shop/get_product_det',
        data: {proid: pro_id},
        type: 'POST',
        success: function (msg) {
            var amount_dis;
            if (msg['dis'] != 0) {
                amount_dis = '<span class="badge" style="margin-right:15px !important;background: darkred;border-radius: 5px;color: #fff;position: relative"><span id="stroke_broke"></span>' + msg['price_'] + '</span><span>' + msg['dis'] + '&nbsp;&nbsp;تومان &nbsp;&nbsp;</span>';
            } else {
                amount_dis = '<span class="right" style="margin-right: 15px;">' + msg['price_'] + '&nbsp;&nbsp;تومان &nbsp;&nbsp;</span>';
            }

            $("#shop_boxing_det #main_modals").append('<div class="modal-content"><div class="row"><div class="col s12 m6 l6 right"><p style="margin: 0px;direction: rtl;color: #fff;font-size: 18px;">' + msg['name_c'] + '</p></div><div class="col s12 m6 l6 left"><span style="color: #fff">   رضایت کاربران <span class="right">' + msg['rate'] + '%</span></span>&nbsp;&nbsp;<div class="progress"><div class="determinate" style="background:#ff9800 !important;width: ' + msg['rate'] + '%"></div></div></div><div class="col s12 flexbox"> <img class="responsive-img materialboxed" data-caption="' + msg['mini_tit'] + '" src="' + msg['logo'] + '" width="170" height="170"/></div><div class="col s12"><span class="right" style="color: #fff;font-size: 13px;text-align: right;padding-bottom: 15px;padding-top: 15px;">' + msg['long_tite'] + '</span> </div></div></div><div class="modal-footer" style="background: #14307b !important;"><div class="row" style="margin-bottom: 0px !important;"><div class="col s12 m6 l6 left center" ><a onclick="add_to_cart(' + msg['id'] + ')" class="waves-effect orange btn left" id="' + msg['id'] + '" style="width:100% !important;;color: #000 !important;font-size: 13px;">&nbsp;&nbsp;افزودن به سبد خرید &nbsp;&nbsp;<i class="fa fa-cart-plus"></i>&nbsp;&nbsp;</a></div><div class="col s12 m6 l6 right center" style="padding-bottom: 15px;"><div class="card-action" style="margin-top: 11px;"><p style="direction: rtl;margin: 0px;color: #ffd600;">' + amount_dis + '</p></div></div></div></div>');
        },
        dataType: 'json'
    })
}

function add_to_cart(id) {
    $("#load_add_to_card").fadeIn();
    $.post('shop/add_to_basket', {id: id}, function (msg) {
        if (msg == "ok") {
            var counters = $("#cart-counters").text();
            var counters_side = $("#side_menu_basket").text();
            counters++;
            counters_side++;
            $("#cart-counters").text(counters + "");
            $("#side_menu_basket").text(counters_side + "");
            $("#load_add_to_card").fadeOut();
            toasting("به سبد خریدتان اضافه شد!")
        }
    });
}

function toasting(toast_msg) {
    M.toast({html: toast_msg, 'direction': 'rtl', classes: 'rounded'});
}

document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, options);
});

// Or with jQuery

$(document).ready(function () {
    $('.tooltipped').tooltip();
});


document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
});

// Or with jQuery

$(document).ready(function () {
    $('.modal').modal();
});

$(function () {
    $("#top_tabs > ul > li").click(function () {

        $("#top_tabs > ul > li").removeClass("active_tab");
        $(this).addClass("active_tab");
        $("#tab_contents section").fadeOut(0);
        var index = $(this).index();
        $("#tab_contents section").eq(index).fadeIn();
    })
});

// materila jquery


document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
});

$(document).ready(function () {
    $('.materialboxed').materialbox();
});


(function ($) {
    $(function () {

        $('.sidenav').sidenav();

    }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function () {
    $('.parallax').parallax();
});


// Or with jQuery

$(document).ready(function () {
    $('.slider').slider({
        indicators: false
    });
});


$(function () {


    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });


    $("#checked_all").change(function () {
        checkall();
    });

    $("#add_new_msg").click(function () {
        $("ul.boxing_page li").removeClass("box_deactive");
        $("#mail_menu ul a").removeClass("active_mail_menu");
        $(".write_msg_box").addClass("box_deactive");
    })

})

function checkall() {
    var thats = $("#check_del");
    var check_all_state = $('#checked_all:checkbox:checked').length > 0;
    var check_del = $("input#check_del");
    if (check_all_state) {
        $.each(check_del, function () {
            $(this).prop('checked', true);
        })
    } else {
        $.each(check_del, function () {
            $(this).prop('checked', false);
        })
    }
}
checkall();

function click_mail_menu() {
    $("#mail_menu ul a").click(function () {
        $("#mail_menu ul a").removeClass("active_mail_menu");
        var that = $(this);
        that.addClass("active_mail_menu");
        var aid = that.attr('id');
        $("ul.boxing_page li").removeClass("box_deactive");

        $(".write_msg_box").removeClass("box_deactive");
        switch (aid) {
            case 'recived_page' :
                $(".resived_msggg").addClass('box_deactive');
                break;

            case 'send_box' :
                $(".send_msggg").addClass('box_deactive');
                break;
            case 'drafts_box':
                $(".draft_msggg").addClass('box_deactive');
                break;
            case 'saved_box':
                $(".saved_msggg").addClass('box_deactive');
                break;
            case 'trash_box':
                $(".trash_msggg").addClass('box_deactive');
                break;
        }

    })
}
click_mail_menu();


$(function () {
    $("ul#menu_nav li").click(function () {
        $(this).toggleClass('active-lis');
        $('#back_menu_tar').toggleClass('active-back');
    });

    $("#back_menu_tar").click(function () {
        $(this).removeClass('active-back');
        $("ul#menu_nav li").removeClass('active-lis');

    });
    // $(".nav-wrapper").click(function () {
    //     $("#back_menu_tar").removeClass('active-back');
    //     $("ul#menu_nav li").removeClass('active-lis');
    //
    // })
});


$(function () {
    $("a#view_user_cus_det").click(function(){
        var id = $(this).attr("pro_id");
        $("#modal_ .modal-content table tbody").html('');
        $("#load_add_to_card").fadeIn();
        $("#modal_"+id+" .modal-content table tbody").html('');
        $.ajax({
            type : 'POST',
            url : 'profile/get_cust_pay',
            data : {id:id},
            success : function(msg){
                $("#load_add_to_card").fadeOut();
                $.each(msg,function(i,v){
                    $("#modal_ .modal-content table tbody").append('<tr><td class="center center-align" style="direction:rtl;">'+msg[i]['date']+'</td><td class="center center-align">'+msg[i]["mablag_"]+'</td><td class="center center-align">'+msg[i]['name']+'</td></tr>');
                })
            },
            dataType : 'json'

        })
    })


    $("input[name=profile_imgs_]").on('change',function () {
        var mage = $(this).val();
        var formData = new FormData();
        var files = $(this)[0].files[0];
        formData.append('file',files);
        $.ajax({
            url : 'profile/pro_img_update',
            data : formData,
            type : 'POST',
            contentType : false,
            processData : false,
            success : function (msg) {
                switch (msg)
                {
                    case 'ok':
                        toasting("با موفقیت بروزرسانی شد. کمی صبر کنید لطفا ...");
                        setTimeout(function () {
                            location.reload(true);
                        },1500);
                        break;

                    case 'err':
                        toasting("خطایی رخ داده است ! مجددا تلاش کنید.");
                        break;
                    case 'exist':
                        toasting("قبلا ذخیره شده است ! با مدیریت تماس بگیرید.");
                        break;
                    case 'size':
                        toasting("حجم فایل بیشتر از 100kb میباشد.");
                        break;
                    case 'type':
                        toasting("نوع فایل باید jpg ، jpeg و یا png باشد.");
                        break;
                }
            }
        })
    });


    $("#update_user_data").click(function () {

        var that = "form#form_setting_pro";
        var uni = $("input[name=uni_det]").val();
        var nic = $("input[name=nic_names]").val();
        var f_name = $("input[name=f_name]").val();
        var s_name = $("input[name=s_name]").val();
        var phone = $("input[name=phone]").val();
        var email = $("input[name=email]").val();
        var skills = $("input[name=skills]").val();
        var address = $("input[name=address]").val();
        var ebd = $("input[name=ebd]").val();

        var data = {
            uni: uni,
            nic: nic,
            f_name: f_name,
            s_name: s_name,
            phone: phone,
            email: email,
            skills: skills,
            address: address,
            ebd: ebd
        };
        $("#top_progress").fadeIn(0);

        $.post("profile/update_user_data", data, function (msg) {
            $("#top_progress").fadeOut(0);
            switch (msg) {
                case 'ok':
                    toasting("اطلاعات با موفقیت بروزرسانی شدند!");
                    setTimeout(function () {
                        location.reload(true);
                    }, 1500);
                    break;
                case 'no' :
                    toasting("خطایی رخ داده است");
                    setTimeout(function () {
                        location.reload(true);
                    }, 1500);
                    break;
            }
        });

        // return false;
    });

    $("#update_password").click(function () {
        var par = $(this).closest("form#form_change_pass");
        var url = par.attr('action');
        var old_pass = par.find("input[name=oldest_pass]").val();
        var new_passs = par.find("input[name=new_pass]").val();
        var new_re_pass = par.find("input[name=re_new_pass]").val();
        var pass_data = {old:old_pass,new_pass:new_passs,re_new : new_re_pass};
        // console.log(da);
        $.ajax({
            url: url,
            data: pass_data,
            type: 'POST',
            success: function (msg) {
                switch (msg)
                {
                    case 'empty':
                        toasting("لطفا تمامی فیلدها را پر کنید.");
                        break;
                    case 'no':
                        toasting("خطایی رخ داده است ! مجددا تلاش کنید.");
                        break;
                    case 'ok':
                        toasting("رمز عبور با موفقیت تغییر کرد :)");
                        break;
                    case 'match':
                        toasting("رمز عبور های جدید با هم همخوانی ندارند.");
                        break;
                }
            }
        });
        return false;
    });


    var instance = M.Modal.getInstance("modal1");
    $("#sub_forms_send_mini_pass").click(function () {
       var phone = $("input[name=phone_number_change_pass]").val();
       $.post('login/forget_pass',{phone:phone},function (msg) {
           switch (msg)
           {
               case 'ok':
                   toasting("رمز عبور موقت برای شما ارسال شد.");
                   setTimeout(function () {
                       location.reload(true);
                   },1200);

                   break;
               case 'no':
                   toasting("خطایی رخ داده است ! مجددا تلاش کنید.");
                   break;
               case 'type':
                   toasting("شماره تلفن را به صورت صحیح وارد کنید.");
                   break;
               case 'num':
                   toasting("تعداد دفعات مجاز شما برای انجام این کار در امروز به پایان رسید.");
                   break;
           }
       })
    });

});


// materilize hquery
(function ($) {
    $(function () {

        $('.sidenav').sidenav();

    }); // end of document ready
})(jQuery);

$(document).ready(function () {
    $('.collapsible').collapsible();
    $('.materialboxed').materialbox();
    $('.dropdown-trigger').dropdown();
    $('select').formSelect();
    $('.modal').modal();

});


//
// $('.fixed-action-btn').floatingActionButton({
//     toolbarEnabled: true
// });

// end mateilize jquer
document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
        direction: 'left',
        hoverEnabled: false
    });
});


document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.tap-target');
    var instances = M.TapTarget.init(elems, options);
    instance.next(3);
});


/*    shopping cart jquery    */

$(function () {
    var counts = 1;
    counts = $("input#count_am").val();
    if (counts == '') {
        counts = 1;
    }
    $("input#count_am").keyup(function () {
        var count = $(this).val();
        if (count == '') {
            count = 1;
        }
        var id = $(this).attr('pro_id');
        var par = $(this).closest('table');
        var tot_price = $("tr#" + id + " td span#tot_price", par).text();
        var main_prices = $("tr#" + id + " td span#main_prices", par).text();
        var disco = $("tr#" + id).attr("disco_p");
        var new_tot = ( main_prices - ((main_prices * disco) / 100) ) * count;
        $("tr#" + id + " td span#tot_price", par).text(new_tot);
        check_tot_price(id);
    })
});


//  select top pro

$(function () {
    $("input#check_remember_top").change(function () {
        // var id = $(this).attr("id_p");
        alert("vsdvsd");
    });
});


function del_pro_in_basket(id) {
    $.post('show_cart/del_pro', {id: id}, function (msg) {
        if (msg == "ok") {
            toasting("با موفقیت حذف شد!");
            setTimeout(function () {
                location.reload(true);
            }, 1500)
        } else {
            toasting("در حذف خطایی پیش آمده است. :(")
        }
    })
}


function check_tot_price() {
    var par = $("table#show_cart_data > tbody > tr > td#toto_price");
    var taturial = 0;
    par.each(function (index, val) {
        var toto = $(this).find("span").text();
        taturial += +toto;
    });

    $("#show_pay_amount").text(taturial);


}

/*    end shopping cart   */

/*   shop   jquery  */


$(function () {
    $("ul#show_condition_main li").hover(function () {
        $("p#copy_in_main", this).animate('display', 'block');
        // var test = $("p#copy_in_main").text();
        // alert("vsdv");
    }, function () {
        $("p#copy_in_main").removeClass("active_tit");
    });
});

/*  end shop  */


/*    main setting   */


function add_to_top_m(id) {
    $.post('setting_main/add_top_manager', {id: id}, function (msg) {
        switch (msg) {
            case 'err':
                toasting("برای افزودن مدیر جدید لازم است که یکی از دو مدیر قبلی حذف شود!");
                break;
            case 'ok':
                toasting("با موفقیت به مدیران اضافه شد!");
                location.reload(true);
                break;
            case 'no':
                toasting("خطایی رخ داده است! مجددا تلاش کنید.");
                break;
        }
    })
}
function remove_to_top_m(id) {
    $.post('setting_main/up_top_manager', {id: id}, function (msg) {
        switch (msg) {
            case 'ok':
                toasting("از مدیران یارا حذف شد!");
                location.reload(true);
                break;
            case 'no':
                toasting("خطایی رخ داده است! مجددا تلاش کنید.");
                break;
        }
    })
}

$(function () {


    $("span#delet_com_mod").click(function () {
        var id = $(this).attr('id_p');
        var that = $(this);
        var url = 'setting_main/del_com';
        $(".msg_back_load_" + id).fadeIn(0);

        $.ajax({
            url: url,
            type: 'POST',
            data: {id: id},
            success: function (msg) {
                $(".msg_back_load_" + id).fadeOut(0);
                that.closest("div#par_com_ch").remove();
                toasting("با موفقیت حذف شد!");
            }
        })
    });
    $("span#up_com_mod").click(function () {
        var id = $(this).attr('id_p');
        var that = $(this);
        var url = 'setting_main/up_com';
        $(".msg_back_load_" + id).fadeIn(0);

        $.ajax({
            url: url,
            type: 'POST',
            data: {id: id},
            success: function (msg) {

                $(".msg_back_load_" + id).fadeOut(0);
                if (msg == "ok") {
                    that.find("p#icon_share_main").toggleClass('state_active');
                    toasting("بروزرسانی شد!");
                } else {
                    toasting("در اشتراک مشکلی رخ داده است!");
                }

            }
        })
    });
});


/*   end main set   */


/*     address   main setting   */

$(function () {
    $("#update_shop_address").click(function () {

        var address = $("input[name=company_add]").val();
        var phone = $("input[name=company_phone]").val();
        var email = $("input[name=company_mail]").val();
        var url = "setting_main/up_add";
        $.post(url, {address: address, phone: phone, email: email}, function (msg) {
            if (msg == "ok") {
                toasting("با موفقیت بروزرسانی شد!");
            } else {
                toasting("مشکلی پیش آمده است!دوباره امتحان کنید.")
            }
        })

    })
});

/*     msg send to all users    */

$(function () {
    $(".msg_send_all").click(function () {
        var reciver = $("select[name=msg_all_reciver]").val();
        var level = $("select[name=type_msg_level]").val();
        var text_msg = $("textarea[name=msg_all_text]").val();
        var data = {reciver: reciver, level: level, text_msg: text_msg};
        $.post('setting_main/add_all_msg', data, function (msg) {
            switch(msg)
            {
                case 'ok':
                    toasting("با موفقیت برای مخاطبان ارسال شد !");
                    break;
                case 'no':
                    toasting("در ارسال پیام خطایی رخ داده است !");
                    break;
                case 'empty':
                    toasting("لطفا تمامی فیلد ها را پر کنید !");
                    break;
            }
        })
    })
});


/*     sign up   */


$(function () {
    $("a#sub_forms_sign_up").click(function () {
        var par = $(this).closest('form');
        var name = par.find("input[name=name_u_sign]").val();
        var fame = par.find("input[name=fam_u_sign]").val();
        var melli_code = par.find("input[name=melli_code_sign]").val();
        var phone = par.find("input[name=phone_u_sign]").val();
        var code_phone = par.find("input[name=phone_code_u_sign]").val();
        var pass = par.find("input[name=pass_u_sign]").val();
        var re_pass = par.find("input[name=re_pass_sign]").val();

        var data = {
            name: name,
            fame: fame,
            melli: melli_code,
            phone: phone,
            code_phone: code_phone,
            pass: pass,
            re_pass: re_pass
        };


        $.post('signup/check_sign', data, function (msg) {
            switch (msg) {
                case 'empty' :
                    toasting("لطفا تمامی فیلدها را پر کنید!");
                    break;
                case 'lenght':
                    toasting("پسورد باید بیشتر از 8 کاراکتر باشد!");
                    break;
                case 'match':
                    toasting("پسورد ها با هم یکسان نیستند!");
                    break;
                case 'verify':
                    toasting("کد تایید تلفن را صحیح وارد کنید!");
                    break;
                case 'exist' :
                    toasting('کد ملی یا تلفن شما قبلا ثبت نام شده است!');
                    break;
                case 'ok' :
                    toasting("با موفقیت انجام شد.");
                    window.location.href = "dashboard";
                    break;
            }
        });


        return false;
    });

    $("#sign_check_code_btn").click(function () {
        $("#load_add_to_card").fadeIn();
        var phone = $("input[name=phone_u_sign]").val();
        $.post("signup/check_code", {phone: phone}, function (msg) {
            $("#load_add_to_card").fadeOut();
            $("#ehraz_hov").fadeIn();
            switch (msg) {
                case "err" :
                    toasting("خطایی رخ داده است! مجددا تلاش کنید.");
                    break;
                case 'ok' :
                    toasting("کد فعالسازی برای شما ارسال شد.درصورت عدم دریافت ، پیامک های تبلیغاتی را فعال و مجددا اقدام کنید.");
                    break;
                case 'final':
                    toasting("کد فعال سازی برای شما ارسال شد . برای امروز فقط یک بار دیگر حق ارسال کد را خواهد داشت.");
                    break;
                case 'allow':
                    toasting("تعداد دفعات امتحان شما برای احراز هویت در امروز بیش از حد مجاز است . روز دیگری امتحان کنید .");
                    break;
                case 'type':
                    toasting("شماره تلفن را به صورت صحیح وارد کنید.");
                    break;
                case 'empty':
                    toasting("لطفا ابتدا شماره تلفن را وارد کنید.");
                    break;
            }
        });
    })
});

/**    end signup   **/


/***   exit   panel    */
$(function () {
    $("#exit_panel").click(function () {
        $.post('dashboard/ses_dist', {}, function (msg) {
            if (msg == 'un') {
                window.location.href = "login";
            }
        })
    });
    $("li#exit_panel_mini").click(function () {
        $.post('dashboard/ses_dist', {}, function (msg) {
            if (msg == 'un') {
                window.location.href = "login";
            }
        })
    })
});


//    modir news manager
$(function () {
    $("span#del_news_mm").click(function () {
        var id = $(this).attr("pro_id");
        var paren = $(this);
        $.post('modir_news/del_mm_new',{id:id},function (msg) {
            if ( msg == "ok" )
            {
                paren.closest("div#colse_modir_div_"+id).remove();
                toasting("با موفقیت حذف شد !");
            }else{
                toasting("خطایی رخ داده است !");
            }
        })
    });

    $("a#ok_modir_news_").click(function () {
        var user_id = $(this).attr("pro_id");
        var par_this= $(this);
        var modir_counts = $("span.modir_news_counts").text();
        var par = $(this).closest("div#user_box_newss");
        $.post('modir_news/up_news_view',{id:user_id},function (msg) {
            switch (msg)
            {
                case 'ok':
                    toasting("از شما متشکریم :)!");
                    var new_counts = modir_counts-1;
                    $("span.modir_news_counts").text(new_counts);
                    par.remove();
                    break;
                case 'no':
                    toasting("خطایی پیش آمده است !");
                    break;
            }
        })
    })
});