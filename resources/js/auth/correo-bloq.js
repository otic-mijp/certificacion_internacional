document.addEventListener('paste', (e) => {
    const input = e.target.closest('#email_confirmation');
    if (!input) return;

    // Impedir que se pegue el contenido
    e.preventDefault();

    // Mostrar el mensaje de advertencia
    const aviso = document.getElementById('msg-no-paste');
    if (aviso) {
        aviso.classList.remove('hidden');

        // Ocultar el mensaje después de 3 segundos
        clearTimeout(window.pasteTimeout);
        window.pasteTimeout = setTimeout(() => {
            aviso.classList.add('hidden');
        }, 3000);
    }
});

// Bloquear también el arrastre de texto (drag & drop)
document.addEventListener('drop', (e) => {
    if (e.target.closest('#email_confirmation')) {
        e.preventDefault();
    }
});