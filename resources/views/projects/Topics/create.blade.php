@extends('layouts.app')

@section('title', 'Nouvelle discussion - '.$project->title)

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
			<div class="ui form">
	        	<form action="{{ route('project.topic.create', ['id' => $project->id]) }}" method="post">
					<div class="field">
		            	<label for="title">Titre de la discussion</label>
	                    <div class="ui left icon input">
	                        <input placeholder="Titre de la discussion" name="title" id="title" type="title" value="{{ old('title') }}">
	                        <i class="write icon"></i>


	                        @if ($errors->has('title'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('title') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	            	</div>

					<div class="field">
	    				<label for="body">Message</label>
						<textarea class="body" name="body" id="body" placeholder="Contenu de votre message">{{ old('body') }}</textarea>
					</div>

					{!! csrf_field() !!}
	            	<button type="submit" class="ui blue submit button">Ouvrir la discussion</button>
				</form>
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

	{{-- TinyMCE --}}
	<script src="{{ URL::to('js/tinymce/tinymce.min.js') }}"></script>
	<script>
		tinymce.init({
		  selector: 'textarea.body',
		  height: 500,
		  language : "fr_FR",
		  plugins: [
		    'autolink lists link charmap preview',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime table contextmenu paste code'
		  ],
		  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
		});
	</script>
@endsection