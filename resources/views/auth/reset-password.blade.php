@extends('auth.layout.template')

@section('title', 'Connexion')

@section('content')
    <div class="container">
        <h3>Réinitialiser mot de passe</h3>
        @if ($errors->any())
            <div class="connexion message error">
                @foreach ($errors->all() as $error)
                    <span style="color: red;">{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <form action="{{ route('password.update') }}" class="connexion connexion-form" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <input type="email" name="email" id="" value="{{ $request->email }}" class="input">
            <input type="password" name="password" id="" placeholder="Mot de passe" class="input">
            <input type="password" name="password_confirmation" id="" placeholder="Confirmer Mot de passe" class="input">

            <button type="submit">Mettre à jour</button>
        </form>

        <div class="connexion connexion-option">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
@endsection


