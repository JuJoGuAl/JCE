document.addEventListener('DOMContentLoaded', () => {
    // Seleccionar el botón y el contenido del menú desplegable
    const dropdownButton = document.getElementById("dropdownMenuButton");
    const dropdownContent = document.getElementById("dropdown-content");
    // Obtiene el modal
    const modal = document.getElementById("miModal");
    // Obtiene el botón que abre el modal
    const btn = document.getElementById("abrirModal");
    const btn2 = document.getElementById("abrirModal2");
    // Obtiene el elemento <span> que cierra el modal
    const span = document.getElementsByClassName("cerrar")[0];

    // Alternar la visualización del contenido del menú desplegable
    dropdownButton.onclick = function() {
        dropdownContent.classList.toggle("show");
    };

    document.addEventListener('click', function(event) {
        var isDropdownButton = dropdownButton.contains(event.target);
        var isInsideDropdown = dropdownContent.contains(event.target);
        if (!isDropdownButton && !isInsideDropdown && dropdownContent.classList.contains('show')) {
            dropdownContent.classList.remove('show');
        }
    });


    // Cuando el usuario hace clic en el botón, abre el modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
    // Cuando el usuario hace clic en el botón, abre el modal
    btn2.onclick = function() {
        modal.style.display = "block";
    }

    // Cuando el usuario hace clic en <span> (x), cierra el modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Cuando el usuario hace clic en cualquier lugar fuera del modal, lo cierra
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

