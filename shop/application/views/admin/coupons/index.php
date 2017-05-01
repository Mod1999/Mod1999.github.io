<p class="lead pull-left">Промо-коды</p>
<? echo anchor('admin/coupons/edit','<i class="glyphicon glyphicon-plus"></i> Создать выпуск',array('class'=>'pull-right btn btn-small btn-primary')); ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Имя выпуска</th>
			<th>Время действия</th>
			<th>Кол-во</th>
			<th>-</th>
			<th>Продаж</th>
			<th>Товаров</th>
		</tr>
	</thead>
	<tbody>
		<?
			foreach ($coupons as $key => $cpn) {
				$timefrom = date('d.m.y',$cpn->timefrom);
				$timeto = date('d.m.y',$cpn->timeto);
				$time = 'c '.$timefrom.' до '.$timeto;
				$count = count(explode('|', $cpn->coupon));
				$goods = count(explode(',', $cpn->goods));
				if($cpn->mayused == 1) {
					$mayused = 'многократно';
				} elseif($cpn->mayused == 0) {
					$mayused = 'однократно';
				}
				echo '<tr>';
				echo '<td><a href="/admin/coupons/show/'.$cpn->id.'">'.$cpn->name.'</a></td>';
				echo '<td>'.$time.'</td>';
				echo '<td>'.$count.'</td>';
				echo '<td>'.$mayused.'</td>';
				echo '<td>'.$cpn->used.'</td>';
				echo '<td>'.$goods.'</td>';
				echo '<td>'.btn_delete('admin/coupons/delete/'.$cpn->id).'</td>';
				echo '<td>'.btn_edit('admin/coupons/edit/'.$cpn->id).'</td>';
				echo '</tr>';
			}
		?>
	</tbody>
</table>