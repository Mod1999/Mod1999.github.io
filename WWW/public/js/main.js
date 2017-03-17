/* *
 *  Coder : Wild [kudo070]
 *  skype : kudo070
 *  vk.com/kudo070
 *  islam7450@yandex.ru
 * */
var socket = io.connect(':7777', {secure: true});
socket.on('new.winner', function (data) {
    data = JSON.parse(data);
    console.log(data);
    var lastWinners = $('#live-prize-box')
    var el = $(' <div class="b"><div class="winner-box eas"><div class="winner eas"><a onclick="Page.Go(this.href); return false;" href="/user/' + data.userid + '">' +
        '<img src="/' + data.avatar + '" alt="' + data.image + '"></a></div></div>' +
        '<img src="/' + data.image + '" alt="150"></div>')

    function getRandomArbitary(min, max) {
        return Math.random() * (max - min) + min;
    }

    var tmr = 0;
    if ('/user/' + data.userid == $('.header .u-menu .userpic a:first').attr('href')) {
        var tmr = 10000;
    }
    setTimeout(function () {
        el.hide().addClass('item' + data.id);
        lastWinners.prepend(el)
        el.fadeIn(1000)
        lastWinners.find("div:nth-of-type(19)").remove();
    }, tmr)

})
function popupClose(id) {
    $(id + " .popup-container").animate({top: "60%"}, 500, function () {
        $(id).fadeOut(500);
        $(id + " .popup-container").animate({top: "-300%"}, 500, function () {
        });
    });
}
function popupOpen(id) {
    $(id + " .popup-container").css("top", "200%");
    $(id).fadeIn(300);
    $(id + " .popup-container").animate({top: "40%"}, 500, function () {
        $(".popup-container").animate({top: "50%"}, 500, function () {
        });
    });
}
function changePaymentMethod(pm, holder) {
    $(".payment-method").removeClass("active");
    $(".pm-" + pm).addClass("active");
    $("#form-deposit").prop("action", "/payment/" + pm + "/go/");
    $("#withdrawal-type-field").val(pm);
    if (holder != undefined) {
        document.getElementsByClassName('PurseHolder')[0].placeholder = holder;
    }
}
function depositNow() {
    $("#form-deposit").submit();
}
window.onload = function () {
    window.setTimeout(function () {
            window.addEventListener('popstate', function (e) {
                    //   e.preventDefault();
                    if (e.state && e.state.link) Page.Go(e.state.link, {no_change_link: 1});
                },
                false);
        },
        1);
}
var Page = {
    Go: function (h, params) {

        if (!params) params = {};
        if (!params.no_change_link && h != location.href) history.pushState({link: h}, null, h);

        $.post(h, function (data) {
            $('main.content').html(data);
            reset();
        });
    }
}
function reset() {
    $(document).ready(function () {
        if (($(".cases-boombastic").length > 0)) {
            $(".cases-boombastic").owlCarousel({
                items: 3,
                itemsDesktop: [1180, 2],
                itemsDesktopSmall: [720, 1],
                itemsTablet: [720, 1],
                itemsMobile: false,
                autoPlay: 5000,
                stopOnHover: true,
                pagination: false,
                navigation: true,
                navigationText: ["<span class='flaticon-arrow-left'></div>", "<span class='flaticon-arrow-right'></div>"]
            });
        }
        if (($(".lcs_check").length > 0)) {
            $('.lcs_check').lc_switch();
            $('body').delegate('.lcs_check', 'lcs-statuschange', function () {
                var status = ($(this).is(':checked')) ? 'checked' : 'unchecked';
                var value = ($(this).is(':checked')) ? $(this).data('lcs') : 0;
                var visual_value = ($(this).is(':checked')) ? $(this).val() : 0;
                if (status == 'checked') {
                    spin_chance = value;
                    $(".lcs_check").lcs_off();
                }
                window.spin_chance = value;
                var total = parseInt(visual_value) + parseInt(window.spin_amount);
                $("#spin-amount").text(total);
            });
        }
        $(".tab").click(function () {
            var tabId = $(this).data("tab-id");
            $(".tab-container").fadeOut(0);
            $(".tab-container-" + tabId).fadeIn(500);
            $(".tab").removeClass("active");
            $(".tab-" + tabId).addClass("active");
        });
    });
}
$(document).ready(function () {

    reset();
    $(".nav-button").click(function () {
        var status = $(".nav ul").css("display");
        if (status == 'none') {
            $(".nav ul").fadeIn(0);
        }
        else {
            $(".nav ul").fadeOut(100);
        }
    });
});
function getDeliveryList() {
    var loader = $("#delivery-loader");
    loader.fadeIn(0);
    $.post("?page_load=ajax&url=/ajax/getDeliveryList.ajax", '&limit=10', function (data) {
        data = JSON.parse(data);
        var table = '';
        if (data['status'] == 1) {
            var data_tmp = data['data'];
            $.each(data_tmp, function (i) {
                var d = data_tmp[i];
                if (d != undefined) {
                    if (d['status'] == 0) {
                        d['status'] = '<span class="flaticon-wait"></span>';
                    }
                    else if (d['status'] == 1) {
                        d['status'] = '<span class="flaticon-check"></span>';
                    }
                    else if (d['status'] == 2) {
                        d['status'] = '<span class="flaticon-close"></span>';
                    }
                    table += '<tr>' + '<td width="50">' + d['ID'] + '</td>' + '<td class="gift-shipping-photo" width="200"><img src="/uploads/cases/' + d['gift_photo'] + '"><br>' + d['gift_name'] + '</td>' + '<td class="gift-shipping-row">' + '<b>' + d['name'] + '</b><br>' + d['address'] + '<br>' +
                        d['phone'] + ', ' + d['email'] + d['text'] + '</td>' + '<td width="150" class="text-center">' + d['date'] + '</td>' + '<td width="80" class="text-center">' + d['status'] + '</td>' + '</tr>';
                }
            });
            $("#history-shipping").html('<table class="table history-money">' + table + '</table>');
        }
        else {
            $("#history-shipping").html(data['data']);
        }
        loader.fadeOut(300);
    });
}
function winAnimation(type) {
    if (type == 1) {
        $(".spin-won h4").fadeOut(0);
    }
    else {
        $(".spin-won h4").fadeIn(0);
    }
    $("#audio-spin").animate({volume: 0.0}, 300, function () {
        $("#audio-spin").trigger('stop');
        $("#audio-win").trigger('play');
        $("#audio-win").animate({volume: 1.0}, 1000);
    });
    $(".spin-won").fadeIn(300);
    $(".you-can-won").fadeOut(0);
    $(".case-page-title").fadeOut(0);
}
function cleanWinAnimation() {
    var audioWin = document.getElementById("audio-win");
    audioWin.currentTime = 0;
    audioWin.pause();
    var audioSpin = document.getElementById("audio-spin");
    audioSpin.currentTime = 0;
    audioSpin.pause();
    $(".spin-won").fadeOut(300);
    $(".you-can-won").fadeIn(300);
    $(".case-page-title").fadeIn(300);
}
var roundOptions = new Array;
var rouletteObject = new Array;
function spinbox(gameId, button, count) {
    var gameButton = $(button);
    var gamePrice = parseFloat($("#spin-amount").text());
    var gameButtonText = $(button).html();
    var gameLoader = $("#game-" + gameId + " .loading");
    var otherButtons = $(".three .btn");
    var gameChance = window.spin_chance;
    gameButton.text("Открываем кейс...");
    gameButton.attr("disabled", "disabled");
    $("#audio-win").animate({volume: 0.0}, 0);
    $("#audio-spin").animate({volume: 0.0}, 0);
    $.post('/play',{gameId : gameId,chance :gameChance}, function (data) {
        var resultData = JSON.parse(data);
        var showResult = resultData.data;
        if (resultData.status == 1) {
            var giftImg = 0;
            $.each($('.roulette img'), function () {
                var g = parseInt($(this).attr("id").split('gift-id-')[1]);
                giftImg++;
                if (g == showResult['gift']) {
                    showResult.result = giftImg - 1;
                }
            });
            roundOptions[gameId] = {
                speed: 30,
                duration: 1,
                stopImageNumber: showResult.result,
                startCallback: function () {
                    UpdateBalance(-1 * gamePrice);
                },
                stopCallback: function () {
                    var startNewGame = setTimeout(function () {
                        gameButton.html(gameButtonText);
                        gameButton.removeAttr("disabled");
                        UpdateBalance(showResult['win_sum']);
                        $("#spin-win-name").html(showResult['text']);
                        $("#spin-win-icon").attr("src", "/" + showResult['photo']);
                        winAnimation(showResult['type']);
                        window.socket.emit('last gift set', {data: 'new'});
                    }, 1000);
                }
            }
            if (rouletteObject[gameId] == undefined || rouletteObject[gameId] == 'undefined') {
                rouletteObject[gameId] = $(".roulette").roulette(roundOptions[gameId]);
            }
            else {
                rouletteObject[gameId].roulette('option', roundOptions[gameId]);
            }
            rouletteObject[gameId].roulette('start');
            $("#audio-spin").trigger('play');
            $("#audio-spin").animate({volume: 1.0}, 2000);
        }
        else {
            smoke.alert(resultData.error);
            gameButton.html(gameButtonText);
            gameButton.removeAttr("disabled");
        }
    });
}

function UpdateBalance(sum) {
    $("#user-balance").text(parseFloat($("#user-balance").text()) + parseFloat(sum));
    if (($("#u-balance-field").length > 0)) {
        $("#u-balance-field").text(parseFloat($("#u-balance-field").text()) + parseFloat(sum));
    }
    if (($("#user-balance-mobile").length > 0)) {
        $("#user-balance-mobile").text(parseFloat($("#user-balance-mobile").text()) + parseFloat(sum));
    }
}
function NewBalance(sum) {
    $("#user-balance").text(parseFloat(sum));
    if (($("#u-balance-field").length > 0)) {
        $("#u-balance-field").text(parseFloat(sum));
    }
}