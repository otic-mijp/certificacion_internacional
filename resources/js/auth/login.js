document.addEventListener("DOMContentLoaded", () => {
    
    const modal = document.getElementById('modal-imagen');
    const overlay = document.getElementById('modal-overlay');
    const btnCerrarX = document.getElementById('btn-cerrar-x');
    const btnEntendido = document.getElementById('btn-entendido');

    const showModal = () => {
        if (modal) {
            modal.classList.remove('hidden');
        }
    };

    const hideModal = () => {
        if (modal) {
            modal.classList.add('hidden');
        }
    };

    // Solo ejecutamos si el modal existe
    if (modal) {
        showModal();
        
        // Validamos cada botón individualmente para evitar errores en consola
        if (btnCerrarX) {
            btnCerrarX.addEventListener('click', hideModal);
        }

        if (btnEntendido) {
            btnEntendido.addEventListener('click', hideModal);
        }

        if (overlay) {
            overlay.addEventListener('click', hideModal);
        }
    }
});