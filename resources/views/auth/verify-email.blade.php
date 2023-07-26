@extends('auth.layout.template')

@section('title', 'Connexion')

@section('content')
    <div class="container">
        <h3>You must verify you email address, please check your mail for a verification link.</h3>
        @if (session('status'))
        <div class="connexion message success">
            <p style=" color: green;">{{ session('status') }}</p>
        </div>
        @endif
        <form action="{{ route('verification.send') }}" class="connexion-form" method="POST">
            @csrf

            <button type="submit" style="align-self: center">Renvoyer le mail</button>
        </form>
    </div>
@endsection



