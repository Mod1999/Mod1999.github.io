
<div class="top-bar">
    <h3>Кейс</h3>

</div>



<div class="well no-padding">

    <!-- Forms: Form -->
    <form method="post" action="/admin/caseedit" class="form-horizontal" enctype="multipart/form-data">


        <!-- Forms: Normal input field -->
        <div class="control-group">
            <label class="control-label" for="inputNormal">Название</label>
            <div class="controls">
                <input type="text" name="name" value="" placeholder="..." class="input-block-level">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputInline">Картинка</label>
            <div class="controls">
                <input type="file" name="image"  class="input-block-level" >
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputInline">Цена</label>
            <div class="controls">
                <input type="text" name="price" value="" placeholder="..." class="input-block-level">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputInline">Позиция</label>
            <div class="controls">
                <input type="text" name="position" value="" placeholder="..." class="input-block-level">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputInline">Банк</label>
            <div class="controls">
                <input type="text" name="banker" value="" placeholder="..." class="input-block-level">
            </div>
        </div>




        <div class="control-group">
            <label class="control-label" for="inputInline">Макс выигрыш[Б]</label>
            <div class="controls">
                <input type="text" name="maxwin" value="" placeholder="..." class="input-block-level">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputInline">Статус</label>
            <div class="controls">
                <select class="span6 m-wrap" name="status">
                    <option value="1" selected>Выкл</option>
                    <option value="0">Вкл</option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputInline">Тип</label>
            <div class="controls">
                <select class="span6 m-wrap" name="type">
                    <option value="1" selected>Денежные призы</option>
                    <option value="0">Крутые призы</option>
                    <option value="0">Цифровые призы</option>
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