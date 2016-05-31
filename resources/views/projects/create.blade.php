@extends('layouts.app')

@section('title', 'Créer un nouveau projet')

@section('content')
<div style="position:relative" class="ui two column middle aligned very relaxed divided stackable grid">
	<div class="eleven wide column">
	    <h1>Créer un nouveau projet</h1>
	    <div class="ui form">
	        <form action="{{ route('project.create') }}" method="post">
	        	<div class="field">
	            	<label for="title">Nom du projet</label>
                    <div class="ui left icon input">
                        <input placeholder="Nom du projet" name="title" id="title" type="title" value="{{ old('title') }}">
                        <i class="write icon"></i>


                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
            	</div>

  				<div class="field">
    				<label for="city_id">Ville</label>
					<select name="city_id" id="city_id" class="ui dropdown">
						@foreach($cities as $city)
							<option value="{{ $city->id }}" @if (($id == $city->id) || (old('city') == $city->id)) selected @endif>{{ $city->name }}</option>
						@endforeach
					</select>
  				</div>

				<div class="field">
    				<label for="description">Description</label>
					<textarea name="description" id="description" placeholder="Présentez votre projet aux autres utilisateurs">{{ old('description') }}</textarea>
				</div>

	            {!! csrf_field() !!}
	            <button type="submit" class="ui blue submit button">Publier le projet !</button>
	        </form>
	    </div>
	</div>

	<div class="five wide column">
		<h4 class="ui header"><i class="write icon"></i>Nom de votre projet</h4>
		<p>Choisissez le nom de votre projet de sorte que les utilisateurs puissent rapidement identifier de quoi il s'agit.</p>
		<h4 class="ui header"><i class="marker icon"></i>Lieu d'installation</h4>
		<p>Sélectionner la ville ou sera situé votre projet, afin de pouvoir mieux le repertorié.</p>
		<h4 class="ui header"><i class="help icon"></i>Description</h4>
		<p>Décrivez votre projet en expliquant son ojectif, ses besoins, ses points forts, ses faiblesses...</p>
	</div>
</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('select.dropdown')
	  		.dropdown()
		;
	</script>

	{{-- TinyMCE --}}
	<script src="{{ URL::to('js/tinymce/tinymce.min.js') }}"></script>
	<script>
		tinymce.init({
		  selector: 'textarea',
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