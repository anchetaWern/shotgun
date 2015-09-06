@section('content')
<div class="row">
	<div class="col-md-4">
		<fieldset id="login-fieldset">
			<legend>Login</legend>		
			@include('alert')
			<form action="/login" method="POST">
				<div class="form-group">
				  <label class="control-label" for="email">Email</label>
				  <input class="form-control" id="email" name="email" type="email" autofocus>
				</div>

				<div class="form-group">
				  <label class="control-label" for="password">Password</label>
				  <input class="form-control" id="password" name="password" type="password">
				</div>

				<div class="form-group">
				    <button type="submit" class="btn btn-block btn-primary">Login</button>
				</div>

			</form>	
		</fieldset>
	</div>

</div>
@stop