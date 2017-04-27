var angles = [0, 45, 90, 135, 180, 225, 270, 315];
var angleFinal;

var prizes = {
    0: [0, 'FN SCAR‐H «Убийца зомби» на месяц'],
    1: [1, 'XM8 Compact «Убийца зомби» на месяц'],
    2: [2, 'Glock 18C «Убийца зомби» на месяц'],
    3: [3, 'Тактический топор «Убийца зомби» на месяц'],
    4: [4, 'Steyr Scout «Убийца зомби» на месяц'],
    5: [5, 'Fabarm STF 12 Compact «Убийца зомби» на месяц'],
    6: [6, 'Супер VIP-ускоритель на месяц'],
    7: [7, 'Набор оружия Магма на месяц'],
};

/* show hide item description */
$(document).on({
    mouseenter: function() {
        var thisPos = $(this).attr('class').substr(0, 4);
        var thisText = $(this).find('img').attr('alt');
        var thisImgsrc = $(this).find('img').attr('src');
        $('.js-descr-bg').attr('class', 'bg js-descr-bg');
        $('.js-descr-bg').addClass(thisPos);
        $('.js-descr-txt').find('img').attr('src', thisImgsrc);
        $('.js-descr-txt').find('h4').html(thisText);
        $('.js-descr-bg, .js-descr-txt').fadeIn();
    },
    mouseleave: function() {
        $('.js-descr-bg, .js-descr-txt').hide();
    }
}, ".js-prize");

function showWinpopup() {
    $('.js-wintext').html(prizes[angleFinal][1]);
    $('#winprizeImg').attr('src', 'https://wf.cdn.gmru.net/static/wf.mail.ru/promo/roulette/images/prizes/prize_' + 2 + '_' + (angleFinal+1) + '.png');
    $('.startgame').html('Вы уже получили подарок').addClass('disable');
    $(".startgame").attr('id', '');
    $.get('/index.php?played=1');
    $('.popup_overlay, .popup').fadeIn();
}

/* rotate active */
$(document).ready(function() {
    $(document).on('click', '#startgame', function(event) {
        event.preventDefault();

        angleFinal = Math.floor(Math.random() * 7) + 0;
        $('.rotate').fadeIn();
        $(".rotate").rotate({
            angle: 0,
            animateTo: 1080 + angles[angleFinal],
            duration: 10000,
            easing: $.easing.easeInOut,
            callback: showWinpopup
        });
        $(this).attr('id', '');

    });

    $(document).on('click', '#authenticate', function (event) {
      event.preventDefault();

      $("#auth-model").show();
    });

    $(document).on('click', '.popup_overlay, .close', function(event) {
        event.preventDefault();
        $('.modal, .popup, .popup_overlay, #auth-model').hide();
    });

});