@section('content')
<div class="row">
	<div class="col-md-12">
		<h3>Hello {{ Auth::user()->name }}!</h3>

		<ul>
			<li>
				<a href="/class/new">Create New Class</a>
			</li>
			<li>
				<a href="/classes">List Classes</a>
			</li>
			<li>
				<a href="/quiz/new">Create New Quiz</a>
			</li>
			<li>
				<a href="/quizzes">List Quizzes</a>
			</li>
			<li>
				<a href="/quiz/schedule">Schedule a Quiz</a>
			</li>
			<li>
				<a href="/schedules">List Scheduled Quizzes</a>
			</li>
			<li>
				<a href="/finished">List Finished Quizzes</a>
			</li>
		</ul>
	</div>
</div>
@stop