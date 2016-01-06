@section('content')
<div class="row">
	<form action="/quiz/{{ $quiz->id }}/update" method="POST">
		<div class="col-md-4">
			<fieldset>
				<legend>Update Quiz</legend>		
				@include('alert')
					<div class="form-group">
					  <label class="control-label" for="title">Title</label>
					  <input class="form-control" id="title" name="title" type="text" value="{{ $quiz->title }}" autofocus>
					</div>
					<div class="form-group">
						<label class="control-label" for="minutes">Minutes</label>
						<input class="form-control" id="minutes" name="minutes" type="text" value="{{ $quiz->minutes }}">
					</div>
					<div class="form-group">
					  <label class="control-label" for="details">Details</label>
					  <textarea class="form-control" name="details" id="details" rows="3" value="{{ $quiz->details }}">{{ $quiz->details }}</textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-block btn-primary">Save</button>
					</div>
			</fieldset>
		</div>

		<div class="col-md-8">
			<fieldset id="quiz-items-fieldset">
				<legend class="sub">Quiz Items</legend>

				<div class="no-overflow form-group">
					<button type="button" id="add-item" class="btn btn-info pull-right">Add Item</button>
				</div>
				
				<div id="quiz-items">
				
					@foreach($quiz_items as $item_id => $item)
					<ul class="quiz-item no-bullet" data-id="{{ $item_id }}">
						<li>
							<label class="control-label">Question</label>
							<textarea class="form-control question" name="question[{{ $type }}][]" rows="3" value="{{ $item['question'] }}">{{ $item['question'] }}</textarea>
						</li>
						<li>
							<label class="control-label">Answer</label>
							<button type="button" class="add-answer btn btn-warning btn-xs" data-type="{{ $type }}">Add Another Answer</button>
							<div class="answers-container" data-id="{{ $item_id }}">
							@if(!empty($item['answers']))
								@foreach($item['answers'] as $answer)
									<textarea class="form-control answer" name="answer[{{ $type }}][{{ $item_id }}][]" rows="1"  placeholder="Answer 1" value="{{ $answer }}">{{ $answer }}</textarea>
								@endforeach
							@endif
							</div>
						</li>
						<li class="margin-top">
							<button type="button" class="add-choices btn btn-success btn-xs" data-type="{{ $type }}">Add Choices</button>
							<button type="button" class="hidden remove-choices btn btn-danger btn-xs">Remove Choices</button>
							<div class="choices-container" data-id="{{ $item_id }}">
							@if(!empty($item['choices']))	
								<ul class="choices no-bullet">
								@foreach($item['choices'] as $choice)
									<li>
										<textarea class="form-control choice" name="choice[{{ $type }}][{{ $item_id }}][]" rows="3" value="{{ $choice }}">{{ $choice }}</textarea>
										<button type="button" class="btn btn-xs use-answer">use as answer</button>
									</li>
								@endforeach
								</ul>
							@endif
							</div>
						</li>
					</ul>
					@endforeach
				</div>
			</fieldset>
		</div>
	</form>
</div>
@stop