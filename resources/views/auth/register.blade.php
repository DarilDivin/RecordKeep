@extends('auth.layout.template')

@section('title', 'Connexion')

@section('content')
    <div class="container">
        <h3>Inscription</h3>
        @if ($errors->any())
            <div class="connexion message error">
                @foreach ($errors->all() as $error)
                    <span style="color: red;">{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <form action="{{ route('register') }}" class="connexion connexion-form" method="POST">
            @csrf


            <input type="text" name="name" id="" placeholder="Nom" class="input">
            <input type="email" name="email" id="" placeholder="Mail" class="input">
            <input type="password" name="password" id="" placeholder="Mot de passe" class="input">
            <input type="password" name="password_confirmation" id="" placeholder="Confirmer Mot de passe" class="input">

            <button type="submit">Se connecter</button>
        </form>
        <div class="connexion connexion-option">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
@endsection

