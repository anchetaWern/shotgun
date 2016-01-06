@section('content')
<div class="row">
	<div class="col-md-4 col-centered">
		<noscript>
			You cannot take a quiz without JavaScript. <br>
			Enable JavaScript on this browser
		</noscript>
		<form action="/meh" id="quiz-form" method="POST">
			<div class="alert alert-info" id="note">
			Note: <br>
			- Questions are ordered randomly <br>
			- Pressing enter would submit the quiz <br>
			- When the time limit reaches 0, the quiz is automatically submitted <br>
			- The quiz is automatically submitted once the warning count becomes 3. <br> 
			Warning is initially zero but it's incremented every time you alt+tab or access any other window or tab in the browser.
				<button type="button" id="agree" class="btn btn-block btn-warning">Yes sir!</button>
			</div>

			<fieldset id="take-quiz" class="hidden">
				<legend>Take Quiz</legend>		
				@include('alert')
				<div class="form-group">
				  <label class="control-label" for="id_number">ID Number</label>
				  <input class="form-control" id="id_number" name="id_number" type="number" autocomplete="off" autofocus>
				</div>
				<div class="form-group">
				  <label class="control-label" for="quiz_code">Quiz Code</label>
				  <input class="form-control" id="quiz_code" name="quiz_code" type="text" autocomplete="off">
				</div>					
				<div class="form-group">
					<button class="btn btn-block btn-primary">Start Quiz</button>
				</div>
			</fieldset>
			
		</form>
	</div>
</div>
@stop