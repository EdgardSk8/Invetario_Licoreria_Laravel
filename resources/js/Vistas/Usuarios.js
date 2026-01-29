import $ from 'jquery';

export function initUsuarios() {
    
    const $tabla = $('#tablaUsuarios');

    // Destruir DataTable previa si existiera
    if ($.fn.DataTable.isDataTable($tabla)) { $tabla.DataTable().destroy();}

    $tabla.DataTable({// Inicializar DataTable con AJAX

        ajax: { url: '/usuarios', dataSrc: 'data'},
        columns: [
            { data: 'fotografia', title: 'Fotografía',    orderable: false,
                searchable: false, render: function (data) {
                return `<img class="fotografia"
                            src="${data ? `/storage/${data}` : '/Recursos/SinFoto.png'}"
                            alt="Foto usuario" onerror="this.src='/Recursos/SinFoto.png'"
                        >`;
                }
            },
            { data: 'nombre_usuario', title: 'Nombre', defaultContent: ' - ' },
            { data: 'usuario_login', title: 'Usuario', defaultContent: ' - ' },
            { data: 'documento_identificacion', title: 'Documento', defaultContent: ' - ' },
            //{ data: 'fecha_nacimiento', title: 'Fecha Nacimiento', defaultContent: ' - ' },
            { data: 'direccion', title: 'Dirección', defaultContent: ' - ' },
            { data: 'telefono', title: 'Teléfono', defaultContent: ' - ' },
            // data: 'fecha_ingreso', title: 'Fecha Ingreso', defaultContent: ' - ' },
            { data: 'genero', title: 'Género', defaultContent: ' - ' },
            { data: 'rol.nombre_rol', title: 'Rol', defaultContent: ' - ' }
        ],
        pageLength: 10,
        searching: true,
        paging: true,
        info: true,
        ordering: true,
        order: [[0, 'asc']],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "No hay datos disponibles",
            paginate: {first: "Primero", previous: "Anterior", next: "Siguiente", last: "Último"},
            aria: {
                sortAscending: ": activar para ordenar la columna ascendente",
                sortDescending: ": activar para ordenar la columna descendente"
            }
        }
    });

const btnAgregarUsuarios = document.querySelector('.DisplayAgregarUsuarios');
const formUsuarios = document.querySelector('.form-usuarios');
const dtContainer = document.querySelector('.dt-container');

const transitionOriginal = dtContainer.style.transition;
dtContainer.style.transition = "none";
dtContainer.style.transform = "translateY(-50px)";
dtContainer.offsetHeight;
dtContainer.style.transition = transitionOriginal
let abierto = false;

btnAgregarUsuarios.addEventListener('click', () => {
    if (!abierto) {
        formUsuarios.style.maxHeight = formUsuarios.scrollHeight + "px";
        formUsuarios.style.opacity = 1;
        dtContainer.style.transform = "translateY(0px)";
    } else {
        formUsuarios.style.maxHeight = "0";
        formUsuarios.style.opacity = 0;
        dtContainer.style.transform = "translateY(-50px)";
    }
    abierto = !abierto;
});

    
}

mostrarFotoPreview();

function mostrarFotoPreview() {

    const input = document.getElementById('fotografiaInput');
    const preview = document.getElementById('fotoPreview');

    input.addEventListener('change', () => {
        const file = input.files[0];

        if (!file) { preview.innerHTML = 'Vista previa';return;}
        if (!file.type.startsWith('image/')) { preview.innerHTML = 'Archivo no válido'; input.value = '';return;}

        const reader = new FileReader();

        reader.onload = e => { preview.innerHTML = `<img src="${e.target.result}">`;};
        reader.readAsDataURL(file);

    });
}


