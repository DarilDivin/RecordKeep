@extends('auth.layout.template')

@section('title', 'Mot de passe oublié')

@section('content')
    <div class="container">
        <h3>Réinitialiser mot de passe</h3>
        @if (session('status'))
            <div class="connexion message success">
                <p style=" color: green;">{{ session('status') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="connexion message error">
                @foreach ($errors->all() as $error)
                        <span style="color: red;">{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <form action="{{ route('password.request') }}" class="connexion connexion-form" method="POST">
            @csrf
            <input type="email" name="email" id="" placeholder="Email" class="input">

            <button type="submit">Réinitialiser</button>
        </form>

        <div class="connexion connexion-option">
            {{-- <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p> --}}
        </div>
    </div>
@endsection





