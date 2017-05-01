<h1><p class="lead pull-left">Категории</p></h1>
<? echo anchor('admin/categories/edit','<i class="glyphicon glyphicon-plus"></i> Добавить категорию',array('class'=>'pull-right btn btn-small btn-primary')); ?>
<div class="clearfix"></div>
<table style="width:100%;" class="table tblsort table-hover table-bordered">
		<thead>
			<th>ID</th>
			<th>Порядок</th>
			<th>Название</th>
			<th>Редактировать</th>
			<th>Удалить</th>
		</thead>
	<tbody>
<? if(count($categories)): 
	foreach($categories as $category): ?>
		<tr id="item-<? echo $category->id; ?>">
			<td><center><a style="color: #000;text-decoration: none;" href="/admin/categories/edit/<? echo $category->id; ?>"><? echo $category->id; ?></a></center></td>
			<td><center><a style="color: #000;text-decoration: none;" href="/admin/categories/edit/<? echo $category->id; ?>"><? echo $category->sort; ?></a></center></td>
			<td><center><a style="color: #000;text-decoration: none;" href="/admin/categories/edit/<? echo $category->id; ?>"><? echo $category->title; ?></a></center></td>
			<td><center><? echo btn_edit('admin/categories/edit/'.$category->id); ?></center></td>
			<td><center><? echo btn_delete('admin/categories/delete/'.$category->id); ?></center></td>
		</tr>
	<? endforeach; ?>
<? else: ?>
	<tr>
		<td colspan="4" align='center'>Категории отсутствуют</td>
	</tr>
<? endif; ?>
	</tbody>
</table>