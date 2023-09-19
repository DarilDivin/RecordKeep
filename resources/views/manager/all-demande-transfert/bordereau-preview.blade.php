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
                <p><strong>Nom du Transféreur : </strong></p>
                <p>{{ $transfert->user->nom }}</p>
            </div>
            <div class="line">
                <p><strong>Prénoms du Transféreur :  </strong></p>
                <p>{{ $transfert->user->prenoms }}</p>
            </div>
            <div class="line">
                <p><strong>Email du Transféreur :  </strong></p>
                <p>{{ $transfert->user->email }}</p>
            </div>
            <div class="bigtextarea">
                <p><strong>Observation :</strong></p>
                <p style="font-size: .9rem;">{{ $transfert->bordereautransfert->observation }}</p>
            </div>
            <div class="line">
                <p><strong>Date de L'Opération : </strong></p>
                <p>{{ $transfert->created_at->translatedFormat('d F Y') }}</p>
            </div>
            <h3>Liste des documents</h3>
            <ul>
                @foreach ($transfert->documents as $document)
                    <li>{{ $document->nom }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
