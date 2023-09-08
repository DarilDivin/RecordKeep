<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap');
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .rapportContainer {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: #00f; */
        }

        .rapportContainer .rapport {
            width: 80%;
            height: 100%;
            background-color: #fff;
            color:#000;
            display:flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
        }

        .rapportContainer .rapport h1 {
            width: 100%;
            font-size: 2rem;
            text-align: center;
            font-family:'Poppins', sans-serif;
            margin-top: 70px;
        }

        .rapportContainer .rapport .line {
            width: 100%;
            margin: 10px 0 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1rem;
        }

        .rapportContainer .rapport .line p:first-child,
        .rapportContainer .rapport .bigtextarea p:first-child {
            text-decoration: underline;
        }

        .rapportContainer .rapport .bigtextarea {
            width: 100%;
            margin: 10px 0 5px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="rapportContainer">
        <div class="rapport">
            <h1>Bordereau de transfert </h1>

            <div class="line">
                <p><strong>Signature du document :</strong></p>
                <p>{{ $rapport->demandePret->document->signature }}</p>
            </div>
            <div class="line">
                <p><strong>Nom du document :</strong></p>
                <p>{{ $rapport->demandePret->document->nom }}</p>
            </div>
            <div class="line">
                <p><strong>Nom du prêteur :</strong></p>
                <p>{{ $rapport->demandePret->user->nom }}</p>
            </div>
            <div class="line">
                <p><strong>Prénoms du prêteur :</strong></p>
                <p>{{ $rapport->demandePret->user->prenoms }}</p>
            </div>
            <div class="bigtextarea">
                <p><strong>Observation :</strong></p>
                <p style="font-size: .9rem;">{{ $rapport->observation }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt molestiae nobis placeat, dolore pariatur ipsa dignissimos tempora id quibusdam tenetur officiis ducimus corrupti. Possimus hic culpa omnis magni. Sint, ducimus. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio doloremque eligendi, doloribus itaque numquam laborum officiis explicabo deleniti facilis nobis assumenda repudiandae animi, totam in! Nisi sed nihil veritatis quae! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores aspernatur ex sequi error rerum tempora. Molestias modi similique aliquam ipsam sequi blanditiis enim distinctio, quis quasi corporis aut fugiat nesciunt? Lorem ipsum dolor sit amet consectetur adipisicing elit. At quod minus similique esse saepe ex excepturi consequuntur omnis nam repellendus aperiam quibusdam culpa, modi fugiat laborum voluptatum reiciendis, molestias natus?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam eaque sequi modi quibusdam, fuga natus cum omnis, excepturi perferendis alias ab delectus asperiores nostrum ducimus quae amet dolorem cumque quo!lorem
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quis aliquid natus repellat itaque rem maiores a eum in architecto. Sequi cumque nemo provident modi unde, libero quod consequuntur corrupti.</p>
            </div>
            <div class="line">
                <p><strong>Etat du doc :</strong></p>
                <p>{{ $rapport->etat_doc }}</p>
            </div>
        </div>
    </div>
</body>
</html>


{{-- -------------------------------------------------------------------------------------- --}}


{{-- <html>
    <head>
        <title>Ordre de mission interne</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            @font-face {
                font-family: 'Bookman Old Style';
                src: local('https://semo.maono-soft.com/web/dist/webfonts/Bookman Old Style'), local('BookmanOldStyle'),
                url('https://semo.maono-soft.com/web/dist/webfonts/BookmanOldStyle.woff2') format('woff2'),
                url('https://semo.maono-soft.com/web/dist/webfonts/BookmanOldStyle.woff') format('woff'),
                url('https://semo.maono-soft.com/web/dist/webfonts/BookmanOldStyle.ttf') format('truetype');
            }
            @font-face {
                font-family: 'Bookman Old Style';
                src: local('https://semo.maono-soft.com/web/dist/webfonts/Bookman Old Style Bold'), local('BookmanOldStyle-Bold'),
                url('https://semo.maono-soft.com/web/dist/webfonts/BookmanOldStyle-Bold.woff2') format('woff2'),
                url('https://semo.maono-soft.com/web/dist/webfonts/BookmanOldStyle-Bold.woff') format('woff'),
                url('https://semo.maono-soft.com/web/dist/webfonts/BookmanOldStyle-Bold.ttf') format('truetype');
                font-weight: bold;
                font-style: normal;
            }
            .arialBlack{
                font-family:'Arial Black';
            }
            .centuryGoth{
                font-family: 'Century Gothic';
            }
            .arial{
                font-family: 'Arial';
            }
            .cabrli{
                font-family: 'Calibri';
            }

            .bookmanOldStyle{
                font-family: 'Bookman Old Style';
                font-weight: 700;
            }
            .segoeUI{
                font-family: 'Segoe UI';
            }
            .dotteBottom{
                border-bottom:dotted 1px;
                /*-webkit-box-flex: 2 2 auto;*/
                -webkit-flex: 2 2 auto;
                /*flex: 2 2;*/
                width: auto;
            }
            .varible{

                font-size: 20px;
                width: auto;

            }

            .referenceSEMO{

                font-size: 10px;
                width: auto;

            }
            .om{
                font-size: 18pt;
            }
            .Row {
                display: -webkit-box; /* wkhtmltopdf uses this one */
                display: -webkit-flex;
                display: flex;
            }
            .seNum{
                font-size: 10pt;
            }
            .arial>div{
                font-size: 13pt;
            }
            pre{
                border: none;
            }

            /*div#vert {
                width: 600px;
                height: 15px;
                background-color: #4dff4d;
                display: block;
                margin: auto;
                top: 30px;
                position: relative;
                !*margin: 200px 250px;*!
                !*position: absolute;*!
                !*z-index: -1;*!
                !*bottom: 30px;*!
                !*right: 0px;*!
            }*/
            div#drapeau {
                width:50%;
                margin-left:auto;
                margin-right:auto;
            }
            div#vert {
                width: 33.33%;
                height: 10px;
                background-color: #4dff4d;
                display: inline-block;
                position: relative;
                float: left;
                /*margin: 200px 250px;*/
                /*position: absolute;*/
                /*z-index: -1;*/
                /*bottom: 30px;*/
                /*right: 0px;*/
            }

            div#reference{
                position: relative;
                top: 40px;
                position: relative;
            }

            div#jaune{
                width: 33.33%;
                height: 10px;
                background-color: #ffff4d;
                display: inline-block;
                float: left;
            }


            div#rouge{
                width: 33.33%;
                height: 10px;
                background-color: #ff4d4d;
                display: inline-block;
                clear: both;
            }

            div#droite{
                float: right;
            }

            .mb-2, .my-2 {
                margin-bottom: .5rem!important;
            }
            .mb-3, .my-3 {
                margin-bottom: 1rem!important;
            }
            .mb-4, .my-4 {
                margin-bottom: 1.5rem!important;
            }
            .mb-5, .my-5 {
                margin-bottom: 3rem!important;
            }

            .w-30{
                width: 30%;
            }
            .w-50{
                width: 49%
            }
            .w-75{
                width: 75%;
            }
            div{
                font-size:15pt;
            }
            div.Row{
                margin-bottom: 14px ;
            }
            div#flag-look-like {
                display: flex;
                height: 10px;
            }
            div#green-block {
                background-color: #108757;
            }
            div#yellow-block {
                background-color: #fbd142;
            }
            div#red-block {
                background-color: #e92d38;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <div class="row mb-2 mt-2 ">
            <div class="variable w-30" style="width:42%">
                <img src=" https://semo.finances.bj/semo/web/uploads/photos/80b7139405008df869a9c278ccad81a1.png"
                style="width: 300px;height: 81px"
                class="pl-3"
                alt="Logo">
            </div>
            <div class="w-30 segoeUI" style="width:45%;font-size:12pt; text-align: right;">
                <span>Tél : 21301106 – Fax : 229210301996</span><br>
                <span><small> EX-PRIMATURE ROUTE AEROPORT</small></span><br>
                <span> www.interieur.gouv.bj  </span>
            </div>
                </div>

        <div class="row">
            <div class="w-50">
                <p class="pl-3 segoeUI mb-3 font-weight-bold" style="font-size: 12pt"> MINISTERE DE L&#039;INTERIEUR ET DE LA SECURITE PUBLIQUE</p>

                            <p class="pl-3" style="font-size:13px">N°...................../MISP/DC/SGM/DSI/SA</p>
            </div>
            <div class="w-50">
                <!-- Ajout de la situation géographique 31/03/2020 -->
                <p class="segoeUI" style="font-size: 12pt">EX-PRIMATURE ROUTE AEROPORT, le ................ </p>
            </div>
        </div>
        <div>
            <p class="text-center bookmanOldStyle mb-3 font-weight-bold" style="font-size: 20pt">ORDRE DE MISSION</p>
                    <p class="text-center bookmanOldStyle mb-4 font-weight-bold" style="font-size: 13pt">  MINISTRE  AUTORISE :</p>
        </div>
        <div class="Row bookmanOldStyle mb-3">
            <div style="font-weight:lighter">Référence document d'autorisation : </div>
            <div class="dotteBottom"></div>
            <div style="font-weight:bolder;">MISP/DC/SGM/DSI/SA &nbsp;</div>
            <div style="font-weight:lighter">...Du...</div>
            <div class="varible pl-2">28/08/2023 </div>
            <div class="dotteBottom"></div>
        </div>
        <div class="Row bookmanOldStyle mb-3">
            <div style="font-weight:lighter">Nom :</div>
            <div class="dotteBottom"></div>
            <div style="font-weight:bolder;">ADJIBI &nbsp;</div>
            <div style="font-weight:lighter">...Prénoms :</div>
            <div class="varible pl-2">CARMEL LANDRY BOLADJI AGNIDE </div>
            <div class="dotteBottom"></div>
        </div>
        <div class="Row bookmanOldStyle mb-3">
            <div class="" style="font-weight:lighter">Qualité :</div>
            <div class="dotteBottom"></div>
            <div class="varible font-weight-bold">CHEF SERVICE INFRASTRUCTURE ET SYSTÈME</div>
            <div class="dotteBottom"></div>
            <div class="varible" style="font-weight:lighter">Grade : <b>A3-01</b>...Indice : <b>475</b>...Matricule : <b>104745</b>  </div>
            <div class="dotteBottom"></div>
                    <div class="varible" style="font-weight:lighter">Ifu : <b></b></div>
            <div class="dotteBottom"></div>
                </div>
        <div class="Row bookmanOldStyle mb-3">
            <div class="varible" style="font-weight:lighter">Adresse complète : <span style="font-weight:bolder">  EX-PRIMATURE ROUTE AEROPORT     </span></div>
            <div class="dotteBottom"></div>
        </div>
        <div class="Row bookmanOldStyle mb-3">
            <div class="varible" style="font-weight:lighter">Date et lieu de Naissance : <b>……</b></div>
            <div class="varible">26/07/1986 <span class="varible" style="font-weight:lighter"> ...à</span> COTONOU</div>
            <div class="dotteBottom"></div>
        </div>
        <div class="Row bookmanOldStyle mb-3">
            <div class="varible" style="font-weight:lighter">A se rendre en mission à:</div>
            <div class="dotteBottom"></div>
            <div class="varible font-weight-bold"> - BOUKOUMBE   - TANGUIETA   - BANTE   - COPARGO  </div>
            <div class="dotteBottom"></div>
        </div>
        <div class="mx-left bookmanOldStyle d-block mb-3">
            <div class="Row">
                <div class="varible w-100" style="font-weight:lighter">Pour&nbsp; (<small>objet complet</small>) :……………
                    <span class="bookmanOldStyle font-weight-bold" > Mission de prospection et de maintenance en émetteur récepteur au niveau des postes frontaliers.  </span>……………
                </div>
            </div>
            <div class="Row bookmanOldStyle mb-3">
                <div class="varible" style="font-weight:lighter">Moyen de transport <b>:</b> </div>
                <div class="dotteBottom"></div>
                <div class="varible font-weight-bold">  Vehicule  CD 0593 RB  </div>
                <div class="dotteBottom"></div>

            </div>
            <div class="Row bookmanOldStyle mb-3">
                <div class="varible" style="font-weight:lighter">Date de départ  <b>:</b> </div>
                <div class="dotteBottom"></div>
                <div class="varible font-weight-bold">28/08/2023</div>
                <div class="dotteBottom"></div>

            </div>
            <div class="Row bookmanOldStyle mb-3">
                <div class="varible" style="font-weight:lighter">Date de retour  <b>:</b> </div>
                <div class="dotteBottom"></div>
                <div class="varible font-weight-bold">02/09/2023</div>
                <div class="dotteBottom"></div>

            </div>
            <div class="Row bookmanOldStyle mb-3">
                <div class="varible" style="font-weight:lighter">Conducteur à bord  <b>:</b> </div>
                <div class="dotteBottom"></div>
                <div class="varible font-weight-bold">  TOSSA  LEON  </div>
                <div class="dotteBottom"></div>

            </div>
            <div class="Row bookmanOldStyle mb-3">
                <div class="varible" style="font-weight:lighter">Imputation  budgétaire  des  frais  de  mission :</div>
                &nbsp;  <b> <i> Budget National.</i></b>
            </div>
        </div>
        <div class="Row bookmanOldStyle mb-3">
            <div class="varible" style="font-weight:lighter">Autorité à saisir en cas d’urgence :</div>
            <div class="dotteBottom"></div>
            <div class="varible">  SGM      </div>
            <div class="dotteBottom"></div>
            <div class="varible"> Tél ...<b> 97120110  </b> </div>
            <div class="dotteBottom"></div>



        </div>
        <div class="Row bookmanOldStyle">
            <div class="varible" style="font-weight:lighter">Les autorités administratives sont priées de faciliter à M./Mme. <b>ADJIBI CARMEL LANDRY BOLADJI AGNIDE</b> , l’accomplissement de la mission.
            </div>
        </div>
        <div class="row">
            <div class="w-50 pt-3">
                <p class="font-weight-bold segoeUI text-center" style="font-size: 13pt">VU, </p>
                <!--afficher la qualité du délégué ligne 284 ajouté ce 17 mars 2020-->
                <p class="font-weight-bold segoeUI text-center mb-3" style="font-size: 13pt">  LE CONTRÔLEUR FINANCIER    </p> <br>
                <p class="font-weight-bold segoeUI text-center" style="font-size: 13pt">   HADONOU YAOVI CINNA CURIACE  </p>
            </div>
            <div class="pt-3 text-center segoeUI font-weight-bold" style="font-size: 13pt;width:40%;">
                <p class="font-weight-bold segoeUI text-center mb-3" style="font-size: 13pt">POUR  MINISTRE                  </p>
                                        SECRETAIRE GENERAL DU MINISTERE
                            <p class="mt-5">
                                TOKPON  DELPHIN
                    </p>

            </div>
        </div>
        <div id="drapeau">
            <div id="vert">
            </div>
            <div id="jaune" >
            </div>
            <div id="rouge">
            </div>
        </div>
        </div>
        <div class="container" id="reference">
        <div class="Row bookmanOldStyle mb-2">
            <div class="referenceSEMO" style="font-weight:lighter; font-size:large" > SEMO : <b> 0241715142 du 22/08/2023</b> </div>
        </div>
        </div>

    </body>
</html> --}}
