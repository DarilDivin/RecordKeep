@extends('auth.layout.template')

@section('title', 'Connexion')

@section('content')
    <div class="container">
        <h3>Connexion</h3>
            @if ($errors->any())
                <div class="connexion message error">
                @foreach ($errors->all() as $error)
                    <span style="color: red;">{{ $error }}</span>
                @endforeach
                </div>
            @endif
        <form action="{{ route('login') }}" class=" connexion connexion-form" method="POST">
            @csrf

            <input type="email" name="email" id="" placeholder="Mail" class="input">
            <input type="password" name="password" id="" placeholder="Mot de passe" class="input">

            <div class="checkbox-container">
                <input type="checkbox" name="remember" id="remember" class="checkbox">
                <label for="remember"><p>Me rappeler</p></label>
            </div>

            <button type="submit">Se connecter</button>
        </form>
        <div class="connexion connexion-option">
            <a href="{{ route('password.request') }}"><small>Mot de passe oublié?</small></a>
            {{-- <p>Don't have an account? <a href=" {{ route('register') }}">Register</a></p> --}}
        </div>
    </div>
@endsection


