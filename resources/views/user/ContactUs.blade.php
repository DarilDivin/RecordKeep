@extends('user.layouts.template')

@section('title')
    Nous contacter
@endsection

@section('content')

    @include('user.layouts.partials.navbar')
    <section class="contact">
        <div class="content">
            <h2>Contactez Nous</h2>
            <p>
                Cette page est votre point de contact direct avec notre équipe. Vous pouvez l'utiliser pour poser des questions, signaler des problèmes, demander de l'aide ou fournir des commentaires. C'est l'endroit idéal pour obtenir une assistance technique, discuter de vos préoccupations, ou tout simplement en savoir plus sur notre entreprise, nos produits et nos services. Nous sommes là pour vous aider, alors n'hésitez pas à nous écrire. Votre avis compte et nous sommes là pour vous écouter.
            </p>
        </div>
        <div class="contactContainer">
            <div class="contactInfo">
                <div class="contactBox">
                    <div class="icon"><ion-icon name="location-outline"></ion-icon></div>
                    <div class="texte">
                        <h3>Adresse</h3>
                        <p>Cadjèhoun,<br>Owatonna,Minnesota,<br>55025060</p>
                    </div>
                </div>
                <div class="contactBox">
                    <div class="icon"><ion-icon name="call-outline"></ion-icon></div>
                    <div class="texte">
                        <h3>Téléphone</h3>
                        <p>000-000-0000</p>
                    </div>
                </div>
                <div class="contactBox">
                    <div class="icon"><ion-icon name="mail-outline"></ion-icon></div>
                    <div class="texte">
                        <h3>Email</h3>
                        <p>interieur@gmail.com</p>
                    </div>
                </div>
                <h2 class="txt">Connectez-vous avec nous</h2>
                <ul class="sci">
                    <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                </ul>
            </div>

            <div class="contactForm">
                @if (session('success'))
                    <div class="message success">
                        {{ session('success') }}
                    </div>
                @endif
                 <form method="POST" action="{{ route('contactUsSend') }}">
                    @csrf
                    @method('POST')
                    <h2>Send Message</h2>
                    <div class="inputCoBox">
                        <input type="text" name="nom" required="required">
                        <span>Nom complet</span>
                    </div>
                    <div class="inputCoBox">
                        <input type="text" name="mail" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputCoBox">
                        <textarea required="required" name="message"></textarea>
                        <span>Tapez votre Message...</span>
                    </div>
                    <div class="inputCoBox">
                        <input type="submit" value="Send">
                    </div>
                 </form>
            </div>
        </div>
    </section>

@endsection
