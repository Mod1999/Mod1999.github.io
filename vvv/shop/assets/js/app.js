

function price_rub() {
	$('.dlrprice').each(function() {
		var price = $(this);
		price.hide();
	});
	$('.rubprice').each(function() {
		var price = $(this);
		price.show();
	});
};

function price_dlr() {
	$('.rubprice').each(function() {
		var price = $(this);
		price.hide();
	});
	$('.dlrprice').each(function() {
		var price = $(this);
		price.show();
	});
};

	function validateEmail(email){ 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

function showerr(data)
{
	$().toastmessage('showToast', {
		text     : data,
		sticky   : false,
		position : 'top-right',
		type     : 'warning'
	});
}

function showmsg(data)
{
	$().toastmessage('showToast', {
		text     : data,
		sticky   : false,
		position : 'top-right',
		type     : 'notice'
	});
}

function sendData() {
    //читаем данные из формы
    var email = $('input[name=email]').val();
	var countAccs = $('input[name=count]').val() || 0;
	var selectType = $('#fldProduct').val();
	var minCount = $('option[value="' + selectType + '"]').attr('data-min_order');
	var countType = $('td[data-id=' + selectType + ']').html();
	
	if (!validateEmail(email))
	{
		var err = 'Указан неверный email адрес';
		showerr(err);
		return false;
	}
	
	if (parseInt(countAccs) < parseInt(minCount))
	{
		var err = 'Мин. кол-во для заказа: ' + minCount;
		showerr(err);
		return false;
	}
	
	if (parseInt(countType) < parseInt(countAccs))
	{
		var err = 'Такого количества товара нет';
		showerr(err);
		return false;
	}

	$('#btnPay').attr('disabled',1);

	$.post("/order/", { email: email, count:countAccs, type: selectType, fund: $('select[name=funds]').val()},
	function(data) {
        $('#btnPay').removeAttr('disabled');
		try
        {
			var res = JSON.parse(data);
			if(res.ok == 'TRUE')
			{
				$('.paytable .payitem').text(res.name);
				$('.paytable .paycount').text(res.count);
				$('.paytable .payprice').text(res.price);
				$('.paytable .payfund').html(res.fund);
				$('.paytable .paybill').html(res.bill);
				$('.checkpaybtn').attr('onclick',"checkpay('" + res.check_url + "')");
                $('#choosemodal').modal('hide');
				$('#paymodal').modal('toggle')
			}
			if(typeof(res.error) !== "undefined" && res.error !== null) {
				showerr(res.error);
			}
		}
		catch(err)
		{
			alert('Настройки для Webmoney неверны! \r\nСообщите продавцу об этом!');
		}
		
		
	});
            
}

function checkpay(url)
{
$('.checkpaybtn').button('loading');
$.get(url, function(data) {
  $('.checkpaybtn').button('reset');
  var res = JSON.parse(data);
  if(res.status == "ok")
  {
	$('.checkpaybtn').attr('onclick','window.location ="'+res.chkurl+'"');
	$('.checkpaybtn').text('Скачать');
  }
  else
  {
	alert('Платеж не найден! Попробуйте позже')
  }
});
}

function chooseProduct(id, name)
{
   
    $('#choosemodal').modal('toggle').find('.modal-title span').text(name);
    $('#fldProduct').val(id);
}
function toggleTerms()
{
    var btn = $('#btnPay');
    if ($('#terms:checked').length)
        btn.removeAttr('disabled');
    else
        btn.attr('disabled', '1')
}


function sizeProducts()
{
    var maxHeight = 0;
    $('.eq-h .actions').css('margin-top', '0px');
    $('.eq-h > div').each(function (i, el) {
        var height = $(el).height();
        if (height > maxHeight) { maxHeight = height; }
    }).each(function (i, el) {
        el = $(el);
        var difference = maxHeight - el.height();
        el.find('.actions').css('margin-top', difference + 'px');
    });
}



$(window).resize(sizeProducts);
$(function () {
    sizeProducts();

    $('.categories a').click(function () {

        $(this).parent().find('a').removeClass('active');
        $(this).addClass('active');
        var id = $(this).data('id');

        if (id == 'all')
            $('.products > div').show();
        else {
            var all = $('.products > div');
            all.filter(':not(.cat' + id + ')').hide();
            all.filter('.cat' + id).show();
        }

    });

});