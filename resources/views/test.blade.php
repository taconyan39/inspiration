<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- laravelmix style -->
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app" class="p-test">
            <header-component></header-component>
            <example-component></example-component>
        </div>
        @include('components.footer')
        laravelmix-style
        <!-- <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html> -->