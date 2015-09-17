@section('content')
<div class="row">
	<div class="col-md-8">
		<h3>{{ $quiz->title }}</h3>
		<ul>
			<li><strong>Class:</strong> {{ $class->name }}</li>
			<li><strong>Date:</strong> {{ Carbon::parse($quiz_schedule->datetime_from)->format('M d, Y') }}</li>
			<li><strong>Total Points:</strong> {{ $quiz_item_count }}</li>
		</ul>
		@if($scores)
		<table class="table">
			<thead>
				<tr>
					<th>ID Number</th>
					<th>Student</th>
					<th>Time Started</th>
					<th>Time Submitted</th>
					<th>Score</th>
				</tr>
			</thead>
			<tbody>
				@foreach($scores as $row)
				<tr>
					<td>{{ $row->id }}</td>
					<td>{{ $row->last_name }}, {{ $row->first_name }} {{ $row->middle_initial }}</td>
					<td>{{ Carbon::parse($row->started_at)->format('h:i A') }}</td>
					<td>{{ Carbon::parse($row->submitted_at)->format('h:i A') }}</td>
					<td>{{ $row->score }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
		<div class="alert alert-info">
			No scores available for this quiz yet.
		</div>
		@endif
	</div>
</div>
@stop