@section('content')
<div class="row">
	<form action="/quiz/new" method="POST">
		<div class="col-md-4">
			<fieldset>
				<legend>Create New Quiz</legend>		
				@include('alert')
					<div class="form-group">
					  <label class="control-label" for="title">Title</label>
					  <input class="form-control" id="title" name="title" type="text" autofocus>
					</div>
					<div class="form-group">
						<label class="control-label" for="minutes">Minutes</label>
						<input class="form-control" id="minutes" name="minutes" type="text">
					</div>
					<div class="form-group">
						<label class="control-label" for="details">Details</label>
						<textarea class="form-control" name="details" id="details" rows="3"></textarea>
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
					<ul class="quiz-item no-bullet" data-id="0">
						<li>
							<label class="control-label">Question</label>
							<textarea class="form-control question" name="question[{{ $type }}][]" rows="3"></textarea>
						</li>
						<li>
							<label class="control-label">Answer</label>
							<button type="button" class="add-answer btn btn-warning btn-xs" data-type="{{ $type }}">Add Another Answer</button>
							<div class="answers-container">
								<textarea class="form-control answer" name="answer[{{ $type }}][0][]" rows="1"  placeholder="Answer 1"></textarea>
							</div>
						</li>
						<li class="margin-top">
							<button type="button" class="add-choices btn btn-success btn-xs" data-type="{{ $type }}">Add Choices</button>
							<button type="button" class="hidden remove-choices btn btn-danger btn-xs">Remove Choices</button>
							<div class="choices-container"></div>
						</li>
					</ul>
				</div>
			</fieldset>
		</div>
	</form>
</div>
@stop