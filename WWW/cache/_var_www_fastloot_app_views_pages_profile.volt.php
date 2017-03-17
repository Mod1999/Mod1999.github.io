<div class="inner">
    <div class="account">
        <div class="userbox">
            <div class="l">
                <div class="img"><img src="/<?= $u->avatar ?>"
                                      alt="<?= $u->username ?>"><span></span></div>
                <h1><?= $u->username ?> <a href="https://vk.com/id<?= $u->userid ?>" target="_blank" rel="nofollow"><span
                                class="flaticon-soc-vk"></span></a></h1>
                <div class="u-cases"><span class="flaticon-case"></span> Кейсы: <span class="n"><?= $this->length($games) ?></span></div>
                <div class="u-money"><span class="flaticon-money"></span> Выигрыш: <span class="n"><?= $user->win ?>р</span></div>
                <div class="cls"></div>
                <div class="u-balance">Баланс: <span class="n" id="u-balance-field"><?= $u->money ?></span>р</div>
            </div>
            <div class="wdbox">
                <a href="#deposit" onclick="popupOpen('#deposit');return false;" class="btn orange rounded btn-deposit">Пополнить
                    баланс</a>
                <a href="#withdrawal" class="btn darkblue rounded btn-withdrawal"
                   onclick="popupOpen('#withdrawal');return false;">Вывод средств</a>
            </div>
            <div class="logout"><a href="/logout">Выйти</a></div>
            <div class="cls"></div>
        </div>
        <div class="referral">
            <div class="b1">
                <h3><span class="flaticon-users"></span> Пригласи друзей и заработай больше!</h3>
                <div class="desc">Отправь свой уникальный код друзьям<br> и <span>получи 5%</span> от каждого пополнения
                    баланса другом!
                </div>
                <div class="field"><input type="text" class="inp" value="<?= $u->code ?>" readonly="readonly"
                                          onclick="select();"></div>
                <div class="short">По вашему коду зарегистрировались: 0</div>
            </div>
            <div class="b2">
                <div class="loader" id="redeem-loader"><img src="/images/loader.svg" alt="">
                </div>
                <h3><span class="flaticon-money"></span> Введи код и получи 10р!</h3>
                <div class="desc">Введите код в поле и <span>получите 10 рублей</span> прямо сейчас!<br><b>ВНИМАНИЕ:
                        Можно вводить только 1 код и 1 раз.</b></div>
                <div class="field">
                    <input class="inp redeem-input" type="text">
                    <input class="btn" value="OK" onclick="RedeemCode($('.redeem-input'), this, '#redeem-loader');"
                           type="button">
                </div>
                <div class="short">Введите код и нажмите enter</div>
            </div>
            <div class="cls"></div>
        </div>
        <div class="tabs">
            <div class="tab tab-1 eas active" data-tab-id="1">Призы</div>
            <div class="tab tab-2 eas" data-tab-id="2">История</div>
            <div class="tab tab-3 eas" data-tab-id="3">Финансы</div>
            <div class="tab tab-4 eas" data-tab-id="4" onclick="getDeliveryList();">Доставка</div>
        </div>
        <div class="tab-container tab-container-1 active">
            <div class="cls"></div>
            <?php if (empty($games)) { ?>
                <div class="infobox text-center"><br>

                    <h3>
                        <center>Вы не открывали кейсов :(</center>
                    </h3>
                    <a href="/" onclick="Page.Go(this.href); return false;" class="btn rounded blue">Открыть и
                        выиграть</a><br><br></div>

            <?php } else { ?>
                <div class="history-cases">

                    <?php foreach ($games as $i) { ?>


                        <div class="history-case" id="history-case-<?= $i->id ?>">
                            <div class="status"><span class="flaticon-check"></span></div>
                            <div class="coin silver">
                                <img src="/<?= $i->item->image ?>" alt="<?= $i->item->image ?>">
                            </div>
                        </div>



                    <?php } ?>

                    <div class="gift-shipping" id="gift-shipping">
                        <div class="in">
                            <form name="gift-shipping-form">
                                <span class="flaticon-close close" onclick="$('#gift-shipping').fadeOut(100);"></span>
                                <div class="infobox">Информация</div>
                                <div class="loader"><img src="templates/frontend/default/images/loader.svg" alt="">
                                </div>
                                <div class="line">ФИО*</div>
                                <div class="input"><input type="text" name="name" class="inp" value="Киясов Ислам">
                                </div>
                                <div class="cls"></div>
                                <div class="line">Телефон*</div>
                                <div class="input"><input type="text" name="phone" class="inp"></div>
                                <div class="cls"></div>
                                <div class="line">E-mail*</div>
                                <div class="input"><input type="text" name="email" class="inp" value=""></div>
                                <div class="cls"></div>
                                <div class="line">Полный адрес доставки</div>
                                <div class="input"><textarea class="textarea" name="address"
                                                             placeholder="Пример: Россия, Москва, улица Берозово 12, кв. 48"></textarea>
                                </div>
                                <div class="cls"></div>
                                <div class="button"><input type="button" class="btn rounded" value="Отправить"
                                                           onclick="shippingProductGift('gift-shipping-form');"></div>
                                <div class="cls"></div>
                            </form>
                        </div>
                    </div>
                </div>


            <?php } ?>
        </div>
        <div class="tab-container tab-container-2">
            <?php if (empty($games)) { ?>
                <div class="infobox">
                    <div class="text-center">Скоро тут будут ваши миллиарды ;)</div>
                </div>

            <?php } else { ?>


                <table class="table history-money">
                    <thead>
                    <tr>
                        <td width="50">№</td>
                        <td>Описание</td>
                        <td width="150" class="text-center">Сумма</td>
                        <td width="150" class="text-center">Дата</td>
                        <td width="80" class="text-center">Статус</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($games as $i) { ?>

                        <tr>
                            <td><?= $i->id ?></td>
                            <td>Открытие кейса <?= $i->case->name ?>
                            </td>
                            <td class="amount  text-center">+<?= $i->price ?><span
                                        class="flaticon-ruble text-11 text-normal"></span></td>
                            <td class="text-center"><?= $i->created_at ?></td>
                            <td class="text-center"><span class="flaticon-check"></span></td>
                        </tr>

                    <?php } ?>

                    </tbody>
                </table>



            <?php } ?>
        </div>
        <div class="tab-container tab-container-3">
            <div class="infobox">
                <div class="text-center">Скоро тут будут ваши миллиарды ;)</div>
            </div>
        </div>
        <div class="tab-container tab-container-4">
            <div class="loader" id="delivery-loader"><img src="/images/loader.svg" alt="">
            </div>
            <table class="table history-money">
                <thead>
                <tr>
                    <td width="50">№</td>
                    <td width="200">Подарок</td>
                    <td>Информация</td>
                    <td width="150" class="text-center">Дата</td>
                    <td width="80" class="text-center">Статус</td>
                </tr>
                </thead>
            </table>
            <div id="history-shipping"></div>
        </div>
    </div>
    <div class="seperator"></div>
</div>