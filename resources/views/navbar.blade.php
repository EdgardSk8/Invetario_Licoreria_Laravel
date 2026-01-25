<nav class="navbar">
    <div class="nav_izquierdo">
        <!-- Botón hamburguesa animado -->
        <button id="menu_desplegable" class="hamburger">
            <div class="_layer -top"></div>
            <div class="_layer -mid"></div>
            <div class="_layer -bottom"></div>
        </button>

        <div class="titulo">Licoreria Jack Parrison</div>
    </div>

    <div class="Usuario_Perfil">
        <span class="Nombre_Usuario">Edgard</span>
        <span class="Usuario_Rol">Administrador</span>
    </div>
</nav>

<div id="menu_lateral">
    <a href="./Principal">Dashboard</a>
    <a href="./Productos">Productos</a>
    <a href="./Categorias">Categorías</a>
    <a href="./Proveedores">Proveedores</a>
    <a href="./Ventas">Ventas</a>
    <a href="./Recibos">Recibos</a>
    <a href="./Usuarios">Usuarios</a>

    <!-- Cerrar sesión -->
    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout">Cerrar sesión</button>
    </form>
</div>



<script>
const btnMenu = document.getElementById('menu_desplegable');
const menu = document.getElementById('menu_lateral');

btnMenu.addEventListener('click', () => {
    menu.classList.toggle('activo');        // tu menú lateral
    btnMenu.classList.toggle('is-active');  // animación hamburguesa
});

menu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
        menu.classList.remove('activo');      // ocultar sidebar
        btnMenu.classList.remove('is-active'); // volver hamburguesa a estado normal
    });
})

</script>

<style>

/* ----------------------------------------------------------------------------------- */

* {margin: 0; padding: 0; box-sizing: border-box;}
body{ font-family: 'Inter', sans-serif; background-color: rgb(238, 238, 238); }

/* [BARRA DE NAVEGACION] */

.navbar {
    display: flex;
    justify-content: space-between;
    background-color: #373f47;
    padding: 10px 20px;
    color: white;
    height: 50px; /* Importante */
    z-index: -1000;
}

.nav_izquierdo { display: flex; align-items: center; gap: 15px; }
.titulo { font-weight: bold; font-size: 20px; }
.Usuario_Perfil{ display: flex; flex-direction: column; }
.Nombre_Usuario { font-size: 18px; font-weight: bold; }
.Usuario_Rol { font-size: 13px; color: #a0a5a9; }

/* ----------------------------------------------------------------------------------- */

/* [MENU DESPLEGABLE] */

#menu_lateral {
    position: fixed;
    top: 50px; 
    left: 0;
    width: 220px;
    height: calc(100vh - 50px);
    background-color: #2f363d;
    display: flex;
    flex-direction: column;
    padding: 15px;
    gap: 5px;

    /* oculto por defecto */
    transform: translateX(-100%);
    transition: transform 0.5s ease;
    z-index: 1000;
}

#menu_lateral a {
    color: white;
    text-decoration: none;
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;

    transition: background-color 0.3s ease, padding-left 0.3s ease, color 0.3s ease;
}

#menu_lateral.activo { transform: translateX(0); }
#menu_lateral a:hover { background-color: #5d7b85ff;padding-left: 18px; }
#menu_lateral .logout { color: #ff6b6b; margin-top: auto; }

/* ----------------------------------------------------------------------------------- */

/* [BOTON DE HAMBURGUESA] */

.hamburger {
    width: 28px;
    height: 22px;
    background: transparent;
    border: none;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    cursor: pointer;
    padding: 0;
}

._layer {
    height: 3px;
    width: 100%;
    background-color: white;
    border-radius: 2px;
    transition: all 0.3s ease;
}

/* Animación al abrir */
.hamburger.is-active .-top { transform: translateY(10px) rotate(45deg); }
.hamburger.is-active .-mid { opacity: 0; }
.hamburger.is-active .-bottom { transform: translateY(-10px) rotate(-45deg); }

/* ----------------------------------------------------------------------------------- */

/* [BOTON DE CERRAR SESION] */

.logout-form button.logout { /* Mantener estilo del enlace */
    background: none;
    border: none;
    color: #ff6b6b;
    font-weight: bold;
    cursor: pointer;
    padding: 10px;
    text-align: left;
    width: 100%;
    border-radius: 5px;
    font-size: 14px;
    transition: background-color 0.3s ease, padding-left 0.3s ease;
    margin-top: auto; /* Empuja al fondo */
}

.logout-form button.logout:hover { background-color: #5d7b85ff; padding-left: 18px; }


</style>