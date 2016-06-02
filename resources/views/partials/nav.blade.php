<div class="ui container">
	<div class="ui one column centered grid">
  		<div class="column">
			<div class="ui secondary menu">
				<div class="header item">Incub Des O</div>
				<a href="{{ route('index') }}" class="{{ Request::is('/') ? 'active' : '' }} item">
				  	<i class="home icon"></i> Accueil
				</a>
				
				<div class="ui simple dropdown item">
					<i class="idea icon"></i>Projets
				  	<i class="dropdown icon"></i>
				  	<div class="menu">
				    	<a href="{{ route('project.index') }}" class="item">
				    		Liste des projets
				    	</a>
				    	<a href="{{ route('project.create') }}" class="item">
				    		Ajouter un projet
				    	</a>
				  	</div>
				</div>
				<a class="item">
				  	<i class="help icon"></i> A propos
				</a>

				<div class="right item">
					<div class="ui category search item">
    					<div class="ui transparent icon input">
      						<input class="prompt" placeholder="Recherche..." type="text">
      							<i class="search link icon"></i>
    					</div>
						<div class="results"></div>
  					</div>

				  	@if(Auth::check())
                        <div class="ui simple dropdown item">
							<i class="user icon"></i>{{ Auth::user()->getFullName() }} 
						  	<i class="dropdown icon"></i>
						  	<div class="menu">
						    	<a href="" class="item">
						    		Mon profil
						    	</a>
						    	<div class="divider"></div>
						    	<a href="" class="item">
						    		Mon compte
						    	</a>
						    	<a href="{{ route('auth.logout') }}" class="item">
						    		Déconnexion
						    	</a>
						  	</div>
						</div>
					@else
						<div class="item">
	    					<a href="{{ route('auth.login') }}"><div class="ui primary button">Inscription/Connexion</div></a>
	  					</div>
				  	@endif
				</div>
			</div>
		</div>
  	</div>
</div>