<!-- Live Stats -->
<div class="row-fluid">

    <!-- Pie: Box -->
    <div class="span12">

        <!-- Pie: Top Bar -->
        <div class="top-bar">
            <h3><i class="icon-eye-open"></i>Кейсы</h3>
        </div>
        <!-- / Pie: Top Bar -->

        <!-- Pie: Content -->
        <div class="well no-padding">

            <table class="data-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Кейс</th>
                    <th>Цена кейса</th>
                    <th>Категория</th>
                    <th>Статус</th>
                    <th></th>
                    <th><a href="/admin/cases">Добавить кейс</a></th>
                </tr>
                </thead>
                <tbody>

                {% for i in case %}
                    <tr>
                        <td>{{ i.id }}</td>
                        <td>{{ i.name }}</td>
                        <td>{{ i.price }}р.</td>
                        <td>  {% if i.type == 1 %} Денежные призы
                            {% elseif i.type == 0 %} Крутые призы
                            {% elseif i.type == 0 %} Цифровые  призы {% endif %}
                        <td>{% if i.status == 1 %} Включён {% else %} Выключен {% endif %}</td>
                        <td><a href="/admin/case/{{ i.id }}">Редактировать</a></td>
                        <td><a href="/admin/case/{{ i.id }}?status=del">Удалить</a></td>
                    </tr>
                {% endfor %}

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Кейс</th>
                    <th>Цена кейса</th>
                    <th>Категория</th>
                    <th>Статус</th>
                    <th></th>
                    <th><a href="/admin/cases">Добавить кейс</a></th>
                </tr>
                </tfoot>
            </table>

        </div>
        <!-- / Pie: Content -->

    </div>
    <!-- / Pie -->

</div>
<!-- / Live Stats -->



