<div class="inner">
    <div class="cls"></div>
    <!--div class="contest-home">
        <div class="contest-home-inner">
            <div class="img"><a href="/contest/"><img src="/images/iphone7-preview.png"
                                                      alt="Розыгрыш iPhone 7 Jet Black 128GB"></a></div>
            <div class="desc">
                <h3><a href="/contest/"><span class="flaticon-gift"></span> Розыгрыш iPhone 7 Jet Black 128GB</a></h3>
                Кто тут хотел iPhone 7?&nbsp;Подарим вам от первой волны продаж!
            </div>
            <a href="/contest/" class="btn join rounded"><span class="flaticon-gift"></span> Подробнее</a>
            <div class="cls"></div>
        </div>
    </div-->
    <div class="cls"></div>
    <div class="cases">
        <div class="cls"></div>
        <div class="cases"><h1>Денежные призы</h1>
            <div class="cls"></div>
            <div class="cases-default">
                <?php foreach ($case as $i) { ?>
                    <?php if ($i->type == 1) { ?>
                        <div class="case-default   <?php if ($i->price > 100) { ?> sum-4 <?php } ?>">
                            <div class="inside eas">
                                <h3><a href="/case/<?= $i->id ?>"><?= $i->name ?></a></h3>
                                <div class="paid">выиграли: <?php if (empty($i->mwin)) { ?>0<?php } else { ?><?= $i->mwin ?><?php } ?>
                                    р
                                </div>
                                <div class="price">
                                    <?php if ($i->price == 0) { ?> Бесплатно <?php } else { ?> <?= $i->price ?><span
                                            class="flaticon-ruble"> <?php } ?></span>
                                    <div>стоимость</div>
                                </div>
                                <div class="cls"></div>
                                <div class="img eas"><span><?= $i->maxp ?><p>выигрыш</p></span>
                                    <a href="/case/<?= $i->id ?>"><img src="<?= $i->image ?>"></a>
                                </div>
                                <div class="cls"></div>
                                <div class="contain">
                                    Можете выиграть
                                    <div>от <s><?= $i->minp ?><span class="flaticon-ruble"></span></s> до <s><?= $i->maxp ?>
                                            <span
                                                    class="flaticon-ruble"></span></s></div>
                                </div>
                                <a href="/case/<?= $i->id ?>" onclick="Page.Go(this.href); return false;" class="btn eas">Подробнее</a>
                                <div class="cls"></div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="cls"></div>
            </div>
            <div class="cls"></div>
            <h3>Крутые призы</h3>
            <div class="cls"></div>
            <div class="cases-boombastic">


                <?php foreach ($case as $i) { ?>

                    <?php if ($i->type == 2) { ?>
                        <div class="case-boombastic">
                            <div class="inside eas">
                                <div class="img eas"><img src="/<?= $i->image ?>"
                                                          alt="<?= $i->name ?>" class="eas">
                                </div>
                                <h3><a href="/case/<?= $i->id ?>"
                                       onclick="Page.Go(this.href); return false;"><?= $i->name ?></a></h3>
                                <div class="cls"></div>
                                <div class="contain">
                                    Можете выиграть
                                    <div>от <s><?= $i->minp ?><span class="flaticon-ruble"></span></s> до <s><?= $i->maxp ?>
                                            <span
                                                    class="flaticon-ruble"></span></s></div>
                                </div>
                                <a href="/case/<?= $i->id ?>" onclick="Page.Go(this.href); return false;" class="btn eas">Подробнее</a>
                                <div class="cls"></div>
                            </div>
                        </div>

                    <?php } ?>
                <?php } ?>


            </div>
            <div class="cls"></div>
            <h3 class="MarginTop-30">Цифровые призы</h3>
            <div class="cls"></div>
            <div class="cases-digital">

                <?php foreach ($case as $i) { ?>

                    <?php if ($i->type == 3) { ?>
                        <div class="case-digital">
                            <div class="inside eas">
                                <h3><a href="/case/<?= $i->id ?>" onclick="Page.Go(this.href); return false;">Кейс
                                        «PlayMarket 1000р»</a></h3>
                                <div class="cls"></div>
                                <div class="img eas"><a href="/case/<?= $i->id ?>"
                                                        onclick="Page.Go(this.href); return false;"><img
                                                src="/<?= $i->image ?>" alt="<?= $i->name ?>"
                                                class="eas"></a></div>
                                <div class="cls"></div>
                                <div class="contain">
                                    Можете выиграть
                                    <div>от <s><?= $i->minp ?><span class="flaticon-ruble"></span></s> до <s><?= $i->maxp ?>
                                            <span
                                                    class="flaticon-ruble"></span></s></div>
                                </div>
                                <a href="/case/<?= $i->id ?>" onclick="Page.Go(this.href); return false;"
                                   class="btn eas"><span class="flaticon-arrow-right"></span></a>
                                <div class="cls"></div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="cls"></div>
            </div>
            <div class="cls"></div>
        </div>
        <div class="cls"></div>
    </div>
</div>
<div class="top-users">
    <div class="inner">
        <h3>Самые везучие</h3>
        <div class="cls"></div>
        <div class="top-10">
        <?php foreach ($top as $i) { ?>


            <span class="user"><a href="/user/<?= $i->userid ?>"  onclick="Page.Go(this.href); return false;" class="eas">
                    <img src="/<?= $i->avatar ?>" alt="<?= $i->username ?>"></a>
                <span class="s-cases"><span class="flaticon-case"></span> <?= $i->games ?></span>
      <span class="s-money"><span class="flaticon-money"></span> <?= $i->top_value ?>р</span>
      </span>

        <?php } ?>
            </div>
        <div class="cls"></div>
    </div>
</div>