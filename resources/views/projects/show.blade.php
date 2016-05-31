@extends('layouts.app')

@section('title', $project->title)

@section('content')
<div class="ui grid">
	<div class="two column row">
	    <div class="twelve wide column grid">
			<div class="ui divided items">
				<div class="item">
					<div class="ui image small">
						  <img  class="ui rounded image" src="">
					</div>
					<div class="content">
					  	<h1>{{ $project->title }}</h1>
		  					<div class="ui right floated star rating" data-rating="{{ $project->averageRate() }}" data-max-rating="5"></div>
					  	<div class="meta">
					    	<span>{{ $project->city->name }}</span> - Par <span><strong><a href="{{ route('user.profile', ['user' => $project->user->username]) }}">{{ $project->user->username }}</a></strong></span>
					  		
					  	</div>
				  		<div class="extra">
		  					<div class="ui small indicating progress" id="example2">
  								<div class="bar"></div>
  							</div>
						</div>
				  			{{-- <a href="">3 commentaires</a> 
							<div class="ui right floated star rating" data-rating="2" data-max-rating="5"></div> --}}{{-- 
				  		</div> --}}
					</div>
				</div>
			</div>
			<div class="four wide column grid">
				<div class="ui top attached tabular menu">
					<a class="active item" data-tab="description">Description</a>
  					<a class="item" data-tab="discussion">Discussion</a>
				</div>
				<div class="ui bottom attached tab active segment" data-tab="description">
					<p>{!! $project->description !!}</p>
				</div>
				<div class="ui bottom attached tab segment" data-tab="discussion">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum non perspiciatis impedit, eos optio, numquam pariatur sint asperiores ipsam delectus nobis aperiam nesciunt neque eum voluptates quisquam rem repellat! Ullam!
				</div>
			</div>
		</div>
	</div>		
</div>
@endsection

@section('scripts')
	<script>
		$('#example2').progress({
		  percent: 50
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			var url = '{{ route('project.rate', ['id' => $project->id] ) }}';
			var project_id = {{ $project->id }};
			var token = '{{ Session::token() }}';

			$('.ui.rating').rating('setting', 'onRate', function(value) {
				alert("plop");
				$.ajax({
					method: 'POST',
					url: url,
					data: {project_id: project_id, rate: value, _token: token}
				})
				.done(function() {
					alert("gg");
				});
			});
	  	});
	</script>
	<script>
		$('.menu .item')
	  		.tab()
		;
	</script>
@endsection