$(function(){
	if ($('#million_counter').length == 0) return false;

	try{
		var counterInfo = $.parseJSON($.ajax({
									url: '/dynamic/minigames/index.php?a=info&g=goldm',
									async: false,
									type: 'GET',
									dataType: 'json'
								}).responseText);
		$('#million_counter').show();

		millionCounter(counterInfo);
	} catch(e){
		return false;
	}

});

millionCounter = function(counterInfo) {
	var $countdown = $('#million_counter'),
			counter = counterInfo.counter,
			fullcount = 10000000,
			timer = 3*24*60*60,
			notes = new Array,
			startCount= new Array;

	var counterInterval, coinsCount;

	counterInterval = Math.round((timer/fullcount)*1000);
	startCount = fullcount.toString().split("");

	if (!counterInfo.error) {

		$countdown.find('.milliom__inner').html('').append('<span class="million__title">Распродажа!</span><span class="million__lead">кредитов осталось:</span><span class="million_counter"></span>');

		for (var i = 0; i < startCount.length; i++) {
			$countdown.find('.million_counter').append('<span class="million_counter__item">'+startCount[i]+'</span>');
		}

		setInterval(function(){
			coinsCount = counter -= 1;
			if (coinsCount >= 0) {
				notes = coinsCount.toString().split("");
				indexer = startCount.length - notes.length;
				$('.million_counter__item').addClass('empty').text('0');
				for (i = 0; i < notes.length; i++) {
					$('.million_counter__item').eq(i+indexer).text(notes[i]).removeClass('empty');
				}
			} else{
				// $countdown.hide();
				return false;
			}
		}, counterInterval);
		
	}
}