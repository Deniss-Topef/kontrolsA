<!DOCTYPE html>
<html lang="lv">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Mana Lapa</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Styles / Scripts -->
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@else
    <style>

    </style>
@endif
</head>
<body>

@include('inc.header')
<br><br>

<div class="container">
    <div class="row">
        <div class="col-2">

        @auth
            @include('inc.sidemenu')
        @endauth

        </div>
        <div class="col-8">  


        
        @yield('content')
        
       
                
        </div>
        
    </div>
</div>

<br><br>

@include('inc.footer')
</body>
</html>