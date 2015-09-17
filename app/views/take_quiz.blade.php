@section('content')
<div class="row">
	<div class="col-md-4 col-centered">
		<form action="/start-quiz" method="POST">
			
			<fieldset>
				<legend>Take Quiz</legend>		
				@include('alert')
				<div class="form-group">
				  <label class="control-label" for="id_number">ID Number</label>
				  <input class="form-control" id="id_number" name="id_number" type="number" autofocus>
				</div>
				<div class="form-group">
				  <label class="control-label" for="quiz_code">Quiz Code</label>
				  <input class="form-control" id="quiz_code" name="quiz_code" type="text">
				</div>					
				<div class="form-group">
					<button class="btn btn-block btn-primary">Start Quiz</button>
				</div>
			</fieldset>
			
		</form>
	</div>
</div>
@stop