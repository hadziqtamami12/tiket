<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Send Email Example</title>
    <style>
        @page {
            margin: 0px;
            size: a4 landscape;
        }

        .container {
            /* background-image: url('../assets/sertifikat/sertifikat.png'); */
            border: 1px solid black;
            background: url('{{"assets/sertifikat/sertifikat.png"}}');
            background-size: 1150px 790px;
            background-repeat: no-repeat;
            height: 790px;
            align-self: center;
        }

        .text-center {
            text-align: center;
        }

        .text-white {
            color: white;
        }

        .card-title {
            margin-left: 3%;
            margin-top: 21.5%;
        }

        .card-name {
            margin-left: 3%;
            margin-top: 5%;
        }

        .text-bold {
            font-weight: bold;
        }

        .text-blue {
            color: #244484;
        }

        .text-orange {
            color: orange;
        }

        .text-name {
            font-size: 3em;
        }

        .card-description {
            max-width: 45%;
            margin-left: auto;
            margin-right: auto;
            text-align: justify;
        }

        .description {
            margin-left: 10%;
            font-size: 1.2em;
        }
    </style>
</head>

<body>


    <div class="container text-center">
        <div class="card-title">
            <h1 class="text-white">Online Ticket</h1>
        </div>
        <div class="card-name">
            <h1>Diberikan Kepada :</h1>
            <h1 class="text-blue text-name"> {!! $user->email !!}</h1>
        </div>
        <div class="card-description">
            <h3 class="description">{!! $qrcode !!}</h3>
        </div>

    </div>

</body>

</html>