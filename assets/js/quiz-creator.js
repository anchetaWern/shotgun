(function(){

	var quizitem_template;
	var choices_template;
	var answer_template;

	$.get('/assets/templates/quiz-item.hbs', function(html){
		quizitem_template = Handlebars.compile(html);
	});

	$.get('/assets/templates/choices.hbs', function(html){
		choices_template = Handlebars.compile(html);
	});

	$.get('/assets/templates/answer.hbs', function(html){
		answer_template = Handlebars.compile(html);
	});	

	$('#add-item').click(function(){
		
		var question_index = Number($('.quiz-item:last').data('id')) + 1;
		$('#quiz-items').append(quizitem_template(
			{
				'type': 'new',
				'question_index' : question_index
			}
		));

		$('.quiz-item:last-child').find('.question').focus();
	});

	$('#quiz-items-fieldset').on('click', '.add-choices', function(){
		var self = $(this);

		var type = self.data('type');

		self.addClass('hidden');
		self.siblings('.has_choices').val('1');
		self.siblings('.remove-choices').removeClass('hidden');
		
		var choices_container = self.siblings('.choices-container');

		var question_index = self.parents('.quiz-item').index();
		if(choices_container.data('id')){
			question_index = choices_container.data('id');
		}

		var choices_letters = ['A', 'B', 'C', 'D'];
		var current_choices_count = choices_container.find('li').length;		
		choices_letters.splice(0, current_choices_count);

		var choices = {
			'type': type,
			'choices' : choices_letters, 
			'question_index' : question_index
		};
		$(choices_template(choices)).appendTo(choices_container);

		choices_container.find('.choice:eq(0)').focus();

	});

	$('#quiz-items-fieldset').on('click', '.remove-choices', function(){
		var self = $(this);
		self.siblings('.choices-container').html('');
		self.addClass('hidden');
		self.siblings('.has_choices').val('');
		self.siblings('.add-choices').removeClass('hidden');
	});

	$('#quiz-items-fieldset').on('click', '.use-answer', function(){
		var self = $(this);
		var answer = self.siblings('.choice').val();
		self.parents('.quiz-item').find('.answer:first').val(answer);
	});

	$('#quiz-items-fieldset').on('click', '.add-answer', function(){
		var self = $(this);
		var type = self.data('type');
		var answers_container = self.siblings('.answers-container');
		var index = answers_container.children('.answer').length + 1;

		var question_index = self.parents('.quiz-item').index();

		if(answers_container.data('id')){
			question_index = answers_container.data('id');
		}

		$(answer_template(
			{
				'type': type,
				'question_index': question_index, 
				'index' : index
			})).appendTo(answers_container);
	
		answers_container.find('.answer:last-child').focus();
	});

})();