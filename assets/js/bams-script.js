/*!
 * Bambang setyawan
 * Copyright 2017 www.bambangsetyawan.com
 * Licensed  GPL
 */

(function ($) {

    var domain = document.location.href;

    function moving_logo_left() {
        $("#logo").animate({right: "-=900"}, 10000, "swing", moving_logo_right);
    }

    function moving_logo_right() {
        $("#logo").animate({right: "+=900"}, 10000, "swing", moving_logo_left);
    }

    moving_logo_left();

    $(document).on('click', '.wa_chat', function () {
        var chat = $(this).siblings('.wa_car_value').val();
        var mobil = 'rentcarindo mobil: ' + $(this).attr("data-title") + ', ';
        var wa_api = 'https://api.whatsapp.com/send?phone=6281933116787&text=' + mobil + chat;
        window.open(wa_api, 'Chat with Rentcarindo', 'width=500, height=400, left=24, top=24, scrollbars, resizable');
    });

    $(document).on('click', '.booking-mobil', function () {
        var wa_api = 'https://api.whatsapp.com/send?phone=6281933116787&text=Halo rentcarindo.com, pesan:' + $('.data-mobil').val() +
            ', Start: ' + $('.data-start').val() + ' ' + $('.jam-start').val() + ', Finish: ' + $('.data-finish').val() + ' ' + $('.jam-finish').val() + ', lokasi antar: ' + $('.data-antar').val();
        window.open(wa_api, 'Booking mobil dengan Rentcarindo', 'width=500, height=400, left=24, top=24, scrollbars, resizable');
    });

    $.fn.datepicker.dates['id'] = {
        days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
        daysShort: ["Mgu", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
        daysMin: ["Mg", "Sn", "Sl", "Ra", "Ka", "Ju", "Sa"],
        months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
        today: "Hari Ini",
        clear: "Kosongkan",
        format: "dd/mm/yyyy",
        titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
        weekStart: 0
    };

    var form_jumbotron = "<form class=\"form-row form-booking-mobil\">\n" +
        "<div class=\"form-group col-md-2\"><label class=\"col-form-label\">Pilih mobil: </label>\n" +
        "<select class=\"custom-select data-mobil\">\n" +
        "</select></div>\n" +
        "<div class=\"form-group col-md-3\"><label class=\"col-form-label\">Start rentcar: </label>" +
        "<div class=\"input-group\"><input class=\"form-control datepicker data-start\" type=\"text\" placeholder=\"mulai rentcar\" />" +
        "<select class=\"custom-select jam jam-start\">\n" +
        "<option selected=\"selected\">jam</option>\n" +
        "</select></div>\n" +
        "</div>\n" +
        "<div class=\"form-group col-md-3\">\n" +
        "\n" +
        "<label class=\"col-form-label\">Finish rentcar: </label>\n" +
        "<div class=\"input-group\"><input class=\"form-control datepicker data-finish\" type=\"text\" placeholder=\"selesai rentcar\" />\n" +
        "<select class=\"custom-select jam jam-finish\">\n" +
        "<option selected=\"selected\">jam</option>\n" +
        "</select></div>\n" +
        "</div>\n" +
        "<div class=\"form-group col-md-4\"><label class=\"col-form-label data-lokasi\">lokasi pengantaran: </label>\n" +
        "<select class=\"custom-select \">\n" +
        "<option selected=\"bandara ngurah rai\">bandara ngurah rai</option>\n" +
        "</select></div>\n" +
        "</div>\n" +
        "<div class=\"form col-md-12 text-center \"> <a class=\"btn btn-lg btn-primary booking-mobil\" href=\"#\"> Kirim </a> </div>\n" +
        "</form>";

    $('.jumbotron').append(form_jumbotron);

    $.ajax({
        url: ajaxmobil.ajaxurl,
        type: 'post',
        data: {
            action: 'ajax_mobil',
            cat: 59
        },
        error: function () {
            ( $('.data-mobil').append(' <option value="Agya matic">Agya matic</option>'))
        },
        success: function (data) {
                $('.data-mobil').append(data);
        }
    });

    function leftPad(number, targetLength) {
        var output = number + '';
        while (output.length < targetLength) {
            output = '0' + output;
        }
        return output;
    }

    function datajam() {
        for (i = 0; i < 25; i++) {
            timeValue = leftPad(i, 2) + '.00';
            $('.jam').append('<option value="' + timeValue + ' ">' + timeValue + '</option>');
        }
    }

    datajam();

    $('.datepicker').datepicker({
        language: 'id'
    });

    $(document).on('click', '.load-mobil', function (event) {
        event.preventDefault();
        var cat_id = parseInt($(this).data("cat"));
        var max_num_pages = parseInt($(this).attr("data-max-num-pages"));
        var current_page = parseInt($(this).attr("data-current"));
        var page = current_page + 1;
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination',
                page: page,
                cat: cat_id
            },
            beforeSend: function (xhr) {
                $('.load-mobil').append(
                    '  <div class="progress">\n' +
                    '  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>\n' +
                    '</div>')
            },
            error: function () {
                $('.load-mobil').append("<div class=\"progress\"> maaf unit mobil rentcar kami yg lainnya sudah ter booking </div>")
            },

            success: function (data) {
                var div_to_append = '.content' + cat_id;
                var button = '#button' + cat_id;
                $( button).attr('data-current', page); //set current page after xhr succes
                var current_page = parseInt($(button).attr("data-current")); //check current page after xhr succes
                if (data) {
                    $(div_to_append).append(data);
                    $('.progress').remove();
                    if(  current_page  ===  max_num_pages ){  //compare current page
                        $( button).remove();
                    }
                }
            }

        })
    })

})(jQuery);

//jarallax

$('.jarallax').jarallax({
    speed: 0.2
})