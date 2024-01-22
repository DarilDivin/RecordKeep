@extends('user.layouts.template')

@section('title')
    Présentation
@endsection



@section('content')
    @include('user.layouts.partials.navbar')
    <div class="description-container" data-aos="zoom-in-up" data-aos-delay="500">
        <div class="description_msg" data-aos="fade-right" data-aos-delay="1000">
            <h2>Accédez aux documents accessibles en un clic</h2>
            <p>
                Bienvenu sur Record Keeper, une tenue de régistre facile du Ministère de l'Intérieur et de la Sécurité Publique de la République du Bénin vous permettant de consulter certains documents accessibles en toute facilté, sécurité et simplicité.
            </p>
            <button class="btn-signin">
                <a href="{{ route('login') }}">Se connecter</a>
            </button>
        </div>
        <div class="description_img">
            <img src="storage/images/Personal files-rafiki.svg" alt="">
        </div>
    </div>

    <div class="carousel" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="200" data-aos-once="true">
        <swiper-container
        class="mySwiper"
        pagination="true"
        pagination-clickable="true"
        navigation="true"
        space-between="30"
        centered-slides="true"
        autoplay-delay="10000"
        autoplay-disable-on-interaction="false">
            <swiper-slide>
                <img src="storage/images/documenthèque.png" alt="">

                <p>
                    Lorsque vous ouvrez l'application, vous êtes accueilli par une page d'accueil propre et conviviale. Cette page peut contenir des informations sur l'application, des raccourcis vers des fonctionnalités clés, et un bouton de connexion.
                </p>
            </swiper-slide>
            <swiper-slide>
                <img src="storage/images/documenthèque.png" alt="">

                <p>
                    L'application propose une puissante fonction de recherche qui vous permet de retrouver des fichiers ou des dossiers par nom, date, ou autres critères.
                </p>

            </swiper-slide>
            <swiper-slide>
                <img src="storage/images/documenthèque.png" alt="">

                <p>
                    Une fois les documents disponibles, vous pouvez effectuer des prêts pour certains documents.
                </p>

            </swiper-slide>
            <div class="autoplay-progress" slot="container-end">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
            </div>
        </swiper-container>
    </div>
    <div class="carousel-text" data-aos="fade-up">
        <h3>Découvrez la facilité d’utilisation</h3>
        <p>
            L'objectif principal de cette application est de rendre la gestion des archives aussi simple et intuitive que possible pour les utilisateurs. Elle offre une interface utilisateur conviviale et des fonctionnalités de base pour organiser, stocker et récupérer des documents et des fichiers.
        </p>
    </div>

    <div class="advantage">
        <div class="advantage-img" data-aos="fade-left" data-aos-delay="500">
            <img src="storage/images/Inbox cleanup-pana.svg" alt="">
        </div>
        <div class="advantage-text">
            <h2 data-aos="fade-right" data-aos-delay="500">Les avantages à utiliser cette application</h2>
            <p data-aos="fade-down" data-aos-delay="500">
                Une application de gestion des archives simplifie la gestion, l'organisation et l'accès à d'importants documents et informations. Elle offre un stockage sûr, une recherche rapide et des fonctionnalités de suivi pour garantir que toutes les données essentielles sont à portée de main. Cela améliore l'efficacité opérationnelle, réduit les erreurs liées à la gestion papier, et garantit la conformité aux réglementations en matière d'archivage. En fin de compte, elle permet d'économiser du temps, de l'argent et des ressources, tout en offrant une tranquillité d'esprit grâce à la gestion intelligente des données.
            </p>
        </div>
    </div>
@endsection
