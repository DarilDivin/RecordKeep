@extends('admin.layouts.template')

@section('title')
    Dashboard-Document-Management
@endsection

@section('style')
    @vite(['resources/css/Dashboard-User-Document-Management.css', 'resources/js/Dashboard-Document-Management.js'])
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Manage Document</p>
                <ion-icon name="document-text"></ion-icon>
            </div>

            <div class="optional">
                <div class="buttons">
                    <button class="filter">
                        <ion-icon name="filter"></ion-icon>
                        Filtrer
                    </button>
                    <button class="add">
                        <ion-icon name="add"></ion-icon>
                        Add Document
                    </button>
                </div>
                <div class="search-box">
                    <input type="text">
                    <ion-icon name="search"></ion-icon>
                </div>
            </div>

            <div class="tableau">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Code</td>
                            <td>Libellé</td>
                            <td>Date de création</td>
                            <td>Taille</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="text-cut">
                                    N°23-221/MISP/DGNSP/REG
                                </div>
                            </td>
                            <td title="Demande d'autorisation">
                                <div class="text-cut">
                                Demande d'Autorisationbalalalal
                                </div>
                            </td>
                            <td>15 Mai 2023</td>
                            <td>25ko</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                                <button class="info">Infos</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="text-cut">
                                    N°23-221/MISP/DGNSP/REG
                                </div>
                            </td>
                            <td>
                                <div class="text-cut">
                                Demande d'Autorisationbalalalal
                                </div>
                            </td>
                            <td>15 Mai 2023</td>
                            <td>25ko</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                                <button class="info">Infos</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="text-cut">
                                    N°23-221/MISP/DGNSP/REG
                                </div>
                            </td>
                            <td>
                                <div class="text-cut">
                                Demande d'Autorisationbalalalal
                                </div>
                            </td>
                            <td>15 Mai 2023</td>
                            <td>25ko</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                                <button class="info">Infos</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="text-cut">
                                    N°23-221/MISP/DGNSP/REG
                                </div>
                            </td>
                            <td>
                                <div class="text-cut">
                                Demande d'Autorisationbalalalal
                                </div>
                            </td>
                            <td>15 Mai 2023</td>
                            <td>25ko</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                                <button class="info">Infos</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="addDocumentFormContainer">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">X</span>
            <h1>Add Document</h1>
            <form action="">
                <input type="number" name="matricule" placeholder="Matricule">
                <input type="text" name="nom" placeholder="Nom">
                <input type="text" name="prénoms" placeholder="Prénoms">
                <input type="mail" name="mail" placeholder="Email">
                <input type="number" name="téléphone" placeholder="Téléphone">

                <button type="submit">Add</button>
            </form>
        </div>
    </div>
@endsection
