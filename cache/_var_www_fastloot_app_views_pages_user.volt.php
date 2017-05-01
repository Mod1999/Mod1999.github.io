<div class="inner">
    <div class="account">
        <div class="userbox">
            <div class="l">
                <div class="img"><img src="/<?= $user->avatar ?>"
                                      alt="<?= $user->username ?>"><span></span></div>
                <h1><?= $user->username ?> <a href="https://vk.com/id<?= $user->userid ?>" target="_blank"
                                           rel="nofollow"><span
                                class="flaticon-soc-vk"></span></a></h1>
                <div class="u-cases"><span class="flaticon-case"></span> Кейсы: <span
                            class="n"><?= $this->length($games) ?></span></div>
                <div class="u-money"><span class="flaticon-money"></span> Выигрыш: <span
                            class="n"><?php if (empty($user->win)) { ?>0<?php } else { ?><?= $user->win ?><?php } ?>р</span></div>
            </div>
            <div class="r">
                <a href="/" onclick="Page.Go(this.href); return false;" class="btn rounded darkblue eas"><span
                            class="flaticon-arrow-left"></span> назад к
                    кейсам</a>
            </div>
            <div class="cls"></div>
        </div>
        <div class="cls"></div>
        <div class="history-cases MarginTop-40">
            <?php foreach ($games as $i) { ?>


                <div class="history-case" id="history-case-<?= $i->id ?>">
                    <div class="status"><span class="flaticon-check"></span></div>
                    <div class="coin silver">
                        <img src="/<?= $i->item->image ?>" alt="<?= $i->item->image ?>">
                    </div>
                </div>



            <?php } ?>

            <div class="cls"></div>
            <?php if (empty($games)) { ?> История игр пуста <?php } ?>
        </div>
        <div class="cls"></div>
    </div>
    <div class="seperator"></div>
</div>