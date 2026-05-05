document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('modal-container');
    const content = document.getElementById('modal-content');
    const btn = document.getElementById('modal-confirm-button');

    // Si NO existen los elementos, salimos de la función sin hacer nada
    if (!container || !content) return;

    const openModal = () => {
        container.classList.remove('opacity-0', 'pointer-events-none');
        container.classList.add('opacity-100');
        
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    };

    const closeModal = () => {
        container.classList.replace('opacity-100', 'opacity-0');
        container.classList.add('pointer-events-none');
        
        content.classList.replace('scale-100', 'scale-95');
        content.classList.replace('opacity-100', 'opacity-0');
    };

    // Abrir automáticamente con un pequeño delay para que se note la animación
    setTimeout(openModal, 300);

    // Cerrar al clickear el botón
    if (btn) btn.addEventListener('click', closeModal);
});