@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="ui grid">
    	<div class="two column row">
		    <div class="twelve wide column grid">
		    	<h2 class="ui header dividing">Projets récemment actifs</h2>
		    	<div class="ui divided items">
					<div class="item">
						<div class="ui image small">
							<a href="">
							  	<img  class="ui rounded image" src="http://www.terrasse-bois-nantes.com/images/presentation/slider/terrasse_bois_04.jpg">
							</a>
						</div>
						<div class="content">
						  	<a href="" class="header">Construction de terrasse en bois</a>
						  	<div class="meta">
						    	<span>Le Tampon</span> - Par <span><strong><a href="">DadaArno</a></strong></span>
						  	</div>
						  	<div class="description">
						    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, dolores nemo nostrum, tempore explicabo labore omnis laborum beatae, facilis voluptatibus voluptates temporibus nam doloremque ex molestias similique unde ducimus fugiat velit possimus aliquam natus libero. Cupiditate perferendis modi et maxime nulla voluptates possimus voluptas, qui officia accusamus doloremque consequuntur aspernatur dolores obcaecati repellat sunt aperiam eligendi optio? Accusamus quis vitae distinctio voluptatibus hic eveniet debitis. Expedita, saepe. Provident amet, consequuntur nisi ea numquam possimus ipsam.</p>
						  	</div>
					  		<div class="extra">
					  			<a href="">3 commentaires</a> 
								<div class="ui right floated star rating" data-rating="2" data-max-rating="5"></div>
					  		</div>
						</div>
					</div>
					<div class="item">
						<div class="ui image small">
							<a href="">
							  	<img class="ui rounded image" src="http://www.anniversaire-974.fr/s/cc_images/cache_9717399.jpg?t=1370766129">
							</a>
						</div>
						<div class="content">
						  	<a class="header">Activité de vacances pour enfants de maternelle/primaire</a>
						  	<div class="meta">
						    	<span>Saint-Louis</span> - Par <span><strong><a href="">Manuella</a></strong></span>
						  	</div>
						  	<div class="description">
						    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem vero eos quas aliquid, id provident non pariatur molestiae ullam perferendis accusantium, velit explicabo magni adipisci.</p>
						  	</div>
					  		<div class="extra">
					  			<a href="">14 commentaires</a> 
								<div class="ui right floated star rating" data-rating="4" data-max-rating="5"></div>
					  		</div>
						</div>
					</div>
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
