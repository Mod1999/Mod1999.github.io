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
                    <th>Цена предмета</th>
                    <th></th>
                    <th><a href="/admin/item">Добавить предмет</a></th>
                </tr>
                </thead>
                <tbody>

                {% for i in items %}
                    <tr>
                        <td>{{ i.id }}</td>
                        <td>{{ i.name }}</td>
                        <td>{{ i.price }}р.</td>
                        <td><a href="/admin/items/{{ i.id }}">Редактировать</a></td>
                        <td><a href="/admin/items/{{ i.id }}?status=del">Удалить</a></td>
                    </tr>
                {% endfor %}

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Кейс</th>
                    <th>Цена предмета</th>
                    <th></th>
                    <th><a href="/admin/item">Добавить предмет</a></th>
                </tr>
                </tfoot>
            </table>

        </div>
        <!-- / Pie: Content -->

    </div>
    <!-- / Pie -->

</div>
<!-- / Live Stats -->



