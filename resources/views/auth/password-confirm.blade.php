@extends('auth.layout.template')

@section('title', 'Confirmation de mot de passe')

@section('content')
    <div class="container">
        <h3>Confirmer votre mot de passe</h3>
        @if ($errors->any())
            <div class="connexion message error">
                @foreach ($errors->all() as $error)
                    <span style="color: red;">{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <form action="{{ url('user/confirm-password') }}" class="connexion connexion-form" method="POST">
            @csrf
            <input type="password" name="password" id="" placeholder="Mot de passe" class="input">

            <button type="submit">Se connecter</button>
        </form>
    </div>
@endsection



