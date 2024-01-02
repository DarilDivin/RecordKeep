@extends('auth.layout.template')

@section('title', 'Connexion')

@section('content')
    <div class="container">
        <h3>Veillez changer votre mot de passe</h3>
            @if ($errors->any())
                <div class="connexion message error">
                @foreach ($errors->all() as $error)
                    <span style="color: red;">{{ $error }}</span>
                @endforeach
                </div>
            @endif
        <form action="{{ route('changePassword') }}" class="connexion connexion-form" method="POST">
            @csrf

            <input type="password" name="password" id="" placeholder="Mot de passe" class="input">
            <input type="password" name="password_confirmation" id="" placeholder="Confirmer mot de passe" class="input">

            <button type="submit">Confirmer</button>
        </form>
    </div>
@endsection


