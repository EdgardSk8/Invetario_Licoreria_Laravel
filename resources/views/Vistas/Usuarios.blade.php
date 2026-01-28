@extends('Panel')

@section('vistas')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">


    @vite(['resources/css/Vistas/Usuarios.css'])
    @vite(['resources/css/DataTables.css'])
    

<div class="contenedor">

    <div id="contenedor-informacion">
       
    </div>

    <div id="contenedor-administracion">

        <table id="tablaUsuarios" class="display"></table>

    </div>

</div>

@endsection
