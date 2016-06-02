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
					  	<h1>
					  		{{ $project->title }}
					  		@if(Auth::user()->id == $project->user->id || Auth::user()->hasRole(['moderator','admin','owner']))
					  			<div class="ui right floated text menu">
  									<a class="item">
    									Editer
									</a>
  									<a id="delete" class="item">
    									Supprimer
									</a>
								</div>
							@endif
					  	</h1>

	  					<div class="ui right floated star rating" data-rating="{{ $project->averageRate() }}" data-max-rating="5"></div>
			
					  	<div class="meta">
					    	<span>{{ $project->city->name }}</span> - Par <span><strong><a href="{{ route('user.profile', ['user' => $project->user->username]) }}">{{ $project->user->username }}</a></strong></span>	
					  	</div>
					  	
						<div class="introduction">
					    	<p>{{ $project->introduction }}</p>
					  	</div>

				  		<div class="extra">
		  					<div class="ui small indicating progress" id="example2">
  								<div class="bar"></div>
  							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="four wide column grid">
				<div class="ui top attached tabular menu">
					<a class="{{ isset($_GET['page']) ? '' : 'active'}} item" data-tab="description">Description</a>
  					<a class="{{ isset($_GET['page']) ? 'active' : ''}} item" data-tab="discussion">Discussions</a>
				</div>
				<div class="ui bottom attached tab {{ isset($_GET['page']) ? '' : 'active'}} segment" data-tab="description">
					<p>{!! $project->description !!}</p>
				</div>
				<div class="ui bottom attached tab {{ isset($_GET['page']) ? 'active' : ''}} segment" data-tab="discussion">
					<div class="ui big blue label">
  						<i class="plus icon"></i>Nouvelle discussion
					</div>
					<table class="ui basic table">
						@foreach($topics as $topic)
							<tbody>
								<tr>
									<td>
										<a href="">
											<strong>{{ $topic->title}}
											</strong>
										</a> - Par 
										<span>
											<strong>
												<a href="{{ route('user.profile', ['user' => $topic->user->username]) }}">
													{{ $topic->user->username }}
												</a>
											</strong>
										</span>
									</td>
									<td>
										<a class="ui label">214
  											Réponse(s)
										</a>
									</td>
    							</tr>
  							</tbody>
  						@endforeach
					</table>
						@include('partials.pagination', ['paginator' => $topics])
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
				$.ajax({
					method: 'POST',
					url: url,
					data: {project_id: project_id, rate: value, _token: token}
				});
			});
	  	});
	</script>
	<script>
		$('#delete').on('click', function(){
  			swal({   
			    title: "Etes-vous sur ?",
			    text: "La récupération de ce projet ne sera pas possible.",         type: "warning",   
			    showCancelButton: true,   
			    confirmButtonColor: "#DD6B55",
			    confirmButtonText: "Supprimer!", 
			    cancelButtonText: "Annuler",
			    closeOnConfirm: false 
  			}, 
       		function(isConfirm){
  				if (isConfirm) {
    				window.location.href = "{{ route('project.destroy', ['id' => $project->id]) }}";
  				}
  			});
		})
	</script>
	<script>
		$('.menu .item')
	  		.tab()
		;
	</script>
@endsection