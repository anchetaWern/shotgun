@section('content')
<div class="row">
		<div class="col-md-4">
			<form action="/class/{{ $class->id }}/update" method="POST">	
				<fieldset>
					<legend>Update Class</legend>		
					@include('alert')
					<div class="form-group">
					  <label class="control-label" for="name">Name</label>
					  <input class="form-control" id="name" name="name" type="text" value="{{ $class->name }}" autofocus>
					</div>
					<div class="form-group">
						<label class="control-label" for="details">Details</label>
						<textarea class="form-control" name="details" id="details" rows="3" value="{{ $class->details }}">{{ $class->details }}</textarea>
					</div>
					<div class="form-group">
						<button id="save-quiz" class="btn btn-block btn-primary">Save</button>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="col-md-8">
			<table class="table">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Student</th>
						<th>Drop</th>
					</tr>
				</thead>
				<tbody>
					@foreach($students as $student)
					<tr>
						<td>{{ $student->student_id }}</td>
						<td>{{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_initial }}</td>
						<td><button type="button" class="drop-student btn btn-danger" data-id="{{ $student->student_class_id }}" data-name="{{ $student->last_name }}, {{ $student->first_name }}">drop</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
</div>
@stop