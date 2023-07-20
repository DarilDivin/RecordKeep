@extends('user.layouts.template')

@section('title')
    Présentation
@endsection

@section('style')
    @vite(['resources/css/style.css', 'resources/js/script.js'])
@endsection

@include('user.layouts.partials.navbar')

@section('content')
    <div class="description-container">
        <div class="description_msg">
            <h2>Accédez à tous les documents de la direction en un clic</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, quaerat illum quo qui dolore earum dolores obcaecati minus, consectetur totam suscipit dignissimos, consequuntur nobis eaque impedit ratione ab odit laborum!
            </p>
            <button class="btn-signin">
                <a href="connexion.html">Se connecter</a>
            </button>
        </div>
        <div class="description_img">
            <img src="/images/Documents-rafiki.svg" alt="document-image">
        </div>
    </div>

    <div class="carousel">
        <div class="image-container" id="imgs">
            <div class="image" >
                <img src="https://media.istockphoto.com/id/1349463167/photo/document-management-system-or-dms-automation-software-to-archiving-and-efficiently-manage-and.jpg?s=2048x2048&w=is&k=20&c=ozNWkDSs1MLDpdT9UUQnBDfzoByYdzn_ev1nW1okxew=" alt="">

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus rem similique perferendis. Vero culpa eaque ratione quibusdam animi, velit facere deleniti consectetur nesciunt nostrum dolorum!</p>
            </div>

            <div class="image">
                <img src="https://media.istockphoto.com/id/1353434584/photo/document-management-system-automation-software-to-archiving-and-efficiently-manage-and.jpg?s=2048x2048&w=is&k=20&c=5M_W4Q1TVIZq6N2GpjPCpNrPRJijDu9Y7CZVF0VO00k=" alt="">

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus rem similique perferendis. Vero culpa eaque ratione quibusdam animi, velit facere deleniti consectetur nesciunt nostrum dolorum!!!!!</p>
            </div>

            <div class="image">
                <img src="https://media.istockphoto.com/id/1414141849/photo/document-management-system-online-document-database-and-automated-processes-to-manage-files.jpg?s=2048x2048&w=is&k=20&c=dNu7zyaDerePwzx31cA0HqGVilV7MvoK62wFJ-LElac=" alt="">

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus rem similique perferendis. Vero culpa eaque ratione quibusdam animi, velit facere deleniti consectetur nesciunt nostrum dolorum!</p>
            </div>
        </div>

        <div class="buttons-container">
            <button id="left" class="btn"> <ion-icon name="chevron-back-outline"></ion-icon> </button>
            <button id="right" class="btn"> <ion-icon name="chevron-forward-outline"></ion-icon> </button>
        </div>
    </div>
    <div class="carousel-text">
        <h3>Découvrez la facilité d’utilisation</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam vel aliquam, saepe, ut officia accusantium fugiat, ipsum earum voluptatibus autem vero tempore natus placeat voluptates expedita aspernatur porro amet obcaecati!</p>
    </div>

    <div class="advantage">
        <div class="advantage-img">
            <img src="/images/Inbox cleanup-pana.svg" alt="">
        </div>
        <div class="advantage-text">
            <h2>Les avantages à utiliser cette application</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod soluta modi iusto obcaecati culpa hic, nihil ut aliquam quaerat recusandae commodi delectus in. Quos maxime sequi possimus doloremque delectus laudantium dolore cumque nemo veritatis explicabo.
            </p>
        </div>
    </div>
@endsection
