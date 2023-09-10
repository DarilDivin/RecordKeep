@extends('user.layouts.template')

@section('title')
    Nous contacter
@endsection

@section('content')

    @include('user.layouts.partials.navbar')
    <section class="contact">
        <div class="content">
            <h2>Contactez Nous</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Soluta, ab corporis ad repellendus veniam eveniet tempora nobis
            minus saepe laborum ipsam, quas illo doloremque architecto
            obcaecati error facere repellat temporibus.</p>
        </div>
        <div class="contactContainer">
            <div class="contactInfo">
                <div class="contactBox">
                    <div class="icon"><ion-icon name="location-outline"></ion-icon></div>
                    <div class="texte">
                        <h3>Adresse</h3>
                        <p>402671 Sugar Camp Road,<br>Owatonna,Minnesota,<br>55025060</p>
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
                        <p>wrub7d78i0e@temporary-mail</p>
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
                 <form>
                    <h2>Send Message</h2>
                    <div class="inputCoBox">
                        <input type="text" name="" required="required">
                        <span>Nom complet</span>
                    </div>
                    <div class="inputCoBox">
                        <input type="text" name="" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputCoBox">
                        <textarea required="required"></textarea>
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
