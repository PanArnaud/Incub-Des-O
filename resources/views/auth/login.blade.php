@extends('layouts.app')

@section('title', 'Se connecter/S\'incrire')

@section('content')
    <div style="position:relative" class="ui two column middle aligned very relaxed stackable grid">
        <div class="column">
            <div class="ui form">
                <form action="{{ route('auth.login') }}" method="post">
                
                    <div class="field">
                        <label for="email">Email</label>
                            <div class="ui left icon input">
                                <input placeholder="Email" name="email" id="email" type="email" value="{{ old('email') }}">
                                <i class="mail icon"></i>


                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                    </div>
                    <div class="field">
                        <label for="password">Mot de passe</label>
                            <div class="ui left icon input">
                                <input type="password" name="password" id="password">
                                <i class="lock icon"></i>


                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    {!! csrf_field() !!}
                    <button type="submit" class="ui blue submit button">S'inscrire</button>
                </form>
            </div>
        </div>
        
        <div class="ui vertical divider">Ou </div>
        
        <div class="center aligned column">
            <a href="{{ url('/register') }}">
                <div class="ui big green labeled icon button">
                    <i class="signup icon"></i> S'inscrire
                </div>
            </a>
        </div>
    </div>
@endsection
