// Función para forzar la escritura en mayúsculas
function forceKeyPressUppercase(e) {
    var charInput = e.keyCode || e.which; // Soporte para navegadores antiguos
    if ((charInput >= 97) && (charInput <= 122)) { // Letras minúsculas (ASCII)
        if (!e.ctrlKey && !e.metaKey && !e.altKey) { // Sin teclas modificadoras
            var newChar = charInput - 32; // Convertir a mayúscula
            var start = e.target.selectionStart;
            var end = e.target.selectionEnd;
            e.target.value = e.target.value.substring(0, start) + String.fromCharCode(newChar) + e.target.value.substring(end);
            e.target.setSelectionRange(start + 1, start + 1); // Mover el cursor
            e.preventDefault(); // Prevenir el comportamiento predeterminado
        }
    }
}

// Función para eliminar un cliente
function borrar(id) {
    Swal.fire({
        title: '¿Borrar registro?',
        text: "¡Esta acción no se puede deshacer!",
        icon: 'warning', // Cambiado de 'type' a 'icon' para versiones actuales de SweetAlert2
        showCancelButton: true,
        confirmButtonColor: '#27BDBB',
        cancelButtonColor: '#E86F54',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) { // SweetAlert usa `isConfirmed` en lugar de `value`
            $.ajax({
                type: 'GET',
                url: "php/bajarclientes.php",
                data: { id: id }, // Usar objeto para mayor claridad
                beforeSend: function() {
                    $('#resultados').html("Cargando...");
                },
                success: function(response) {
                    // Manejar la respuesta en caso de éxito
                    Swal.fire({
                        title: '¡Eliminado!',
                        text: 'El registro ha sido eliminado con éxito.',
                        icon: 'success',
                        timer: 2000, // Cierra automáticamente después de 2 segundos
                        showConfirmButton: false
                    }).then(() => {
                        // Redirigir después de mostrar la confirmación
                        window.location.href = "listaclientes.php";
                    });
                },
                error: function(xhr, status, error) {
                    // Manejar errores
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema al intentar eliminar el registro.',
                        icon: 'error'
                    });
                }
            });
        }
    });
}
