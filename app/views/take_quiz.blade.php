@section('content')
<div class="row">
	<div class="col-md-4 col-centered">
		<noscript>
			You cannot take a quiz without JavaScript. <br>
			Enable JavaScript on this browser
		</noscript>
		<form action="/meh" id="quiz-form" method="POST">
			<div class="alert alert-info">
			Note: <br>
			- Questions are ordered randomly <br>
			- You have 13 minutes (780 seconds) to answer all the questions.<br>
			- When the time limit reaches 0, the quiz is automatically submitted <br>
			- When you attempt to access any other window, browser tab, browser extension/plugin, developer tools or application, the quiz is automatically submitted 
			</div>

			<fieldset>
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