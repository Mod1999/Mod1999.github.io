﻿<div class="modal fade" id="paymodal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Оплата</h4>
    </div>
    <div class="modal-body">
    <table class="paytable">
	  <tr>
		  <td>Товар:</td>
		  <td class="payitem">...</td>
	  </tr>
	  <tr>
		  <td>Кол-во:</td>
		  <td class="paycount">...</td>
	  </tr>
	  <tr>
		  <td>К оплате:</td>
		  <td class="payprice">...</td>
	  </tr>
	  <tr>
		  <td>Кошелек для платежа:</td>
		  <td id="copyfund" class="payfund">...</td>
	  </tr>
	  <tr>
		  <td>Примечание к платежу:</td>
		  <td id="copybill" class="paybill">...</td>
	  </tr>
	</table>
    </div>
	<div class="alert alert-danger">
		<strong>Обязательно</strong> переводите деньги именно с таким примечанием!
	</div>
    <div class="payfoot modal-footer">
      <button type="button" onclick="" data-loading-text="Проверяем..." class="checkpaybtn btn btn-primary">Проверить</button>
    </div>
  </div>
</div>
</div>

<div class="panel">
  
  <div class="panel-heading ifullbody">
	<div class="panel-title" style="width:auto;display:inline-block">
		<img style='width:50px;margin-right:5px;' src="<? echo $item->iconurl; ?>">
		<? echo $item->name; ?>
	</div>
	<div class="text-right priceinfo" style="font-size:12px;display:inline-block;float:right;">
		<strong>Цена в <span class="rur">p<span>уб.</span></span>: </strong> <? echo $item->price_rub;?> за 1 шт. 
		<br/>
		<strong>Цена в $: </strong> <? echo $item->price_dlr;?> за 1 шт.
		<br/>
		<strong>Кол-во: </strong> <? echo $item->count;?>
	</div>
  </div>
  <div class="panel-body">
	<? echo $item->descr; ?>
 </div>
 <div class="panel-footer">
   
  
		<div class="row">
          	<a class="cpnin" id="coupon" >Есть промо-код?</a>
          <div class="hide popover_content">
            <input type="text" class="input-small form-control" id="cpn_inp" value=''>
          </div>
		  	<div class="col-lg-3">
				<label class="control-label" for="count">Кол-во:</label>
				<input type="text" class="form-control input-small" name="count">
		  	</div>
		  	<div class="col-lg-3">
				<label class="control-label" for="funds">Валюта:</label>
				<select class="form-control input-small" name="funds">
					<? foreach($funds as $fund): ?>
						<option value="<? echo $fund['fundid']; ?>" data-fund="<? echo $fund['fundname']; ?>"><? echo $fund['fundname']; ?></option>
					<? endforeach; ?>
				</select>
		  	</div>
		  	<div class="col-lg-3">
				<label class="control-label" for="email">E-mail:</label>
				<input type="email" class="form-control input-small" name="email">
		  	</div>
		  	<select class="form-control input-small" name="item" style='display:none'>
				<option value="<? echo $item->id; ?>" data-id="<? echo $item->id; ?>" data-min_order="<? echo $item->min_order; ?>" selected></option>
			</select>
		  	<div class="col-lg-3">
				<button onclick="sendData();" type="button" class="btn btn-primary btn-block btnbuyin">Оплатить</button>
		  	</div>
		</div>
 </div>
</div>