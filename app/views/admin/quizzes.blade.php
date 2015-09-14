@section('content')
<div class="row">
	<div class="col-md-12">
		<h3>Quizzes</h3>
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th>Created at</th>
					<th>Update</th>
				</tr>
			</thead>
			<tbody>
			@foreach($quizzes as $quiz)
				<tr>
					<td>{{ $quiz->title }}</td>
					<td>{{ Carbon::parse($quiz->created_at)->format('M d, Y h:i A') }}</td>
					<td><a href="/quiz/{{ $quiz->id }}">update</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop