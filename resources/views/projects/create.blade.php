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
    				<label for="introduction">Introduction</label>
					<textarea name="introduction" id="introduction" placeholder="Une présentation rapide de votre projet" maxlength="250" rows="3">{{ old('introduction') }}</textarea>
					<div class="textarea_feedback"></div>
				</div>

				<div class="field">
    				<label for="description">Description</label>
					<textarea class="description" name="description" id="description" placeholder="Présentez en détailvotre projet aux autres utilisateurs">{{ old('description') }}</textarea>
				</div>

	            {!! csrf_field() !!}
	            <button type="submit" class="ui blue submit button">Publier le projet !</button>
	        </form>
	    </div>
	</div>

	<div class="five wide column">
		<h4 class="ui header"><i class="write icon"></i>Nom de votre projet</h4>
		<p>Choisissez le nom de votre projet de sorte que les utilisateurs puissent rapidement identifier de quoi il s'agit.</p>
		<br>
		<h4 class="ui header"><i class="marker icon"></i>Lieu d'installation</h4>
		<p>Sélectionner la ville ou sera situé votre projet, afin de pouvoir mieux le repertorié.</p>
		<br>
		<h4 class="ui header"><i class="idea icon"></i>Introduction</h4>
		<p>Résumez votre projet rapidement, afin que les utilisateur du site puissent comprendre l'idée que vous souhaitez développer.</p>
		<br>
		<h4 class="ui header"><i class="help icon"></i>Description</h4>
		<p>Décrivez en détail votre projet en expliquant ses objectifs, ses besoins, ses points forts, ses faiblesses...</p>
	</div>
</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('select.dropdown')
	  		.dropdown()
		;
	</script>

	{{-- Count charaters left --}}
	<script>
		var text_max = 250;

		function update_chars_left(text_max) {
			var text_length = $('#introduction').val().length;
        	var text_remaining = text_max - text_length;

        	$('.textarea_feedback').html(text_remaining + ' caractère' + (text_remaining > 1 ? 's ' : ' ') + 'restant');	
		}

		update_chars_left(text_max);

	    $('#introduction').keyup(function() {
	        update_chars_left(text_max);
	    });
	</script>

	{{-- TinyMCE --}}
	<script src="{{ URL::to('js/tinymce/tinymce.min.js') }}"></script>
	<script>
		tinymce.init({
		  selector: 'textarea.description',
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