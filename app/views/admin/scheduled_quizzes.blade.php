@section('content')
<div class="row">
	<div class="col-md-12">
		<h3>Scheduled Quizzes</h3>
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th>Class</th>
					<th>Code</th>
					<th>Date</th>
					<th>Time Start</th>
					<th>Time End</th>
					<th>Update</th>
				</tr>
			</thead>
			<tbody>
			@foreach($quizzes as $quiz)
				<tr>
					<td>{{ $quiz->title }}</td>
					<td>{{ $quiz->name }}</td>
					<td>{{ $quiz->quiz_code }}</td>
					<td>{{ Carbon::parse($quiz->datetime_from)->format('M d, Y') }}</td>
					<td>{{ Carbon::parse($quiz->datetime_from)->format('h:i A') }}</td>
					<td>{{ Carbon::parse($quiz->datetime_to)->format('h:i A') }}</td>
					<td><a href="/schedules/{{ $quiz->id }}">update</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop