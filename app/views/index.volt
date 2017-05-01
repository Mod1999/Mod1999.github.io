<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title>4CASH - Поднимаем настроение</title>
    <meta name="description" content="4CASH - Поднимаем настроение"/>
    <meta name="keywords" content="открытие кейсов,призовые кейсы,дропы,кейсы,4cash,4cash.ru"/>
    {{ stylesheet_link("css/style.min.css") }}
    {{ javascript_include("js/jquery.min.js") }}
    {{ javascript_include("js/core.js") }}
    {{ javascript_include("js/main.js") }}
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="inner">
            <div class="logo"><a href="/" onclick="Page.Go(this.href); return false;"><img src="/images/logo@2x.png"
                                                                                           alt="4Cash"></a>
            </div>
            <div class="stat">
                <div class="o">Онлайн
                    <div id="st-online">-</div>
                </div>
                <div class="l"></div>
                <div class="o">Пользователей
                    <div id="st-users">-</div>
                </div>
                <div class="l"></div>
                <div class="o">Открыто кейсов
                    <div id="st-cases">-</div>
                </div>
                <div class="cls"></div>
            </div>
            <div class="u-menu">
                {% if u  is defined %}

                    <div class="u-menu">
                        <div class="userpic"><a onclick="Page.Go(this.href); return false;" href="/user/{{ u.userid }}"><img
                                        src="/{{ u.avatar }}" alt="{{ u.username }}"></a>
                        </div>
                        <div class="balance-mobile"><span id="user-balance-mobile">0</span><span
                                    class="flaticon-ruble ruble"></span></div>
                        <div class="userinfo">
                            <div class="name"><a onclick="Page.Go(this.href); return false;" href="/user/{{ u.userid }}"
                                                 class="eas">Мой аккаунт</a>
                            </div>
                            <div class="price"><span class="flaticon-money"></span> <b
                                        id="user-balance">{{ u.money }}</b><span
                                        class="flaticon-ruble ruble-small"></span> <span class="plus eas"
                                                                                         onclick="popupOpen('#deposit');">+</span>
                                <span class="minus eas" onclick="popupOpen('#withdrawal');">-</span></div>
                        </div>
                    </div>


                {% else %}

                    <ul class="social-login" id="uLogin"
                        data-ulogin="display=buttons;fields=first_name,last_name;optional=photo_big,bdate,sex;providers=vkontakte;hidden=;redirect_uri=https%3A%2F%2F4cash.ru%2F">
                        <a href="/login">
                            <li class="btn rounded gradient-orange icon-r flaticon-vk" data-uloginbutton="vkontakte"><b>Войти
                                    через</b> <span class="flaticon-soc-vk"></span></li>
                        </a>
                    </ul>
                    <div class="cls"></div>
                {% endif %}
            </div>
            <nav class="nav">
                <div class="nav-button"><span class="flaticon-menu"></span></div>
                <ul>
                    <li><a href="/" onclick="Page.Go(this.href); return false;" class="eas ">Кейсы</a></li>
                    <!--li><a href="/hourly" onclick="Page.Go(this.href); return false;" class="bonus eas ">Бонус</a></li-->
                    <li><a href="/faq" onclick="Page.Go(this.href); return false;" class="eas ">FAQ</a></li>
                    <li><a href="/reviews" onclick="Page.Go(this.href); return false;" class="eas ">Отзывы</a></li>
                </ul>
            </nav>
            <div class="cls"></div>
        </div>
    </header>
    <div class="cls"></div>
    <div class="sub-header">
        <div class="inner">
            <div class="live">
                <div class="name">Live призы</div>
                <div class="prize" id="live-prize-box">
                    {% for i in winners %}

                        <div class="b">
                            <div class="winner-box eas">
                                <div class="winner eas"><a onclick="Page.Go(this.href); return false;"
                                                           href="/user/{{ i.user.userid }}">
                                        '<img src="/{{ i.user.avatar }}" alt="'{{ i.user.avatar }}"></a></div>
                            </div>
                            <img src="/{{ i.item.image }}" alt="150"></div>

                    {% endfor %}
                </div>
                <div class="cls"></div>
            </div>
            <div class="cls"></div>
        </div>
    </div>
    <main class="content">
        {{ content() }}
    </main>

    <footer class="footer">
        <div class="inner">
            <div class="l">
                <ul>
                    <li><a href="/" onclick="Page.Go(this.href); return false;" class="eas ">Кейсы</a></li>
                    <li><a href="/faq" onclick="Page.Go(this.href); return false;" class="eas ">FAQ</a></li>
                    <li><a href="/guarantees" onclick="Page.Go(this.href); return false;" class="eas ">Гарантии</a></li>
                    <li><a href="/reviews" onclick="Page.Go(this.href); return false;" class="eas ">Отзывы</a></li>
                    <li><a href="/support" onclick="Page.Go(this.href); return false;" class="eas ">Техническая
                            поддержка</a></li>
                </ul>
                <div class="copy">
                    Copyright © 2016 4cash.ru. Все права защищены.<br>Авторизуясь на сайте вы принимаете <a
                            href="/terms">пользовательское соглашение</a><br>
                </div>
            </div>
            <div class="r">
                <h5>Принимаем</h5>
                <div class="cls"></div>
                <div class="img"><img src="/images/payment-methods.png"
                                      alt="Принимаем"></div>
                <div class="cls"></div>
            </div>
            <div class="cls"></div>
        </div>
    </footer>
