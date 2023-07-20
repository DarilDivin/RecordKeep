@extends('user.layouts.template')

@section('title')
    Accueil
@endsection

@section('style')
@vite(['resources/css/app.css', 'resources/js/home.js'])
@endsection

@include('user.layouts.partials.navbar')

@section('content')
    <div class="connexion-message">

        @if ( true
            // ! auth()->user()->two_factor_secret
            )
            <div class="twofa-message error">
                <h3>
                    Vous n'avez pas activé la double authentification
                </h3>
                <form
                {{-- action="{{ url('user/two-factor-authentication') }} --}}
                " method="POST">
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
                    Vous avez activé la double authentification
                </h3>
                <form
                {{-- action="{{ url('user/two-factor-authentication') }}" --}}
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
                <p>Scanner le code Qr pour terminer la configuration de la double authentification</p>

                <div class="Qrcode">
                    {{!! auth()->user()->twoFactorQrCodeSvg() !!}}
                </div>

                <p>Conserver ces codes de récupérations au cas où.</p> <br>
                <ul>
                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                        <li>{{ trim($code) }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <section class="search-zone">
        <form action="" method="post" class="search-form">
            <input type="search"  class="search-bar" placeholder="Rechercher..." minlength="1">
            <ion-icon name="search"></ion-icon>
        </form>
    </section>

    <section class="infos-zone">
        <div class="info-container">
            <h3 class="info-title">This is the information title</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit ipsum laudantium vero delectus iure corrupti itaque aperiam quibusdam. Numquam molestiae aut magnam facere nesciunt, quod a dicta nostrum dolorem facilis vero possimus provident tempore sint assumenda laborum? At illo quod libero officia fugit quisquam, deleniti expedita adipisci eligendi cum! Eaque. <br>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis, iste in expedita consequuntur sed voluptate qui doloremque placeat quae animi necessitatibus adipisci facere quas. Expedita incidunt at aperiam culpa vitae tenetur. Nam, voluptates nobis similique necessitatibus aperiam, sit fugit adipisci illo, eum porro beatae animi? Aut ratione quod eos nostrum.
            </p>
        </div>
    </section>

    <section class="recent">
        <div class="recent-title">
            <h3> Quick Access </h3>
        </div>
        <div class="recent-container">
            <div class="recent-element">
            <a href="#"><ion-icon name="folder"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="folder"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="folder"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="folder"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="folder"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="folder"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="folder"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="folder"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="document-text-outline"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="document-text-outline"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="document-text-outline"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="document-text-outline"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="document-text-outline"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="document-text-outline"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="document-text-outline"></ion-icon></a>
            <p>Nom du document</p>
            </div>
            <div class="recent-element">
            <a href="#"><ion-icon name="document-text-outline"></ion-icon></a>
            <p>Nom du document</p>
            </div>

        </div>
    </section>
@endsection

