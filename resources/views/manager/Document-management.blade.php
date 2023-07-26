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
            <div class="inputContainer">
                <label for="signature">Signature</label>
                <input type="text" name="signature" placeholder="Signature">
            </div>
            <div class="inputContainer">
                <label for="nom">Nom du document</label>
                <input type="text" name="nom" placeholder="Nom">
            </div>
            <div class="inputContainer objet">
                <label for="signature">Objet</label>
            <input type="text" name="objet" placeholder="Objet">
            </div>
            <div class="inputContainer">
                <label for="signature">Emetteur</label>
                <input type="text" name="emetteur" placeholder="Emetteur">
            </div>
            <div class="inputContainer">
                <label for="signature">Recepteur</label>
                <input type="text" name="recepteur" placeholder="Recepteur">
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
                <label for="signature">Service</label>
                <select name="service" id="">
                    <option value="DSI">DSI</option>
                    <option value="DSI">DPAF</option>
                    <option value="DSI">DGSP</option>
                    <option value="DSI">DAIC</option>
                    <option value="DSI">DPPAE</option>
                    <option value="DSI">DSI</option>
                </select>
            </div>
            <div class="inputContainer">
                <label for="signature">Division</label>
                <select name="division" id="">
                    <option value="DSI">DSI</option>
                    <option value="DSI">DPAF</option>
                    <option value="DSI">DGSP</option>
                    <option value="DSI">DAIC</option>
                    <option value="DSI">DPPAE</option>
                    <option value="DSI">DSI</option>
                </select>
            </div>
            <div class="inputContainer">
                <label for="signature">Nature</label>
                <select name="nature" id="">
                    <option value="DSI">Bordereaux d'envoi</option>
                    <option value="DSI">Arrêté</option>
                    <option value="DSI">Lettre</option>
                    <option value="DSI">Note</option>
                    <option value="DSI">Note de service</option>
                    <option value="DSI">Message porté</option>
                </select>
            </div>
            <div class="inputContainer motClé">
                <label for="signature">Mots-Clefs</label>
                <div class="inputs">
                    <input type="text" name="motClé" placeholder="Mots-Clefs">
                    <input type="submit" name="motCléSubmit" value="Ajouter">
                </div>
            </div>
            <div class="inputContainer">
                <label for="année">Année</label>
                <input type="text" name="année" placeholder="2023">
            </div>

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
