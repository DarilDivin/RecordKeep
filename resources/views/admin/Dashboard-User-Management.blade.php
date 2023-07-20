@extends('admin.layouts.template')

@section('title')
    Dashboard-User-Management
@endsection

@section('style')
    @vite(['resources/css/Dashboard-User-Document-Management.css', 'resources/js/Dashboard-User-Management.js'])
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Manage User</p>
                <ion-icon name="person"></ion-icon>
            </div>

            <div class="optional">
                <div class="buttons">
                    <button class="filter"><ion-icon name="filter"></ion-icon> Filtrer </button>
                    <button class="add"><ion-icon name="add"></ion-icon> Add User</button>
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
                            <td>Matricule</td>
                            <td>Noms</td>
                            <td>Prénoms</td>
                            <td>Status</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>
                                <div class="text-cut">
                                    Quelque chose Lorem ipsum dolor sit amet.
                                </div>
                            </td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12151419</td>
                            <td>BABATOUNDE</td>
                            <td>Baba</td>
                            <td>Quelque chose</td>
                            <td>
                                <button class="edit">Editer</button>
                                <button class="delete">Supprimer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="addUserFormContainer">
        <div class="overlay"></div>
        <div class="addUserForm">
            <span class="closeUserForm">X</span>
            <h1>Add User</h1>
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
