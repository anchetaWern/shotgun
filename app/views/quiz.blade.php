@section('content')
<div class="row">
	<div class="col-md-8">
		<noscript>
			You cannot take a quiz without JavaScript. <br>
			Enable JavaScript on this browser
		</noscript>
		<form id="quiz-form" action="/submit-quiz" method="POST">
			<fieldset>
				<legend>{{ $quiz->title }}</legend>
				<div id="quiz-items">
					@foreach($quiz_items as $item_id => $item)
					<ul class="quiz-item no-bullet" data-id="{{ $item_id }}">
						<li>
							<p>{{{ $item['question'] }}}</p>
							<input type="hidden" name="item_id[]" value="{{ $item_id }}">
						</li>
						@if(!empty($item['choices']))	
						<li class="margin-top">
							@foreach($item['choices'] as $choice)
								<li>
									<div class="radio">
									  <label>
									    <input type="radio" class="radio-input" name="{{ $item_id }}" value="{{ $choice }}"> <pre>{{{ $choice }}}</pre>
									  </label>
									</div>
								</li>
							@endforeach
							<input type="hidden" class="hidden-answer" id="answer_{{ $item_id }}" name="answer[]">
						</li>
						@else
						<li>
							<label class="control-label">Answer</label>
							<input type="text" class="form-control" name="answer[]" autocomplete="off">
						</li>
						@endif
					</ul>
					@endforeach
				</div>
				
				<div class="form-group">
					<button class="btn btn-lg btn-primary btn-block">Submit Answers</button>
				</div>
			</fieldset>
		</form>
	</div>
	
	<div class="col-md-2" id="time-container">
		Seconds remaining:
		<div id="time">{{ $seconds }}</div>
	</div>

	<div class="col-md-2" id="warning-container">
		Warnings:
		<div id="warning">0</div>
	</div>
		
</div>
@stop