</div>
<div id="deposit" class="popup" style="display: none;">
    <div class="popup-container" style="top: 50%;">
        <div class="eas close" onclick="popupClose('#deposit');"><span class="flaticon-close"></span></div>
        <h3>Пополнить баланс</h3>
        <div class="info"><b>Если нужного платежного сервиса нет в списке выберите Interkassa</b></div>
        <h4>Сумма</h4>
        <div class="cls"></div>
        <div class="amount-l">
            <form name="form-deposit" id="form-deposit" method="post" action="/webmoney/go/">
                <input type="text" name="amount" class="inp" maxlength="5" value="100"
                       onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"
                       onchange="if (this.value < 10) this.value=10; if (this.value > 15000) this.value=15000">
            </form>
        </div>
        <div class="amount-r">
            Максимальная сумма за раз: <b>15000р</b><br>Минимальная сумма: <b>10р</b>
        </div>
        <div class="cls"></div>
        <h4>Выберите платежную систему</h4>
        <div class="cls"></div>
        <span class="payment-method eas pm-yandex" onclick="changePaymentMethod('yandex');"><img
                    src="/images/payment-yandex.svg" alt="Яндекс Деньги"><span
                    class="flaticon-check"></span></span><span class="payment-method eas pm-qiwi"
                                                               onclick="changePaymentMethod('qiwi');"><img
                    src="/images/payment-qiwi.svg" alt="Interkassa (QIWI)"><span
                    class="flaticon-check"></span></span><span
                class="payment-method eas pm-interkassabeeline" onclick="changePaymentMethod('interkassabeeline');"><img
                    src="/images/payment-beeline.svg" alt="Beeline (Interkassa)"><span
                    class="flaticon-check"></span></span><span class="payment-method eas pm-interkassamts"
                                                               onclick="changePaymentMethod('interkassamts');"><img
                    src="/images/payment-mts.svg" alt="Beeline (MTS)"><span
                    class="flaticon-check"></span></span><span class="payment-method eas pm-interkassamegafon"
                                                               onclick="changePaymentMethod('interkassamegafon');"><img
                    src="/images/payment-megafon.svg" alt="Beeline (Megafon)"><span
                    class="flaticon-check"></span></span><span class="payment-method eas pm-interkassa"
                                                               onclick="changePaymentMethod('interkassa');"><img
                    src="/images/payment-interkassa.svg" alt="Interkassa"><span
                    class="flaticon-check"></span></span>
        <div class="cls"></div>
        <div class="foo"><input type="button" class="btn orange rounded" value="Пополнить баланс"
                                onclick="depositNow();"></div>
    </div>
    <div class="popup-overlay" onclick="popupClose('#deposit');"></div>
</div>
<div id="withdrawal" class="popup" style="display: none;">
    <div class="popup-container" style="top: 50%;">
        <form name="form-withdrawal" id="form-withdrawal" method="post">
            <div class="loader"><img src="images/loader.svg" alt=""></div>
            <div class="eas close" onclick="popupClose('#withdrawal');"><span class="flaticon-close"></span></div>
            <h3>Вывод средств</h3>
            <div class="info">Обработка вывода обычно осуществляется в течении часа.<br>В некоторых случаях платеж может
                быть обработан до 24 часов.<br>Минимальная сумма к выводу <b>100р</b></div>
            <div class="cls"></div>
            <div class="amount-l">
                <h4>Сумма</h4>
                <input type="text" name="amount" class="inp" maxlength="5" value="100"
                       onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"
                       onchange="if (this.value < 100) this.value=100">
                <input type="hidden" name="type" id="withdrawal-type-field" value="webmoney">
            </div>
            <div class="amount-r amount-r2">
                <h4>Номер кошелька</h4>
                <input type="text" name="purse" class="inp PurseHolder" maxlength="16"
                       placeholder="Пример: R23884920195">
            </div>
            <div class="cls"></div>
            <h4>Куда хотите вывести?</h4>
            <div class="cls"></div>
            <span class="payment-method eas pm-yandex"
                  onclick="changePaymentMethod('yandex','Пример: 41003592336109');"><img
                        src="/images/payment-yandex.svg" alt="Яндекс Деньги"><span class="flaticon-check"></span></span><span
                    class="payment-method eas pm-qiwi" onclick="changePaymentMethod('qiwi','Пример: 7900123456');"><img
                        src="/images/payment-qiwi.svg" alt="QIWI"><span class="flaticon-check"></span></span>
            <div class="cls"></div>
            <div class="foo foo-2"><input type="button" class="btn blue rounded" value="Вывести средства"
                                          onclick="withdrawalNow();"></div>
        </form>
    </div>
    <div class="popup-overlay" onclick="popupClose('#withdrawal');"></div>
</div>

</body>
</html>
