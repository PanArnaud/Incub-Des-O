@extends('layouts.app')

@section('title', $topic->title.' - '.$project->title)

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
			<div class="ui items">
				<div class="item">
    				<div class="content">
      					<div class="header"><h1>{{ $topic->title}}</h1></div>
      					<div class="meta">
		        			<span>
		        				Par 
								<strong>
									<a href="{{ route('user.profile', ['user' => $project->user->username]) }}">{{ $topic->user->username }}</a>
								</strong>
							</span>
      					</div>
      					<div class="description">
        					<p>{!! $topic->body !!}</p>
      					</div>
    				</div>
  				</div>

  				<div class="ui comments">
  					<div class="comment">
    					<div class="content">
      						<a class="author">Tom Lukic</a>
  							<div class="text">
        						lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis explicabo aliquid inventore ratione accusantium pariatur in, rerum recusandae assumenda deleniti id laboriosam accusamus, ex corrupti. Laudantium, laborum, itaque? Officiis, modi.
  							</div>
      						<div class="actions">
        						<a class="report">Signaler</a>
        					</div>
    					</div>
  					</div>
  					<div class="comment">
    					<div class="content">
      						<a class="author">Tom Lukic</a>
  							<div class="text">
        						This will be great for business reports.
  							</div>
      						<div class="actions">
        						<a class="report">Signaler</a>
        					</div>
    					</div>
  					</div>
					<div class="comment">
    					<div class="content">
      						<a class="author">Tom Lukic</a>
  							<div class="text">
        						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt nisi hic laborum illum dolore ipsa aliquam quasi nostrum soluta nesciunt. Quas, rerum laborum facilis nihil quasi ratione voluptatem deserunt ad!
  							</div>
      						<div class="actions">
        						<a class="report">Signaler</a>
        					</div>
    					</div>
  					</div>
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
@endsection