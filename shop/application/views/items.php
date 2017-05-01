<? echo $modals; ?>
  <div class="modal fade" id="paymodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Оплата</h4>
        </div>
 <div class="modal-body">
                <table class="paytable">
                    <tr>
                        <td style="color:#ffff00">Товар:</td>
                        <td class="payitem" style="color:#ffff00">...</td>
                    </tr>
                    <tr>
                        <td style="color:#ffff00">Кол-во:</td>
                        <td class="paycount" style="color:#ffff00">...</td>
                    </tr>
                    <tr>
                        <td style="color:#ffff00">К оплате:</td>
                        <td class="payprice" style="color:#ffff00">...</td>
                    </tr>
                    <tr>
                        <td style="color:#ffff00">Кошелек для платежа:</td>
                        <td id="copyfund" title="Скопировать в буфер обмена" data-clipboard-target="copyfund" class="modgl payfund" style="color:#ffff00">...</td>
                    </tr>
                    <tr>
                        <td style="color:#ffff00">Примечание к платежу:</td>
                        <td id="copybill" title="Скопировать в буфер обмена" data-clipboard-target="copybill" class="modgl paybill" style="color:#ffff00">...</td>
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
    </div>
	<div class="modal fade" id="choosemodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Товар: <span></span></h4>
            </div>
            <div class="modal-body">
                <div>
                    <label class="control-label" for="count">Кол-во:</label>
                   <input type="text" class="form-control input-small" name="count" value="1">
                </div>
                <input type="hidden" name="item" id="fldProduct" />
                    </select>
             
                <div>
                    <label class="control-label" for="funds">Способ оплаты:</label>
                    <select class="form-control input-small" name="funds">
                     				<? foreach($funds as $fund): ?>
              <option value="<? echo $fund['fundid']; ?>" data-fund="<? echo $fund['fundname']; ?>"><? echo $fund['fundname']; ?></option>
              <? endforeach; ?>
                                            </select>
                </div>
                <div>
                    <label class="control-label" for="email">E-mail:</label>
                    <input type="email" class="form-control input-small" name="email">
                </div>
                <div>
                    <input type="checkbox" name="terms" id="terms" onchange="toggleTerms()">
                    <label class="control-label inline" for="terms">Принимаю правила магазина</label>

                </div>
            </div>

            <div class="payfoot modal-footer">
                <button id="btnPay" disabled onclick="sendData();" type="button" class="buy">Оплатить</button>
            </div>
        </div>
    </div>
</div>
      <div class="container">     
<div class="col-lg-12">
    <div class="categories">

        <a class="active" href="javascript:;" data-id="all">Все товары</a>

        	<?php foreach($categories as $category): ?>
        <a href="javascript:;" data-id="<? echo $category->id; ?>"> <? echo $category->title; ?></a>
		<? endforeach; ?>

  </div>
<div class="modal fade" id="myModal_<?echo $item->id; ?>">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  <h4 class="modal-title"><?echo $item->name; ?></h4>
			</div>
			<div class="modal-body">
			  <?echo $item->descr; ?>
			</div>
		  </div>
		</div>
	  </div>

<? if(count($items)): foreach($items as $item): ?>
      <div class="products eq-h">
	    <div class="col-sm-4 cat<?echo $item->category; ?>">
        <div class="item">
            <div class="item-header modgl" data-toggle="modal" data-target="#myModal_<?echo $item->id; ?>">
                <div class="item-icon">
              <? echo empty($item->iconurl) ? '' : '<img style="max-width:32px;max-height: 32px;cursor:pointer;" src="'.$item->iconurl.'" />'; ?>                  <div class="price"><? echo $item->count; ?></div>
                </div>
                <h3>
                    <?echo $item->name; ?>             </h3>
            </div>
            <div class="actions">
                <div class="left">
                    <span class="rubprice"><? echo $item->price_rub; ?> р. / 1 шт.</span>
                    <span class="dlrprice" style="display:none"><? echo $item->price_dlr; ?> $. / 1 шт.</span>
                </div>
                <div class="right">
                    <a href="javascript:;" onclick="chooseProduct(<?echo $item->id; ?>, '<?echo $item->name; ?>')" class="buy">Купить</a>
                </div>
            </div>
            </div>
        </div>
    </div>
		<? endforeach; ?>
<? else: ?>
<center><h1 style="color:#ffff00">Товаров пока нет...Приходите позже!</h1></center>
<? endif; ?>
       </div>
