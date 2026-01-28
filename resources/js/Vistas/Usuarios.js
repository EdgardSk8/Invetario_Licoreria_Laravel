import $ from 'jquery';

export function initUsuarios() {
    const $tabla = $('#tablaUsuarios');

    // Destruir DataTable previa si existiera
    if ($.fn.DataTable.isDataTable($tabla)) {
        $tabla.DataTable().destroy();
    }

    // Inicializar DataTable con AJAX
    $tabla.DataTable({
        ajax: {
            url: '/usuarios', // ruta para obtener datos
            dataSrc: 'data'
        },
        columns: [
            { data: 'fotografia', title: 'Fotografía', defaultContent: ' - ' },
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
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Último"
            },
            aria: {
                sortAscending: ": activar para ordenar la columna ascendente",
                sortDescending: ": activar para ordenar la columna descendente"
            }
        }
    });
}
