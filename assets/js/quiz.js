$('.radio-input').click(function(){
	var self = $(this);
	var answer = self.val();

	var name = self.attr('name');
	$('#answer_' + name).val(answer);
});