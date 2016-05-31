@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="ui grid">
    	<div class="two column row">
		    <div class="twelve wide column grid">
		    	<h2 class="ui header dividing">Projets récemment publiés</h2>
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
							    	<p>{!! substr($project->description, 0, 350) !!}{{ strlen($project->description) > 350 ? "..." : "" }}</p>
							  	</div>
						  		{{-- <div class="extra">
						  			<a href="">3 commentaires</a> 
									<div class="ui right floated star rating" data-rating="2" data-max-rating="5"></div>
						  		</div> --}}
							</div>
						</div>
					@endforeach
		    	</div>
		    </div>
    		<div class="four wide column">
    			<h2 class="ui dividing header">Suivez nous !</h2>
    			<br>
    			<div class="ui two column centered grid">
		    		<a href="#" class="ui tiny circular facebook icon button">
  						<i class="facebook icon"></i>
					</a>
					<a href="#" class="ui tiny circular twitter icon button">
					  	<i class="twitter icon"></i>
					</a>
		    	</div>
		    	<br>
    			<div class="ui blue raised segment">
  					<h4 class="ui header">Incub Des O ? Késako ?</h4>
					<p>Te eum doming eirmod, nominati pertinacia argumentum ad his. Ex eam alia facete scriptorem, est autem aliquip detraxit at. Usu ocurreret referrentur at, cu epicurei appellantur vix. Cum ea laoreet recteque electram, eos choro alterum definiebas in. Vim dolorum definiebas an. Mei ex natum rebum iisque.</p>
				</div>
    		</div>
  		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			$(".rating").rating();
		});
	</script>
@endsection
