@section('content')
<div class="row">
	<div class="col-md-4">
		<form action="/quiz/schedule" method="POST">
			<fieldset>
				<legend>Schedule a Quiz</legend>		
				@include('alert')
				<div class="form-group">
				  <label class="control-label" for="quiz">Quiz</label>
				  <input class="form-control" id="quiz" name="quiz" type="text" list="quizzes" autocomplete="off" autofocus>
				  <datalist id="quizzes">
				  @foreach($quizzes as $quiz_title)
				  	<option value="{{ $quiz_title }}">{{ $quiz_title }}</option>
				  @endforeach
				  </datalist>
				</div>
				<div class="form-group">
				  <label class="control-label" for="class">Class</label>
				  <input class="form-control" id="class" name="class" type="text" list="classes">
				  <datalist id="classes">
				  	@foreach($classes as $class)
				  	<option value="{{ $class }}">{{ $class }}</option>
				  	@endforeach
				  </datalist>
				</div>
				<div class="form-group">
				  <label class="control-label" for="start_time">Start Time (format: MM/DD/YYYY HH:MM)</label>
				  <input class="form-control" id="start_time" name="start_time" type="text" placeholder="e.g 12/25/2015 00:00">
				</div>
				<div class="form-group">
				  <label class="control-label" for="end_time">End Time (format: MM/DD/YYYY HH:MM)</label>
				  <input class="form-control" id="end_time" name="end_time" type="text" placeholder="e.g e.g 12/25/2015 02:00">
				</div>
				<div class="form-group">
					<button class="btn btn-block btn-primary">Save</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>
@stop