@extends('user.layouts.template')

@section('title')
    Demande de prêt
@endsection

{{-- @section('style')
    @vite(['resources/css/DocumentPage.css'])
@endsection --}}

@include('user.layouts.partials.navbar')

@section('content')
    <section class="voirInfosDoc">
        <div class="voirDoc">
            <div class="doc">
            <a href="#"><ion-icon name="document-text"></ion-icon></a>
            <div class="badge disponibilite">
                    <p>Disponible au prêt</p>
            </div>
            </div>
        </div>
        <div class="infosDoc">
            <table class="table">
                <tr>
                    <td>Libellé</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                </tr>
                <tr>
                    <td>Objet</td>
                    <td>Demande de quelque chose</td>
                </tr>
                <tr>
                    <td>Source</td>
                    <td>DPAF</td>
                </tr>
                <tr>
                    <td>Date du courier</td>
                    <td>25/05/2023</td>
                </tr>
                <tr>
                    <td>Nature</td>
                    <td>Lettre</td>
                </tr>
            </table>
        </div>
    </section>

    <section class="plusInfos">
        <table class="table">
            <tr>
                <td>Libellé</td>
                <td>Lorem ipsum dolor sit amet.</td>
            </tr>
            <tr>
                <td>Objet</td>
                <td>Demande de quelque chose</td>
            </tr>
            <tr>
                <td>Source</td>
                <td>DPAF</td>
            </tr>
            <tr>
                <td>Date du courier</td>
                <td>25/05/2023</td>
            </tr>
            <tr>
                <td>Nature</td>
                <td>Lettre</td>
            </tr>
        </table>
    </section>

    <section class="loanRequest">
        <div class="formContainer">
            <h1>Demander un document</h1>
            <form action="" class="loanForm">
                <div class="inputs firstname">
                    <input type="text" name="" id="" placeholder="Firstname">
                </div>
                <div class="inputs lastname">
                    <input type="text" name="" id="" placeholder="Lastname">
                </div>
                <div class="inputs motif">
                    <textarea name="" id="" cols="30" rows="5" placeholder="Motif du prêt"></textarea>
                </div>
                <div class="inputs durée">
                    <input type="text" name="" id="" placeholder="Durée du prêt en jours">
                </div>

                <button type="submit">Soumettre</button>
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
