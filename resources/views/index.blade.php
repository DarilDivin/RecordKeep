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
                Bienvenu sur Record Keep, un tenu de régistre facile du Ministère de l'Intérieur et de la Sécurité Publique de la République du Bénin vous permettant de consulter certains documents accessibles en toute facilté, sécurité et simplicité.
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

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus rem similique perferendis. Vero culpa eaque ratione quibusdam animi, velit facere deleniti consectetur nesciunt nostrum dolorum!</p>
            </swiper-slide>
            <swiper-slide>
                <img src="storage/images/documenthèque.png" alt="">

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus rem similique perferendis. Vero culpa eaque ratione quibusdam animi, velit facere deleniti consectetur nesciunt nostrum dolorum!</p>

            </swiper-slide>
            <swiper-slide>
                <img src="storage/images/documenthèque.png" alt="">

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus rem similique perferendis. Vero culpa eaque ratione quibusdam animi, velit facere deleniti consectetur nesciunt nostrum dolorum!</p>

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
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam vel aliquam, saepe, ut officia accusantium fugiat, ipsum earum voluptatibus autem vero tempore natus placeat voluptates expedita aspernatur porro amet obcaecati!</p>
    </div>

    <div class="advantage">
        <div class="advantage-img" data-aos="fade-left" data-aos-delay="500">
            <img src="storage/images/Inbox cleanup-pana.svg" alt="">
        </div>
        <div class="advantage-text">
            <h2 data-aos="fade-right" data-aos-delay="500">Les avantages à utiliser cette application</h2>
            <p data-aos="fade-down" data-aos-delay="500">
                Bienvenu sur Record Keep, un tenu de régistre facile du Ministère de l'Intérieur et de la Sécurité Publique de la République du Bénin vous permettant de consulter certains documents accessibles en toute facilté, sécurité et simplicité.
            </p>
        </div>
    </div>
@endsection
