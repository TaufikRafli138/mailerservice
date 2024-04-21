<html>
@php
    setlocale(LC_TIME, 'id_ID.utf8');
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <style>
        body {
            background-color: #fff;
            color: #000000;
            font-family: "Calibri,Arial,Helvetica,sans-serif";
            font-size: 12pt;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .padding {
            padding-top: 10px;
            padding-left: 25px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            display: flex;
        }

        .left-side {
            width: 75%;
            margin-left: 20px;
        }

        .right-side {
            width: 25%;
            display: flex;
            padding: 75px;
        }

        .left-side a,
        .right-side a {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 12px;
        }

        .left-side img,
        .right-side img {
            width: auto;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="padding">
        @yield('content')
    </div>
</body>

</html>
