<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <m&eta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Commentaires avec Vuejs & Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>

<body class="font-sans text-black antialiased">
    <h1>{{ $title }}</h1>
    <div id="app" class="h-full w-full flex justify-center items-center">
        <comments class="w-1/2 mt-16"></comments>
    </div>

    <script src="js/app.js"></script>
</body>
</html>
