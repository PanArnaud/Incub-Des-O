<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>@yield('title') - {{ env('APP_NAME') }}</title>
	<link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
</head>
<body>
	@include('partials.nav')

	<div class="ui container">
		<div class="ui divider"></div>
				@yield('content')
	    </div>
	</div>
	<br>

	@include('partials.footer')

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/semantic.min.js') }}"></script>
	<script src="{{ asset('js/sweetalert.js') }}"></script>
	@yield('scripts')
	<script>
		$('.ui.dropdown')
  			.dropdown();
	</script>
	<script>
        @if (notify()->ready())
            swal({
                title: "{!! notify()->message() !!}",
                text: "{!! notify()->option('text') !!}",
                type: "{{ notify()->type() }}",
                @if (notify()->option('timer'))
                    timer: "{{ notify()->option('timer') }}",
                @endif
            });
        @endif    
    </script>    
</body>
</html>