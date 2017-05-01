<div class="top-bar">
    <h3>Предмет</h3>

</div>


<div class="well no-padding">

    <!-- Forms: Form -->
    <form method="post" action="/admin/itemsedit" class="form-horizontal" enctype="multipart/form-data">


        <input name="id" value="<?= $items->id ?>" type="hidden">

        <div class="control-group">
            <label class="control-label" for="inputInline">Кейс</label>
            <div class="controls">
                <select class="span6 m-wrap" name="caseid">
                    <?php foreach ($case as $i) { ?>
                        <option value="<?= $i->id ?>"><?= $i->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        </br></br></br>
        <!-- Forms: Normal input field -->
        <div class="control-group">
            <label class="control-label" for="inputNormal">Цена</label>
            <div class="controls">
                <input type="text" name="price" value="<?= $items->price ?>" placeholder="..." class="input-block-level">
            </div>
        </div>



        </br></br></br>
        <div class="control-group">
            <label class="control-label" for="inputInline">Картинка</label>
            <div class="controls">
                <input type="file" name="image" value="<?= $items->image ?>" class="input-block-level">
            </div>
        </div>

        </br></br></br>
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