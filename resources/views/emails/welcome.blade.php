<head>
    <style>
        body{
            background-color: #afe2e6;
        }
        .title{
            margin:auto;
            text-align: center;
            text-transform: uppercase;
            font-size: 5em;
            font-family: 'Fredericka the Great', cursive;
            text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
            z-index: -1;
            text-align: center;
        }
        img{
            display: block;
            margin: auto;
            margin-top: 10px;
            margin-bottom: 10px;
            height: 150px;
        }
        .text-container{
            background-color: #12747a;
            color: white;
            width:50%;
            display: block;
            margin: auto;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 4px 2px rgba(0, 0, 0, 0.25);
        }
        a{
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('img/logo.png') }}">
        <div class="text-container w-50 d-block mx-auto">
            <p>Witaj, {{$nickname}}!</p>
            <p>Możesz teraz zalogować się do aplikacji i rozpocząć rozgrywę!</p>
            <p>Jeśli potrzebujesz pomocy, napisz do nas: <a href="mailto:aplikacja.memory@gmail.com">aplikacja.memory@gmail.com</a></p>
            <p>Dobrej zabawy!</p>
        </div>   
    </div>
</body>
