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

    showModal();

    btnCerrarX.addEventListener('click', hideModal);
    btnEntendido.addEventListener('click', hideModal);
    overlay.addEventListener('click', hideModal);
});