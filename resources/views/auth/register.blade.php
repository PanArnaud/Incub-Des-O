@extends('layouts.app')

@section('content')
    <div class="ui two column centered grid">
        <div class="column">
            <h1>S'inscrire</h1>
            <div class="ui form">
                <form action="{{ route('auth.register') }}" method="post">              
                    <div class="field">
                        <label for="username">Nom d'utilisateur</label>
                        <div class="ui left icon input">
                            <input placeholder="Nom d'utilisateur" name="username" id="username" type="username" value="{{ old('username') }}">
                            <i class="user icon"></i>


                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label for="first_name">Prénom</label>
                            <div class="ui left icon input">
                                <input placeholder="Prénom" name="first_name" id="first_name" type="first_name" value="{{ old('first_name') }}">
                                <i class="user icon"></i>

                                 @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="field">
                            <label for="last_name">Nom</label>
                            <div class="ui left icon input">
                                <input placeholder="Nom" name="last_name" id="last_name" type="last_name" value="{{ old('last_name') }}">
                                <i class="user icon"></i>

                                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
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
                            <input placeholder="Mot de passe" type="password" name="password" id="password">
                            <i class="lock icon"></i>


                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="password_confirmation">Confirmation du mot de passe</label>
                        <div class="ui left icon input">
                            <input placeholder="Confirmation du mot de passe" type="password" name="password_confirmation" id="password_confirmation">
                            <i class="lock icon"></i>


                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    {!! csrf_field() !!}
                    <button type="submit" class="ui blue submit button">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>
@endsection
