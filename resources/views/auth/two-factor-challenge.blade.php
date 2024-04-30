@extends('auth.layout.template')

@section('title', 'Connexion')

@section('content')
    <div class="container">
        <h3>Entrer votre code d'authentification pour vous connecter</h3>
        @if ($errors->any())
            <div class="connexion message error">
                @foreach ($errors->all() as $error)
                    <span style="color: red;">{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <form action="{{ url('/two-factor-challenge') }}" class="connexion connexion-form" method="POST">
            @csrf
            <input type="text" name="code" id="" placeholder="Code" class="input">

            {{-- <input type="text" name="recovery_code" id="" placeholder="Code" class="input"> --}}

            <button type="submit">Se connecter</button>
        </form>

        <form action="{{ url('/two-factor-challenge') }}" class="connexion connexion-form" method="POST">
            @csrf
            {{-- <input type="text" name="code" id="" placeholder="Code" class="input"> --}}

            <input type="text" name="recovery_code" id="" placeholder="Code de recupération" class="input">

            <button type="submit">Se connecter</button>
        </form>
    </div>
@endsection



