@section('content')
<div class="row">
	<form action="/class/create" method="POST">	
		<div class="col-md-4">
			<fieldset>
				<legend>Create New Class</legend>		
				@include('alert')
				<div class="form-group">
				  <label class="control-label" for="name">Name</label>
				  <input class="form-control" id="name" name="name" type="text" autofocus>
				</div>
				<div class="form-group">
					<label class="control-label" for="details">Details</label>
					<textarea class="form-control" name="details" id="details" rows="3"></textarea>
				</div>
				<div class="form-group">
					<button id="save-quiz" class="btn btn-block btn-primary">Save</button>
				</div>
			</fieldset>
		</div>

		<div class="col-md-8">
			<div class="form-group">
				<label class="control-label" for="students">Students</label>
				<textarea class="form-control" name="students" id="students" rows="20" placeholder="(format: StudentIDLastName, FirstName MiddleInitial.)"></textarea>
			</div>
		</div>
	</form>
</div>
@stop