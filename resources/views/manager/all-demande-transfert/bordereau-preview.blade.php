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
                <p><strong>Nom du Transféreur : {{ $transfert->user->nom }}</strong></p>
                <p></p>
            </div>
            <div class="line">
                <p><strong>Prénoms du Transféreur :  {{ $transfert->user->prenoms }}</strong></p>
                <p></p>
            </div>
            <div class="line">
                <p><strong>Email du Transféreur :  {{ $transfert->user->email }}</strong></p>
                <p></p>
            </div>
            <div class="bigtextarea">
                <p><strong>Observation :</strong></p>
                <p style="font-size: .9rem;">{{ $transfert->observation }}Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt molestiae nobis placeat, dolore pariatur ipsa dignissimos tempora id quibusdam tenetur officiis ducimus corrupti. Possimus hic culpa omnis magni. Sint, ducimus. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio doloremque eligendi, doloribus itaque numquam laborum officiis explicabo deleniti facilis nobis assumenda repudiandae animi, totam in! Nisi sed nihil veritatis quae! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores aspernatur ex sequi error rerum tempora. Molestias modi similique aliquam ipsam sequi blanditiis enim distinctio, quis quasi corporis aut fugiat nesciunt? Lorem ipsum dolor sit amet consectetur adipisicing elit. At quod minus similique esse saepe ex excepturi consequuntur omnis nam repellendus aperiam quibusdam culpa, modi fugiat laborum voluptatum reiciendis, molestias natus?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam eaque sequi modi quibusdam, fuga natus cum omnis, excepturi perferendis alias ab delectus asperiores nostrum ducimus quae amet dolorem cumque quo!lorem
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quis aliquid natus repellat itaque rem maiores a eum in architecto. Sequi cumque nemo provident modi unde, libero quod consequuntur corrupti.</p>
            </div>
            <div class="line">
                <p><strong>Dateb de L'Opération : {{ $transfert->created_at }}</strong></p>
                <p></p>
            </div>
        </div>
    </div>
</body>
</html>
