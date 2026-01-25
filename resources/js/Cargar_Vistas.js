document.addEventListener('DOMContentLoaded', () => {
    const main = document.getElementById('vistas');

    // Función para cargar vista
    function cargarVista(url) {
        fetch(url)
            .then(res => res.text())
            .then(html => {
                main.innerHTML = html;
            })
            .catch(err => console.error(err));
    }

    document.querySelectorAll('#menu_lateral a').forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const href = link.getAttribute('href');
            cargarVista(href);
        });
    });

    cargarVista('Principal'); // Cargar la vista por defecto al entrar al panel
});
