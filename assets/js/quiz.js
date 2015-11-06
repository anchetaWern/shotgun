$(window).blur(function(){
	$('#quiz-form').submit();
});

$('.radio-input').click(function(){
	var self = $(this);
	var answer = self.val();

	var name = self.attr('name');
	$('#answer_' + name).val(answer);
});


var time = 781;

var counter = setInterval(timer, 1000); 

function timer(){
  time = time - 1;

  $('#time').text(time);
  if(time == 0){
    clearInterval(counter);
    $('#quiz-form').submit();
    return;
  }
}

$(function(){
  $('#quiz-form').show();
});