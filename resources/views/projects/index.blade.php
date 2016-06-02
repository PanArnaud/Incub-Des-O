@extends('layouts.app')

@section('title', 'Les projets')

@section('content')
	<div class="ui divided items">
		@foreach($projects as $project)
			<div class="item">
				<div class="ui image small">
					<a href="{{ route('project.show', ['id' => $project->id]) }}">
					  	<img  class="ui rounded image" src="">
					</a>
				</div>
				<div class="content">
				  	<a href="{{ route('project.show', ['id' => $project->id]) }}" class="header">{{ $project->title }}</a>
				  	<div class="meta">
				    	<span>{{ $project->city->name }}</span> - Par <span><strong><a href="{{ route('user.profile', ['user' => $project->user->username]) }}">{{ $project->user->username }}</a></strong></span>
				  	</div>
				  	<div class="description">
				    	<p>{{ $project->introduction }}</p>
				  	</div>
			  		<div class="extra">
						<div class="ui right floated star rating" data-rating="{{ $project->averageRate() }}" data-max-rating="5"></div>
			  		</div>
				</div>
			</div>
		@endforeach

	</div>
	@include('partials.pagination', ['paginator' => $projects])
	
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			$(".rating").rating('disable');
		});
	</script>
@endsection