@extends('admin.layouts.template')

@section('title')
    Gestion des Documents
@endsection

@section('content')

    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Gestion des Documents</p>
                <ion-icon name="document-text"></ion-icon>
            </div>

            @livewire('documents-table')
        </div>
    </div>
    <div class="warningMessageContainer">
        <div class="overlay"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment supprimer ce document ?</h3>
            <form action="" class="deleteForm" method="POST">
                @csrf
                @method('delete')
                <button type="button" class="closeWarning">Annuler</button>
                <button type="submit" class="submitdeleteForm">Supprimer</button>
            </form>
        </div>
    </div>

    <div class="addDocumentFormContainer">
        <div class="overlayInfos"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="close-outline"></ion-icon>
            </span>
            <h1>Informations</h1>
            {{-- <div class="infosDoc">
                <div class="infoContent">
                    <h5>Signature:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Nom:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Code:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Objet:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Source:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Emetteur:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Récepteur:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Mots Clés:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>DUA:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Disponibilité:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Date de création:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Nombre de téléchargement:</h5>
                    <p>12000</p>
                </div>
                <div class="infoContent">
                    <h5>Nombre de consultation:</h5>
                    <p>21000</p>
                </div>
                <div class="infoContent">
                    <h5>Archivé:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Prêté:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Division:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Service:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Direction:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Catégorie:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
                <div class="infoContent">
                    <h5>Nature:</h5>
                    <p>N°564/DPAF/MISP/SGHTE/DPRF/SA</p>
                </div>
            </div> --}}

            <div class="infosDoc">
                <div class="sectionGeneral content">
                    <h3>Informations Générales</h3>
                    <div class="info">
                        <h5>Signature :</h5>
                        <p id="signature"></p>
                    </div>
                    <div class="info">
                        <h5>Nom :</h5>
                        <p id="nom"></p>
                    </div>
                    <div class="info">
                        <h5>Objet :</h5>
                        <p id="objet"></p>
                    </div>
                    <div class="info">
                        <h5>Source :</h5>
                        <p id="source"></p>
                    </div>
                    <div class="info">
                        <h5>Emetteur :</h5>
                        <p id="emetteur"></p>
                    </div>
                    <div class="info">
                        <h5>Récepteur :</h5>
                        <p id="recepteur"></p>
                    </div>
                    <div class="info">
                        <h5>DUA :</h5>
                        <p id="dua"></p>
                    </div>
                    <div class="info">
                        <h5>Date :</h5>
                        <p id="date"></p>
                    </div>
                    <div class="info">
                        <h5>Nature :</h5>
                        <p id="nature"></p>
                    </div>
                    <div class="info">
                        <h5>Catégorie :</h5>
                        <p id="categorie"></p>
                    </div>
                </div>
                <div class="sectionPlus content">
                    <h3>Plus</h3>
                    <div class="info">
                        <h5>Nombre de consultation :</h5>
                        <p id="consult"></p>
                    </div>
                    <div class="info">
                        <h5>Nombre de téléchargement :</h5>
                        <p id="download"></p>
                    </div>
                    <div class="info">
                        <h5>Prêté :</h5>
                        <p id="pret"></p>
                    </div>
                    <div class="info">
                        <h5>Archivé :</h5>
                        <p id="archived"></p>
                    </div>
                    <div class="info">
                        <h5>Disponible :</h5>
                        <p id="disponible"></p>
                    </div>

                </div>
                <div class="sectionStructure content">
                    <h3>Structure d'appartenance</h3>
                    <div class="info">
                        <h5>Direction:</h5>
                        <p id="direction"></p>
                    </div>
                    <div class="info">
                        <h5>Service :</h5>
                        <p id="service"></p>
                    </div>
                    <div class="info">
                        <h5>Division :</h5>
                        <p id="division"></p>
                    </div>
                </div>
                    <div class="sectionClassement content">
                        <h3>Classement</h3>
                        <div class="info">
                            <h5>Chemise:</h5>
                            <p id="chemise"></p>
                        </div>
                        <div class="info">
                            <h5>Boite :</h5>
                            <p id="boite"></p>
                        </div>
                        <div class="info">
                            <h5>Rayon :</h5>
                            <p id="rayon"></p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
