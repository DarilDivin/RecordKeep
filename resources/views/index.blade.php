@extends('user.layouts.template')

@section('title')
    Présentation
@endsection



@section('content')
    @include('user.layouts.partials.navbar')

    {{-- <style>
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } */
        .loaderBody {
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            /* background: #007BFF; */
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        path {
            color: #00b7ff;
        }
        g {
            transition: .4s ease ;
            transition-delay: 1s;
            /* animation: fill infinite ease;
            animation-delay: 2s;
            animation-duration: 5s;
            animation-name: fill;
            animation-timing-function: ease-in;
            animation-direction: alternate; */
        }

        @keyframes fill {
            from {
                fill: #fff;
            }
            to {
                fill: #00b7ff;
            }
        }

        /* Styles pour la barre de chargement */
        .loader-container {
            width: 30%;
            height: 5px; /* Hauteur de la barre de chargement */
            background-color: #33333315; /* Couleur de fond */
            position: fixed;
            top: 75%;
            /* left: 30%; */
            z-index: 9999;
            border-radius: 5px;
            overflow: hidden;
        }

        .loader-bar {
            width: 0; /* Largeur initiale de la barre de chargement */
            height: 100%;
            background-color: #00b7ff; /* Couleur de la barre de chargement */
            transition: width 0.3s ease-in-out;
        }
    </style>

    <div class="loaderBody" id="loader-wrapper">
        <div class="container">
            <div id="lineDrawing" style="height: 100vh;">
                <svg viewBox="-190 -50 800 200" style="height: 100%; width: 100%;">
                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-width="1" class="lines" style="background: #74c3d8;">
                        <path class="cls-1" d="M22.82,48.57,17.18,79.42a17.07,17.07,0,0,0,3.22.4A15.48,15.48,0,0,0,25,79l-.42,2.85a17,17,0,0,1-4.35.81,41.82,41.82,0,0,1-4.82-.41,33.56,33.56,0,0,0-4.65-.4A27.07,27.07,0,0,0,3,83.13l.62-3.25c3.08-1.08,5.07-2.15,6-3.19q2.1-2.5,3.23-8.78l5.86-32.47a73.21,73.21,0,0,0,1.09-7.32,2.17,2.17,0,0,0-.52-1.57,2.88,2.88,0,0,0-2.08-.47l.55-2.78a32.63,32.63,0,0,0,10.11-2.15c-.34,1.47-.77,3.64-1.31,6.51L23.38,44.79a12.5,12.5,0,0,0,3.39.58q5.25,0,9-5.08a19.81,19.81,0,0,0,3.73-12.06,13.11,13.11,0,0,0-3-8.88,10.16,10.16,0,0,0-8.14-3.49,22.11,22.11,0,0,0-12.86,4.42,28.25,28.25,0,0,0-9.42,11A31.21,31.21,0,0,0,2.93,44.91,14.09,14.09,0,0,0,6.16,54.2a13.76,13.76,0,0,1,2,2.79,4.49,4.49,0,0,1,.38,1.86A3.55,3.55,0,0,1,7.9,61a1.91,1.91,0,0,1-1.58.9q-2.28,0-4.05-3.66A27.2,27.2,0,0,1,0,46.48,39.42,39.42,0,0,1,3.56,29.8,31.54,31.54,0,0,1,14.36,17a26.14,26.14,0,0,1,15.23-5q7.47,0,12.28,3.89t4.82,11.5a22.41,22.41,0,0,1-4.41,13.31,19.79,19.79,0,0,1-12.16,7.9q1.92,5.34,2.47,7.2.87,3.13,2.67,10.57Q39.49,83.77,44,90.88q3.34,5.2,7.25,5.21t5.15-5a12,12,0,0,1,1.26-3.92,2.24,2.24,0,0,1,1.8-1,2.05,2.05,0,0,1,1.7,1,4.08,4.08,0,0,1,.69,2.39A10.28,10.28,0,0,1,59,96.32a9.31,9.31,0,0,1-7.33,3.26,12.93,12.93,0,0,1-7.78-2.73q-3.7-2.73-7.2-8.93A72.26,72.26,0,0,1,30.61,73q-1.29-4.36-3.81-16c-1-4.73-1.63-7.55-1.88-8.48l-1-.12A6.74,6.74,0,0,0,22.82,48.57Z"/>
                        <path class="cls-1" d="M72.64,67.22,74,69.77Q63.76,83.32,56.42,83.31a5,5,0,0,1-4.55-2.79q-1.57-2.79-1.57-9a60.81,60.81,0,0,1,5.45-24.75q6.12-14,14.63-14a5.34,5.34,0,0,1,4.54,2.07,9.11,9.11,0,0,1,1.58,5.66A16.05,16.05,0,0,1,74.61,48a25.54,25.54,0,0,1-6.75,7.61q-2.43,1.92-10.39,6.91a48.51,48.51,0,0,0-.38,6q0,4.13.94,5.76a3,3,0,0,0,2.75,1.62,7.06,7.06,0,0,0,3.77-1.33A55.18,55.18,0,0,0,72.64,67.22ZM58,58.79a34.16,34.16,0,0,0,10.14-9,11.8,11.8,0,0,0,2.31-6.68,7.39,7.39,0,0,0-.94-4A2.82,2.82,0,0,0,67,37.65a4.12,4.12,0,0,0-3,1.62,17.06,17.06,0,0,0-3.32,6.51A77.14,77.14,0,0,0,58,58.79Z"/>
                        <path class="cls-1" d="M102.86,69.19l.88,3.37q-10,10.86-16.85,10.86a5.52,5.52,0,0,1-5.3-3.6,21.77,21.77,0,0,1-1.66-9.12,55.35,55.35,0,0,1,3.52-18.88Q87,42.12,92,37a12.19,12.19,0,0,1,8.89-4,6.29,6.29,0,0,1,4.7,1.63,5.43,5.43,0,0,1,1.59,4,4.78,4.78,0,0,1-.84,2.93A2.74,2.74,0,0,1,104,42.58c-1,0-2.23-.62-3.77-1.86s-2.92-2-4-2q-2.05,0-4.09,2.58t-3.88,10a61.59,61.59,0,0,0-1.84,14.9q0,5.52,1.55,8.53a3.5,3.5,0,0,0,3.19,2.32Q96.07,77.09,102.86,69.19Z"/>
                        <path class="cls-1" d="M129.81,32.94q4.11,0,6.83,4.53t2.73,12.61a42.13,42.13,0,0,1-6.54,23.15Q126.29,83.48,119,83.48a8.36,8.36,0,0,1-7.23-4.06Q109,75.35,109,68.32a50.88,50.88,0,0,1,5-22.54Q120.38,32.94,129.81,32.94Zm-3.56,4.36c-2.38,0-4.67,2.35-6.9,7.06S116,55.56,116,63.85q0,7.54,2.06,11.91,1.5,3.19,4,3.19,3.53,0,6.41-6,3.69-7.84,3.69-19.46,0-8.72-1.7-12.43T126.25,37.3Z"/>
                        <path class="cls-1" d="M151.11,81.8h-6.25l2.93-15.63q2.15-11.51,3.73-21.84a29.34,29.34,0,0,0,.38-3.2c0-.93-.31-1.39-.92-1.39-.42,0-1.06.39-1.93,1.19a48.44,48.44,0,0,0-4.69,5.89l-1.3-2a36.34,36.34,0,0,1,8-9c2.67-2,4.71-3,6.14-3a1.51,1.51,0,0,1,1.19.5,1.77,1.77,0,0,1,.44,1.25,35.63,35.63,0,0,1-.55,4l-1.82,10.45a74.28,74.28,0,0,1,9.58-15.87Q168.61,30,170.34,30a2.51,2.51,0,0,1,2.1,1.13,4.66,4.66,0,0,1,0,5.31q-.81,1.11-4.08,2.62a16.66,16.66,0,0,0-5,3.49,30.62,30.62,0,0,0-4.27,6.21,37.71,37.71,0,0,0-3.25,7.3q-.93,3.1-2.81,14.43Z"/>
                        <path class="cls-1" d="M201.36,69.77,202.54,72a71.52,71.52,0,0,1-8.35,8.71q-3.76,3-5.95,3a2,2,0,0,1-1.63-.79A2.74,2.74,0,0,1,186,81.1a18.38,18.38,0,0,1,.46-3.25l1.47-7.1q-5,7.5-8.39,10.17t-6,2.68c-1.48,0-2.73-.9-3.73-2.7s-1.51-4.45-1.51-7.94q0-8.26,4.09-19t9.09-15.88q5-5.15,9.16-5.15a14.41,14.41,0,0,1,2.77.41,115.54,115.54,0,0,1,3.77-16.5,32.23,32.23,0,0,1,4.65-9,21,21,0,0,1,6.52-5.83A14.14,14.14,0,0,1,215.15,0a3.33,3.33,0,0,1,2.69,1.22,4.67,4.67,0,0,1,1,3.08,4.51,4.51,0,0,1-.92,2.93,3.08,3.08,0,0,1-2.52,1.14,23.87,23.87,0,0,1-3.91-.59,24.82,24.82,0,0,0-3.91-.58A3.37,3.37,0,0,0,205,8.45c-.75.83-1.45,2.62-2.12,5.36q-.67,2.63-3,16.68L193.9,65.58a63.07,63.07,0,0,0-1.05,8.26c0,1.47.41,2.21,1.22,2.21a3.14,3.14,0,0,0,1.76-.76A63,63,0,0,0,201.36,69.77Zm-8.88-30a18.85,18.85,0,0,0-4.74-1.05q-2.81,0-5.49,3.06t-5.18,11.84a57.29,57.29,0,0,0-2.49,15.3,9.2,9.2,0,0,0,1.15,4.86c.77,1.26,1.64,1.89,2.62,1.89,1.17,0,2.52-.72,4-2.15a23.31,23.31,0,0,0,5.12-7.8q1.13-2.91,3.06-14.26Z"/>
                        <path class="cls-1" d="M264.57,13.25l-.25,1.45a19,19,0,0,0-5.62,2.9,44.24,44.24,0,0,0-6,6.34,164.24,164.24,0,0,1-17.47,18.64,43.14,43.14,0,0,1,3.65,8.2q1.52,4.53,5.25,20.85,3.36,14.58,6.84,19.7t7.09,5.11c2.32,0,3.9-1.71,4.74-5.11a12.49,12.49,0,0,1,1.3-3.72,2.15,2.15,0,0,1,1.68-.93,2.1,2.1,0,0,1,1.72,1,3.76,3.76,0,0,1,.71,2.29,10,10,0,0,1-3,6.74,9.79,9.79,0,0,1-7.55,3.25,12,12,0,0,1-7.49-2.78,25.06,25.06,0,0,1-6.48-8.78q-2.94-6-6-18.53Q234.87,58,233.31,53.59A57.72,57.72,0,0,0,229,44.32l-4.44,23.53Q223.2,75,222.87,78.08A10.31,10.31,0,0,0,228,79.76a13.6,13.6,0,0,0,1.56-.11l-.55,2.9-1,.06A27.24,27.24,0,0,1,224,82.2a30.38,30.38,0,0,0-4.39-.4,51.93,51.93,0,0,0-11,1.86l.26-2.79c2.67-.74,4.54-1.75,5.63-3.05a14.91,14.91,0,0,0,2.58-6.13q2.23-9.4,5.79-28.29L228,16.5q-8.28.69-13.1,5.23a10.24,10.24,0,0,0-3.72,7.67,9.94,9.94,0,0,0,1,3.83,8.73,8.73,0,0,1,.94,3.37,4.71,4.71,0,0,1-.83,2.76,2.4,2.4,0,0,1-2,1.19q-1.29,0-2.31-1.8A9.63,9.63,0,0,1,207,34a21.25,21.25,0,0,1,5.8-14.56Q218.61,13,233,13h2.72q-2.3,8.29-3,12l-3.33,17.61A34.18,34.18,0,0,0,236.57,37q4.14-3.93,8-8.34,7-8.13,8-9.88a2.17,2.17,0,0,0,.29-1c0-.31-.28-.59-.86-.85a18.77,18.77,0,0,0-4.84-.49l.55-3.25a71.61,71.61,0,0,0,8.8.69A55.64,55.64,0,0,0,264.57,13.25Z"/>
                        <path class="cls-1" d="M285.49,67.22l1.38,2.55q-10.28,13.55-17.6,13.54a5,5,0,0,1-4.55-2.79q-1.58-2.79-1.57-9a60.65,60.65,0,0,1,5.45-24.75q6.11-14,14.62-14a5.36,5.36,0,0,1,4.55,2.07,9.11,9.11,0,0,1,1.57,5.66A16.16,16.16,0,0,1,287.46,48a25.54,25.54,0,0,1-6.75,7.61q-2.43,1.92-10.4,6.91a50.46,50.46,0,0,0-.37,6q0,4.13.94,5.76a3,3,0,0,0,2.74,1.62,7.07,7.07,0,0,0,3.78-1.33A55.18,55.18,0,0,0,285.49,67.22Zm-14.67-8.43a34.16,34.16,0,0,0,10.14-9,11.8,11.8,0,0,0,2.31-6.68,7.3,7.3,0,0,0-.95-4,2.81,2.81,0,0,0-2.45-1.48,4.16,4.16,0,0,0-3,1.62,17.2,17.2,0,0,0-3.31,6.51A77.14,77.14,0,0,0,270.82,58.79Z"/>
                        <path class="cls-1" d="M314.66,67.22,316,69.77q-10.26,13.55-17.6,13.54a5,5,0,0,1-4.55-2.79q-1.58-2.79-1.57-9a60.81,60.81,0,0,1,5.45-24.75q6.12-14,14.63-14a5.34,5.34,0,0,1,4.54,2.07,9.11,9.11,0,0,1,1.58,5.66A16.05,16.05,0,0,1,316.63,48a25.54,25.54,0,0,1-6.75,7.61q-2.43,1.92-10.39,6.91a50.55,50.55,0,0,0-.38,6q0,4.13.94,5.76a3,3,0,0,0,2.75,1.62,7.06,7.06,0,0,0,3.77-1.33A55.18,55.18,0,0,0,314.66,67.22ZM300,58.79a34.16,34.16,0,0,0,10.14-9,11.8,11.8,0,0,0,2.31-6.68,7.39,7.39,0,0,0-.94-4A2.82,2.82,0,0,0,309,37.65a4.12,4.12,0,0,0-3,1.62,17.06,17.06,0,0,0-3.32,6.51A77.14,77.14,0,0,0,300,58.79Z"/>
                        <path class="cls-1" d="M322.5,47.35,320.86,45a35.34,35.34,0,0,1,7.59-9.35q3.78-3,6.54-3a2,2,0,0,1,1.66.73,3.25,3.25,0,0,1,.6,2.12A22.87,22.87,0,0,1,337,39q-.27,1.77-1.7,8.4,6.42-8.9,8.76-11c2.63-2.36,5-3.55,7.21-3.55q2.14,0,3.61,2.79c1,1.86,1.46,4.67,1.46,8.43A59,59,0,0,1,350,70.76q-6.33,12.66-14,12.66a10,10,0,0,1-6-2.26l-3.58,19.17a15.2,15.2,0,0,0-.34,2.85,3.71,3.71,0,0,0,1.17,3.08c1.21,1,3.74,1.76,7.59,2.38l-.54,2.9a102.07,102.07,0,0,0-10.61-.75,91.4,91.4,0,0,0-10.31.75l.55-2.9a6.66,6.66,0,0,0,4.63-2.44c1-1.32,1.74-3.66,2.32-7l7.59-44.1q2.15-12.32,2.14-13.71c0-1-.35-1.51-1-1.51Q327.7,39.85,322.5,47.35ZM331,74.77q3.31,4.59,6.78,4.59,5,0,8.81-10.87a64.06,64.06,0,0,0,3.79-21.2,9.66,9.66,0,0,0-1.06-5,3.26,3.26,0,0,0-2.87-1.71c-1.34,0-2.84.91-4.52,2.73A36.64,36.64,0,0,0,336,51.7q-1.46,3-2.76,10.46Z"/>
                        <path class="cls-1" d="M381.6,67.22,383,69.77q-10.26,13.55-17.6,13.54a5,5,0,0,1-4.55-2.79q-1.57-2.79-1.57-9a60.65,60.65,0,0,1,5.45-24.75q6.12-14,14.63-14a5.34,5.34,0,0,1,4.54,2.07,9.11,9.11,0,0,1,1.58,5.66A16.05,16.05,0,0,1,383.57,48a25.54,25.54,0,0,1-6.75,7.61q-2.43,1.92-10.39,6.91a48.51,48.51,0,0,0-.38,6q0,4.13.94,5.76a3,3,0,0,0,2.75,1.62,7.06,7.06,0,0,0,3.77-1.33A55.18,55.18,0,0,0,381.6,67.22Zm-14.67-8.43a34.16,34.16,0,0,0,10.14-9,11.8,11.8,0,0,0,2.31-6.68,7.3,7.3,0,0,0-.95-4A2.8,2.8,0,0,0,376,37.65a4.16,4.16,0,0,0-3,1.62,17.2,17.2,0,0,0-3.31,6.51A77.14,77.14,0,0,0,366.93,58.79Z"/>
                        <path class="cls-1" d="M396.56,81.8h-6.24l2.93-15.63Q395.4,54.67,397,44.33c.25-1.71.38-2.77.38-3.2,0-.93-.31-1.39-.92-1.39-.42,0-1.06.39-1.93,1.19a48.16,48.16,0,0,0-4.7,5.89l-1.29-2a36.34,36.34,0,0,1,8-9c2.67-2,4.71-3,6.14-3a1.51,1.51,0,0,1,1.19.5,1.77,1.77,0,0,1,.44,1.25,35.63,35.63,0,0,1-.55,4l-1.82,10.45a74.26,74.26,0,0,1,9.57-15.87Q414.08,30,415.8,30a2.51,2.51,0,0,1,2.1,1.13,4.29,4.29,0,0,1,.84,2.64,4.37,4.37,0,0,1-.82,2.67c-.54.74-1.91,1.61-4.08,2.62a16.66,16.66,0,0,0-5,3.49,30.62,30.62,0,0,0-4.27,6.21,37.1,37.1,0,0,0-3.25,7.3q-.93,3.1-2.82,14.43Z"/>
                    </g>
                </svg>
            </div>
            <!-- Barre de chargement -->
            <div class="loader-container">
                <div class="loader-bar" id="loader-bar"></div>
            </div>
        </div>
    </div> --}}



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
                <img src="storage/images/demandepret.png" alt="">

                <p>
                    Une fois les documents disponibles, vous pouvez effectuer des prêts pour certains documents.
                </p>

            </swiper-slide>
            <swiper-slide>
                <img src="storage/images/paramètre.png" alt="">

                <p>
                    {{-- L'application propose une puissante fonction de recherche qui vous permet de retrouver des fichiers ou des dossiers par nom, date, ou autres critères. --}}
                    L'application vous propose un puissant système d'authentification vous permettant d'effectuer une double authentification afin de protéger plus efficacement vos données.
                    Veiller activer la double authentification.
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
