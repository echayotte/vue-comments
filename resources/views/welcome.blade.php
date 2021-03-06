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

<body class="font-sans text-teal-light antialiased">
    @if(Request::is('/'))
    <div class="text-center py-4">
        <a class="p-2 text-teal no-underline" href="{{ url('/') }}">Accueil</a>
        <a class="p-2 text-teal no-underline" href="{{ url('page1') }}">Page 1</a>
        <a class="p-2 text-teal no-underline" href="{{ url('page2') }}">Page 2</a>
    </div>
    <h1 class="text-center py-8">{{ $title }}</h1>
    <p class="leading-loose p-4 text-left w-1/3 mx-auto border border-teal-light">
        Ce mini projet est un essai sur la création, la modification et la réponse de commentaires sur deux pages
        différentes en vuejs avec api Laravel.<br><br>Il n'est ici pas question d'authentification des commentaires.</p>
    <div id="app">
    </div>

    @else
    <div class="text-center py-4">
        <a class="p-2 text-teal no-underline" href="{{ url('/') }}">Accueil</a>
        <a class="p-2 text-teal no-underline" href="{{ url('page1') }}">Page 1</a>
        <a class="p-2 text-teal no-underline" href="{{ url('page2') }}">Page 2</a>
    </div>
    <h1 class="text-center py-8">{{ $title }}</h1>
    <div id="app" class="h-full w-full flex justify-center items-center">
        <comments class="w-1/2 mt-16"></comments>
    </div>
    @endif
    <script src="js/app.js"></script>
</body>

</html>