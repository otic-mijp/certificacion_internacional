import Swal from 'sweetalert2'; // Si instalaste sweetalert2 vía npm

document.addEventListener('click', (e) => {
    const btnLimpiar = e.target.closest('#btn-limpiar-formulario');

    if (!btnLimpiar) return;

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se borrarán todos los datos introducidos en el formulario.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'rgb(41, 88, 207)',
        cancelButtonColor: '#4a4b4d73',
        confirmButtonText: 'Sí, limpiar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true

    }).then((result) => {
        if (result.isConfirmed) {
            // 3. Buscar el formulario más cercano o por ID
            const formulario = document.getElementById('formulario-login');

            if (formulario) {
                formulario.reset();

                // Opcional: Alerta de éxito
                Swal.fire({
                    title: '¡Limpiado!',
                    text: 'El formulario ha sido restablecido.',
                    icon: 'success',
                    showConfirmButton: true
                });
            }
        }
    });
}); 