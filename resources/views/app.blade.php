<!doctype html>
<html lang="en">
    <head>
        <!-- [Meta tags] -->
        <meta name="charset" content="UTF-8">
        <meta name="description" content="Colector de informacion">
        
        <title>Colector 1.0</title>
        
        <!-- [Estilos] -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
        <link href="/assets/css/estilo.css" rel="stylesheet">
        @yield('head_styles')
        
        @yield('embedded_styles')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        
        <!-- [Scripts] -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
        <srcript src="/assets/js/script.js" type="text/javascript"></srcript>
        @yield('scripts')
    </body>
</html>