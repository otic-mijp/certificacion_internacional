document.addEventListener('click', (e) => {
    const btn = e.target.closest('#toggle-all-passwords');
    if (!btn) return;

    // Seleccionamos todos los inputs que deben cambiar juntos
    const passwordInputs = document.querySelectorAll('.input-password-group');
    const icon = btn.querySelector('.toggle-icon');

    // Verificamos el estado del primer input para decidir si mostrar u ocultar todos
    if (passwordInputs.length > 0) {
        const showPasswords = passwordInputs[0].type === 'password';

        passwordInputs.forEach(input => {
            input.type = showPasswords ? 'text' : 'password';
        });

        // Feedback visual del botón
        btn.classList.toggle('text-blue-600', showPasswords);
        btn.classList.toggle('text-slate-400', !showPasswords);

        // Opcional: Cambiar el icono (puedes usar la lógica de paths anterior aquí)
        // btn.innerHTML = showPasswords ? eyeClosedIcon : eyeOpenIcon;
    }
});