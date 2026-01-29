@extends('Panel')

@section('vistas')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">


    @vite(['resources/css/Vistas/Usuarios.css'])
    @vite(['resources/css/DataTables.css'])
    

<div class="contenedor">

    <div id="contenedor-informacion">
       
    </div>

    <div id="contenedor-administracion">

    <div class="Barra">    
        <h1>Administrador de Usuarios</h1>
        <button class="DisplayAgregarUsuarios">Agregar Usuarios</button>
    </div>



    <form class="form-usuarios" action="/usuarios/crear" method="POST" enctype="multipart/form-data">
    @csrf

        <div>
            <label>Nombre de usuario</label>
            <input type="text" name="nombre_usuario" required>
        </div>

        <div>
            <label>Usuario login</label>
            <input type="text" name="usuario_login" required>
        </div>

        <div>
            <label>Contraseña</label>
            <input type="password" name="contrasenia" required>
        </div>

        <div>
            <label>Documento de identificación</label>
            <input type="text" name="documento_identificacion" maxlength="16" required>
        </div>

        <div>
            <label>Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" required>
        </div>

        <div>
            <label>Género</label>
            <select name="genero" required>
                <option value="">Seleccione</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>

        <div>
            <label>Dirección</label>
            <textarea name="direccion" rows="1"></textarea>
        </div>

        <div>
            <label>Teléfono</label>
            <input type="tel" name="telefono">
        </div>

        <div>
            <label>Fecha de ingreso</label>
            <input type="date" name="fecha_ingreso" required>
        </div>

        <div>
            <label>Rol</label>
            <select name="id_rol" required>
                <option value="">Seleccione un rol</option>
                <option value="1">Administrador</option>
            </select>
        </div>

        <div>
            <label>Fotografía</label>
            <input type="file" name="fotografia" accept="image/*" id="fotografiaInput">
        </div>

        <div id="fotoPreview">
            Vista previa
        </div>

        <button type="submit">Guardar usuario</button>

    </form>

        <table id="tablaUsuarios"></table>

    </div>

</div>

@if(session('mensaje'))
    <script>
        alert("{{ session('mensaje') }}");
    </script>
@endif

@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif


@endsection
