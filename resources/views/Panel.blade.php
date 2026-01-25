<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel</title>

    @vite(['resources/css/Panel.css'])
    @include('navbar')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div id="Contenedor">

        <main id="vistas">
            
        </main>

    </div>

</head>

<body>


 @vite(['resources/js/Cargar_Vistas.js'])
    
</body>

</html>