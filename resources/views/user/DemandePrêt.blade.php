@extends('user.layouts.template')

@section('title')
    Demande de prêt
@endsection

@section('style')
    @vite(['resources/css/DocumentPage.css'])
@endsection

@include('user.layouts.partials.navbar')

@section('content')
    <section class="loanRequest">
        <div class="formContainer">
            <h1>Demander un document</h1>
            <form action="" class="loanForm">
                <input type="text" class="docNum" placeholder="Numéro du document">
                <input type="text" class="docName" placeholder="Numéro du document">
                <input type="text" class="docCode" placeholder="Numéro du document">
            </form>
        </div>
    </section>

    <div class="documentView">
        <div class="overlay"></div>
        <div class="view">
            <embed src="../La_culture_générale_by_Florence.pdf" width="400" type="">
            <button class="closeDoc">Fermer</button>
        </div>
    </div>
@endsection
