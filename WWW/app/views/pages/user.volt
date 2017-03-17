<div class="inner">
    <div class="account">
        <div class="userbox">
            <div class="l">
                <div class="img"><img src="/{{ user.avatar }}"
                                      alt="{{ user.username }}"><span></span></div>
                <h1>{{ user.username }} <a href="https://vk.com/id{{ user.userid }}" target="_blank"
                                           rel="nofollow"><span
                                class="flaticon-soc-vk"></span></a></h1>
                <div class="u-cases"><span class="flaticon-case"></span> Кейсы: <span
                            class="n">{{ games|length }}</span></div>
                <div class="u-money"><span class="flaticon-money"></span> Выигрыш: <span
                            class="n">{% if user.win is empty %}0{% else %}{{ user.win }}{% endif %}р</span></div>
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
            {% for i in games %}


                <div class="history-case" id="history-case-{{ i.id }}">
                    <div class="status"><span class="flaticon-check"></span></div>
                    <div class="coin silver">
                        <img src="/{{ i.item.image }}" alt="{{ i.item.image }}">
                    </div>
                </div>



            {% endfor %}

            <div class="cls"></div>
            {% if games is empty %} История игр пуста {% endif %}
        </div>
        <div class="cls"></div>
    </div>
    <div class="seperator"></div>
</div>