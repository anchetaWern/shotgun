@section('content')
<div class="row">
	<div class="col-md-12">
		@include('alert')
		<h3>Finished Quizzes</h3>
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th>Class</th>
					<th>Date</th>
					<th>Time Start</th>
					<th>Time End</th>
					<th>View Scores</th>
				</tr>
			</thead>
			<tbody>
			@foreach($quizzes as $quiz)
				<tr>
					<td>{{ $quiz->title }}</td>
					<td>{{ $quiz->name }}</td>
					<td>{{ Carbon::parse($quiz->datetime_from)->format('M d, Y') }}</td>
					<td>{{ Carbon::parse($quiz->datetime_from)->format('h:i A') }}</td>
					<td>{{ Carbon::parse($quiz->datetime_to)->format('h:i A') }}</td>
					<td><a href="/scores/{{ $quiz->id }}">view</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop