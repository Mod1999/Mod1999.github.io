<div class="inner">
    <audio class="audio" id="audio-spin" controls="" preload="auto">
        <source src="/audio/bg.mp3" type="audio/mpeg">
        <source src="/audio/bg.ogg" type="audio/ogg">
    </audio>
    <audio class="audio" id="audio-win" controls="" preload="auto">
        <source src="/audio/win.mp3" type="audio/mpeg">
        <source src="/audio/win.ogg" type="audio/ogg">
    </audio>
    <div class="case-page"><a href="/" onclick="Page.Go(this.href); return false;"
                              class="btn darkblue backtocases"><span class="flaticon-arrow-left"></span> Другие
            кейсы</a>
        <div class="spin-won">
            <h3>Поздравляем!</h3>
            <h5>Вы выиграли <span id="spin-win-name"></span></h5>
            <h4><a href="/account/">Перейдите в аккаунт</a>, чтобы получить приз</h4>
            <div class="icon"><img src="" alt="" id="spin-win-icon"></div>
            <div class="button">
                <input type="button" class="btn rounded blue" value="Выиграть еще" onclick="cleanWinAnimation();">
            </div>
            <div class="c"><a href="/" onclick="Page.Go(this.href); return false;" class="eas">Другие кейсы</a></div>
            <div class="a-1"></div>
            <div class="a-2"></div>
            <div class="a-3"></div>
            <div class="a-4"></div>
        </div>
        <div class="spin">
            <h1>{{ case.name }}</h1>
            {% set maxw = items|length %}
            <div class="desc">Можете выиграть от <b>{{ items[0].price }}р</b> до <b>{{ items[maxw-1].price }}р</b>
                <!--span class="digital">+HAVANBURGER</span-->
            </div>
            <div class="spin-box">
                <div class="spin-line"></div>
                <div class="spin-inner">
                    <div class="roulette">

                        {% for i in items %}

                            <img src="/{{ i.image }}" id="gift-id-{{ i.id }}" alt="{{ i.price }} рублей">

                        {% endfor %}
                    </div>
                </div>
                <div class="cls"></div>
            </div>
            {% if case.price != 0 %}
                <div class="chance">
                <div class="cls"></div>
                <p><input type="checkbox" name="chance" value="{{ tag.round(case.price/10) }}" class="lcs_check"
                          data-lcs="1"/> <b>+10%</b> к шансу</p>
                <p><input type="checkbox" name="chance" value="{{ tag.round(case.price/5) }}" class="lcs_check"
                          data-lcs="2"/> <b>+20%</b> к шансу</p>
                <p><input type="checkbox" name="chance" value="{{ tag.round(case.price/3.33333333333) }}"
                          class="lcs_check" data-lcs="3"/> <b>+30%</b> к шансу</p>
                <div class="cls"></div>
            </div>
            {% endif %}
            <div class="cls"></div>
            <div class="button">
                <script>
                    window.spin_chance = 0;
                    window.spin_amount = {{ case.price }};
                </script>
                <button class="btn blue rounded" onclick="spinbox({{ case.id }}, this, window.spin_count);"> {% if case.price != 0 %}Открыть кейс
                    за <span><b
                                id="spin-amount">{{ case.price }}</b><span class="flaticon-ruble"></span></span>{% else %} Открыть бесплатно {% endif %}
                </button>
            </div>
            <div class="cls"></div>
        </div>
        <div class="cls"></div>
        <div class="you-can-won">
            <h3>Предметы, которые могут вам выпасть из этого кейса</h3>
            <div class="history-cases MarginTop-40">
                {% for i in items %}

                    <div class="history-case">
                        <div class="coin gold">
                            <img src="/{{ i.image }}" alt="{{ i.price }} рублей">
                        </div>
                    </div>

                {% endfor %}


                <div class="cls"></div>
            </div>
            <div class="cls"></div>
        </div>
        <div class="cls"></div>
    </div>
    <style>
        .top-users,
        .sub-header .live {
            -webkit-animation: inherit;
            animation: inherit;
        }
    </style>
</div>
