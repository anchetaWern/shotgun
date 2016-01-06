$(function(){
	$('#quiz-form').attr('action', '/start-quiz').show();

	$('#agree').click(function(){

		$('#take-quiz').removeClass('hidden');
		$('#note').addClass('hidden');
	});

});