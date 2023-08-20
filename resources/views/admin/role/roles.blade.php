@extends('admin.layouts.template')

@section('title')
    Dashboard-Role-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('roles-table')
    </div>

    {{-- <div class="addUserFormContainer">
        <div class="overlay"></div>
        <div class="addUserForm">
            <span class="closeUserForm">
                <ion-icon name="close-outline"></ion-icon>
            </span>
            <h1>Add User</h1>
            <form action="">
                <div class="inputContainer">
                    <label for="matricule">Matricule</label>
                    <input type="text" name="matricule" placeholder="Matricule">
                </div>
                <div class="inputContainer">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" placeholder="Nom">
                </div>
                <div class="inputContainer">
                    <label for="prenoms">Prénoms</label>
                    <input type="text" name="prenoms" placeholder="Prenoms">
                </div>
                <div class="inputContainer">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="name@mail.com">
                </div>
                <div class="inputContainer">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>
                <div class="inputContainer">
                    <label for="sexe">Sexe</label>
                    <input type="text" name="sexe" placeholder="Sexe">
                </div>
                <div class="inputContainer">
                    <label for="birth">Date de naissance</label>
                    <input type="date" name="birth" placeholder="Date de naissance">
                </div>
                <div class="inputContainer">
                    <label for="signature">Direction</label>
                    <select name="direction" id="">
                        <option value="DSI">DSI</option>
                        <option value="DSI">DPAF</option>
                        <option value="DSI">DGSP</option>
                        <option value="DSI">DAIC</option>
                        <option value="DSI">DPPAE</option>
                        <option value="DSI">DSI</option>
                    </select>
                </div>
                <div class="inputContainer">
                    <label for="service">Service</label>
                    <select name="service" id="">
                        <option value="">Service 1</option>
                        <option value="">Service 2</option>
                        <option value="">Service 3</option>
                        <option value="">Service 4</option>
                        <option value="">Service 5</option>
                        <option value="">Service 6</option>
                    </select>
                </div>
                <div class="inputContainer">
                    <label for="division">Division</label>
                    <select name="division" id="">
                        <option value="">Division 1</option>
                        <option value="">Division 2</option>
                        <option value="">Division 3</option>
                        <option value="">Division 4</option>
                        <option value="">Division 5</option>
                    </select>
                </div>
                <div class="inputContainer">
                    <label for="fonction">Fonction</label>
                    <select name="fonction" id="">
                        <option value="">Directeur</option>
                        <option value="">Chef Service</option>
                        <option value="">Chef Division</option>
                        <option value="">Chargé</option>
                    </select>
                </div>
                <div class="inputContainer">
                    <label for="role">Rôle</label>
                    <select name="role" id="">
                        <option value="">Utilisateur</option>
                        <option value="">Gestionnaire</option>
                        <option value="">Administrateur</option>
                    </select>
                </div>

                <div class="inputContainer button">
                    <button type="submit">Add</button>
                </div>
            </form>
        </div>
    </div> --}}
@endsection
