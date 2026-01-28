
/* [Importacion de librerias] */

import $ from 'jquery';
import 'datatables.net';
import { initUsuarios } from './Vistas/Usuarios.js';

/* --------------------------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', () => {

    const btnMenu = document.getElementById('menu_desplegable');
    const menu = document.getElementById('menu_lateral');

    btnMenu.addEventListener('click', () => { // Toggle menú lateral
        menu.classList.toggle('activo');
        btnMenu.classList.toggle('is-active');
    });

    // Cerrar menú al hacer clic en cualquier enlace (solo animación)
    menu.querySelectorAll('a:not(.logout)').forEach(link => {

        link.addEventListener('click', () => {
            menu.classList.remove('activo');
            btnMenu.classList.remove('is-active');
        });

    });

/* --------------------------------------------------------------------------- */

    // ---- SPA: cargar vistas con AJAX ----

    $('#menu_lateral a:not(.logout)').click(function(e) {

        e.preventDefault();
        const url = $(this).attr('href');

        $('#vistas').load(url + ' #vistas > *', function() {

            if ($('#tablaUsuarios').length) initUsuarios();

        });

        menu.classList.remove('activo');// cerrar menú lateral
        btnMenu.classList.remove('is-active');

        window.history.pushState({ path: url }, '', url);// cambiar la URL sin recargar la página

    });

    // Manejar historial (back/forward)
    window.addEventListener('popstate', function(event) {

        const url = event.state?.path || window.location.pathname;

        $('#vistas').load(url + ' #vistas > *', function() {

            if ($('#tablaUsuarios').length) {initUsuarios();}

        });
    });

    // Inicializar usuarios
    if ($('#tablaUsuarios').length) initUsuarios();

});
