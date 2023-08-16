@extends('user.layouts.template')

@section('title')
    Paramètres
@endsection

@section('style')
@vite(['resources/css/app.css', 'resources/js/home.js'])
@endsection

@include('user.layouts.partials.navbar')

@section('content')
    <div class="connexion-message">

        @if (! auth()->user()->two_factor_secret )
            <div class="twofa-message error">
                <h3>
                    La double authentification n'est pas activée
                </h3>
                <form
                    action="{{ url('user/two-factor-authentication') }}"
                    method="POST">
                    @csrf
                    <button type="submit"
                            style="background: #31dc01;
                                color: #fff;
                                border: none;
                                border-radius: 8px;
                                padding: 10px 20px;
                                cursor: pointer;
                                font-weight: bold;">
                        Enable
                    </button>
                </form>
            </div>
        @else
            <div class="twofa-message success">
                <h3>
                    La double authentification est activée
                </h3>
                <form
                action="{{ url('user/two-factor-authentication') }}"
                method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            style="background: #ff0000;
                                color: #fff;
                                border: none;
                                border-radius: 8px;
                                padding: 10px 20px;
                                cursor: pointer;
                                font-weight: bold;">
                        Disable
                    </button>
                </form>
            </div>
        @endif

        @if (session('status') == 'two-factor-authentication-enabled')
            <div class="recovery-container">
                <div class="QrContainer">
                    <div class="QrMessage">
                        <h3>Scanner le code Qr pour terminer la configuration de la double authentification</h3>
                    </div>

                    <div class="Qrcode">
                        {{!! auth()->user()->twoFactorQrCodeSvg() !!}}
                    </div>
                </div>
                <form action="{{ url('user/confirmed-two-factor-authentication') }}" method="POST">
                    <h3>Entrer ici le code de vérification obtenue à partir de Code Qr</h3>
                    @csrf
                    <input type="text" name="code" class="input">
                    <button type="submit">Confirmer</button>
                </form>
            </div>
        @endif

        @if (session('status') == 'two-factor-authentication-confirmed')
            <div class="twofa-message success">
                Two factor authentication confirmed and enabled successfully.
            </div>

            <div class="recuperation">
                <p>Conserver ces codes de récupérations dans un lieu sécuriser.</p> <br>
                <ul>
                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                        <li> - {{ trim($code) }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

