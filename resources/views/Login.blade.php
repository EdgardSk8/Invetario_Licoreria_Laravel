<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <!-- CSS -->
    @vite(['resources/css/Login.css'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



</head>

<body>

    <div class="contenedor_padre">

        <div class="contenedor_hijo">

            <div class="marco_logo">
                <img class="logo" src="/Recursos/Logo.jpg" alt="Logotipo">
            </div>

        </div>
        
        <form method="POST" class="contenedor_hijo" action="{{ route('login.post') }}">

            <h1>LOGIN</h1>

            <p>Ingrese sus credenciales de inicio de sesion</p>

            @csrf

            <!------------------------------------------------------------------------------------------------>

            <!-- [Inputs] -->

            <div class="input-grupo">

                <i class="fa-regular fa-user"> </i> <input type="text"  name="usuario_login" placeholder="USUARIO" required>

            </div>

            <div class="input-grupo">

                <i class="fa-solid fa-lock"> </i>  <input type="password" name="contrasenia" placeholder="CONTRASEÑA" required>

            </div>

            <!------------------------------------------------------------------------------------------------>

            <button type="submit" class="btn-login">Iniciar sesión</button>
            @error('login') <p class="ms_error">{{ $message }}</p> @enderror

        </form>

    </div>

    
</body>

</html>