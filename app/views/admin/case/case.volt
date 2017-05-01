
<div class="top-bar">
    <h3>Кейс</h3>

</div>



<div class="well no-padding">

    <!-- Forms: Form -->
    <form method="post" action="/admin/caseedit" class="form-horizontal" enctype="multipart/form-data">

        <input name="id" value="{{ case.id }}" type="hidden">

        <!-- Forms: Normal input field -->
        <div class="control-group">
            <label class="control-label" for="inputNormal">Название</label>
            <div class="controls">
                <input type="text" name="name" value="{{ case.name }}" placeholder="..." class="input-block-level">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputInline">Картинка</label>
            <div class="controls">
                <input type="file" name="image" value="{{ case.image }}"  class="input-block-level" >
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputInline">Цена</label>
            <div class="controls">
                <input type="text" name="price" value="{{ case.price }}" placeholder="..." class="input-block-level">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputInline">Позиция</label>
            <div class="controls">
                <input type="text" name="position" value="{{ case.position }}" placeholder="..." class="input-block-level">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputInline">Банк</label>
            <div class="controls">
                <input type="text" name="banker" value="{{ case.banker }}" placeholder="..." class="input-block-level">
            </div>
        </div>



        <div class="control-group">
            <label class="control-label" for="inputInline">Макс выигрыш[Б]</label>
            <div class="controls">
                <input type="text" name="maxwin" value="{{ case.maxwin }}" placeholder="..." class="input-block-level">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputInline">Статус</label>
            <div class="controls">
                <select class="span6 m-wrap" name="status">
                    <option value="1" {% if case.status == 1 %} selected {% endif %}>Выкл</option>
                    <option value="0" {% if case.status == 0 %} selected {% endif %}>Вкл</option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputInline">Тип</label>
            <div class="controls">
                <select class="span6 m-wrap" name="type">
                    <option value="1" {% if case.type == 1 %} selected {% endif %}>Денежные призы</option>
                    <option value="2" {% if case.type == 2 %} selected {% endif %}>Крутые призы</option>
                    <option value="3" {% if case.type == 3 %} selected {% endif %}>Цифровые  призы</option>
                </select>
            </div>
        </div>

        <!-- Forms: Form Actions -->
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Сохранить</button>

        </div>
        <!-- / Forms: Form Actions -->

    </form>
    <!-- / Forms: Form -->


    <!-- / Add News: WYSIWYG Edior -->

</div>
<!-- / Add News: Content -->




</div>

</div>