@extends('user.layouts.template')

@section('title')
    Paramètres
@endsection

@section('style')
@vite(['resources/css/app.css', 'resources/js/home.js'])
@endsection

@section('content')
    @include('user.layouts.partials.navbar')
    <section class="settings">
        <div class="connexion-message">

            {{-- @if (! auth()->user()->two_factor_secret )
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
            @endif --}}

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
                    Authentification à deux facteurs confirmée et activée avec succès.
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

        <div class="profileContainer">
            <div class="bannerContainer">
                {{-- <img src="storage/images/banniere.jpeg" alt=""> --}}
                {{-- <span class="editbtn">
                    <ion-icon name="create-outline"></ion-icon>
                </span> --}}
            </div>
            <div class="userInfosContainer">

                <div class="profileImgContainer">
                    <img src="storage/images/{{ Auth::user()->sexe == 'Masculin' || Auth::user()->sexe == 'Autre' ? 'profileM' : 'profileF' }}.png" alt="">
                </div>


                <div class="userInfosContent">
                    <div class="userInfos">
                        <h2>{{ Auth::user()->prenoms }} {{ Auth::user()->nom }}</h2>
                        <p>{{ Auth::user()->fonction->fonction }}</p>
                        <p>{{ Auth::user()->direction->direction }}</p>
                        <p>{{ Auth::user()->service->service }}</p>
                        <p>{{ Auth::user()->division->division }}</p>
                        {{-- <div class="btnContainer">
                            <button>Edit Profile</button>
                            <button class="set">Settings</button>
                        </div> --}}
                    </div>

                    <div class="userMore">
                        <div class="habilities">
                            <p>
                                Role(s) courant(s)
                                <ion-icon name="bag-handle-outline"></ion-icon>
                            </p>

                            <div class="roles">
                                @foreach (Auth::user()->roles as $role)
                                    <span>{{ $role->name }}</span>
                                @endforeach
                            </div>
                        </div>

                        {{-- <div class="habilities skills">
                            <p>
                                Skills
                                <ion-icon name="star-outline"></ion-icon>
                            </p>
                            <div class="competences">
                                <span>HTML</span>
                                <span>CSS</span>
                                <span>Dart</span>
                                <span>C++</span>
                                <span>UI Design</span>
                            </div>
                        </div> --}}
                    </div>

                </div>

                <div class="otherInfos">
                    <div class="otherContentContainer twofa">
                        <div class="otherContent">
                            <h3>{{ !auth()->user()->two_factor_secret ? 'Activer' : 'Désactiver' }} la double authentification</h3>
                            <p>La double authentification renforce la sécurité en ajoutant un second niveau d'authentification, réduisant les risques d'accès non autorisé.</p>
                        </div>
                        <div class="otherContentArrow">
                            @if (! auth()->user()->two_factor_secret)
                                <form
                                    action="{{ url('user/two-factor-authentication') }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="success">
                                        Activer
                                    </button>
                                </form>
                            @else
                                <form
                                action="{{ url('user/two-factor-authentication') }}"
                                method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="error">
                                        Désactiver
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

