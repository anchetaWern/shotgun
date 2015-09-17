@section('content')
<div class="row">
	<div class="col-md-8">
		<form action="/submit-quiz" method="POST">
			<fieldset>
				<legend>{{ $quiz->title }}</legend>
				<div id="quiz-items">
					@foreach($quiz_items as $item_id => $item)
					<ul class="quiz-item no-bullet" data-id="{{ $item_id }}">
						<li>
							<p>{{ $item['question'] }}</p>
							<input type="hidden" name="item_id[]" value="{{ $item_id }}">
						</li>
						@if(!empty($item['choices']))	
						<li class="margin-top">
							@foreach($item['choices'] as $choice)
								<li>
									<div class="radio">
									  <label>
									    <input type="radio" class="radio-input" name="{{ $item_id }}" value="{{ $choice }}"> {{ $choice }}
									  </label>
									</div>
								</li>
							@endforeach
							<input type="hidden" class="hidden-answer" id="answer_{{ $item_id }}" name="answer[]">
						</li>
						@else
						<li>
							<label class="control-label">Answer</label>
							<input type="text" class="form-control" name="answer[]">
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
</div>
@stop