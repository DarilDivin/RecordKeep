@extends('manager.layouts.template')

@section('title')
    Manager-Document-Management
@endsection

@section('content')

<div class="container">
    @include('manager.layouts.partials.sidebar')

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
            <div class="check-categorie-documents">
                <select name="" id="">
                    <option value="service informatique">Service Informatique</option>
                    <option value="service informatique">Secrétariat</option>
                    <option value="service informatique">Service Informatique et quelque chose</option>
                    <option value="service informatique">Service Informatique</option>
                </select>
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
                        <td>N°23-221/MISP/DGNSP/REG</td>
                        <td>Demande d'Autorisation</td>
                        <td>15 Mai 2023</td>
                        <td>25ko</td>
                        <td>
                            <button class="edit">Editer</button>
                            <button class="delete">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>N°23-221/MISP/DGNSP/REG</td>
                        <td>Demande d'Autorisation</td>
                        <td>15 Mai 2023</td>
                        <td>25ko</td>
                        <td>
                            <button class="edit">Editer</button>
                            <button class="delete">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>N°23-221/MISP/DGNSP/REG</td>
                        <td>Demande d'Autorisation</td>
                        <td>15 Mai 2023</td>
                        <td>25ko</td>
                        <td>
                            <button class="edit">Editer</button>
                            <button class="delete">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>N°23-221/MISP/DGNSP/REG</td>
                        <td>Demande d'Autorisation</td>
                        <td>15 Mai 2023</td>
                        <td>25ko</td>
                        <td>
                            <button class="edit">Editer</button>
                            <button class="delete">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>N°23-221/MISP/DGNSP/REG</td>
                        <td>Demande d'Autorisation</td>
                        <td>15 Mai 2023</td>
                        <td>25ko</td>
                        <td>
                            <button class="edit">Editer</button>
                            <button class="delete">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>N°23-221/MISP/DGNSP/REG</td>
                        <td>Demande d'Autorisation</td>
                        <td>15 Mai 2023</td>
                        <td>25ko</td>
                        <td>
                            <button class="edit">Editer</button>
                            <button class="delete">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>N°23-221/MISP/DGNSP/REG</td>
                        <td>Demande d'Autorisation</td>
                        <td>15 Mai 2023</td>
                        <td>25ko</td>
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

<div class="addDocumentFormContainer">
    <div class="overlay"></div>
    <div class="addDocumentForm">
        <span class="closeDocumentForm">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <h1>Add Document</h1>
        <form action="">
            @csrf
            <x-input class="inputContainer" id="signature" label="Signature" type="text" name="signature" placeholder="Signature"  readonly="" value="" />

            <x-input class="inputContainer" id="nom" label="Nom du Document" type="text" name="nom" placeholder="Nom du Document" readonly="" value="" />

            <x-input class="inputContainer objet" id="objet" label="Objet" type="text" name="objet" placeholder="Objet du Document" readonly="" value="" />

            <x-input class="inputContainer" id="emetteur" label="Émetteur" type="text" name="emetteur" placeholder="Émetteur"  readonly="" value="" />

            <x-input class="inputContainer" id="recepteur" label="Récepteur" type="text" name="recepteur" placeholder="Émetteur"  readonly="" value="" />

            <x-select class="inputContainer" id="direction" label="Direction" name="diretcion_id" value="DSI"/>

            <x-select class="inputContainer" id="service" label="Service" name="service_id" value="DSI"/>

            <x-select class="inputContainer" id="division" label="Division" name="division_id" value="DSI"/>

            <x-input class="inputContainer" id="dua" label="DUA" type="number" name="dua" placeholder="DUA"  readonly="" value="" />

            <x-select class="inputContainer" id="nature" label="Nature du Document" name="nature" value="Note de Service"/>

            <div class="inputContainer motClé">
                <label for="signature">Mots-Clefs</label>
                <div class="inputs">
                    <input type="text" name="motclefs" placeholder="Mots-Clefs">
                    {{-- <input type="submit" name="motCléSubmit" value="Ajouter"> --}}
                    <button type="button">Ajouter</button>
                </div>
            </div>

            <x-input class="inputContainer" id="datecreation" label="Date de Création" type="number" name="datecreation" placeholder="2023"  readonly="" value="" />

            <div class="inputContainer readonly">
                <label for="année">Mots-Clefs</label>
                <textarea name="" id="" cols="30" rows="10" readonly></textarea>
            </div>
            <div class="inputContainer autorisation">
                <h4>Acorder l'accès à :</h4>
                <div class="checkboxContainer">
                    <label for="directeur">Directeur</label>
                    <input type="checkbox" name="directeur" id="directeur">
                </div>
                <div class="checkboxContainer">
                    <label for="service">Chef Service</label>
                    <input type="checkbox" name="service" id="service">
                </div>
                <div class="checkboxContainer">
                    <label for="division">Chef Division</label>
                    <input type="checkbox" name="division" id="division">
                </div>
                <div class="checkboxContainer">
                    <label for="charge">Chargé</label>
                    <input type="checkbox" name="charge" id="charge">
                </div>
            </div>

            <div class="inputContainer button">
                <button type="submit">Add</button>
            </div>
        </form>
    </div>
</div>

@endsection
