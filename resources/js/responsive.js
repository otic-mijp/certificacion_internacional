document.addEventListener('DOMContentLoaded', () => {
    
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');

    if (btn && menu && iconOpen && iconClose) {
        btn.addEventListener('click', () => {
            // Alternar visibilidad del menú
            const isHidden = menu.classList.contains('hidden');

            if (isHidden) {
                menu.classList.remove('hidden');
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            }
        });

        // Cerrar menú si se redimensiona a pantalla grande
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                menu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            }
        });
    }

});