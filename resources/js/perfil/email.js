// 1. Selección de elementos del DOM
const emailInput = document.getElementById('email-update');
const confirmInput = document.getElementById('email_confirmation-update');
const submitBtn = document.getElementById('email-submit-btn-update');
const pasteError = document.getElementById('paste-error');

/**
 * Solo ejecutamos la lógica si los elementos esenciales existen
 */
if (emailInput && confirmInput && submitBtn) {

    /**
     * Función para validar que ambos correos coincidan y no estén vacíos.
     */
    const validateInputs = () => {
        const isMatch = emailInput.value === confirmInput.value;
        const isNotEmpty = emailInput.value.length > 0;

        if (isMatch && isNotEmpty) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('bg-slate-400', 'cursor-not-allowed', 'opacity-70');
            submitBtn.classList.add('bg-[#233C7E]', 'cursor-pointer', 'opacity-100');
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add('bg-slate-400', 'cursor-not-allowed', 'opacity-70');
            submitBtn.classList.remove('bg-[#233C7E]', 'cursor-pointer', 'opacity-100');
        }
    };

    /**
     * Manejador para bloquear el pegado en el campo de confirmación.
     */
    confirmInput.addEventListener('paste', (e) => {
        e.preventDefault();

        if (pasteError) {
            pasteError.classList.remove('hidden');
            setTimeout(() => {
                pasteError.classList.add('hidden');
            }, 3000);
        }
    });

    /**
     * 2. Escucha de eventos para validación en tiempo real
     */
    emailInput.addEventListener('input', validateInputs);
    confirmInput.addEventListener('input', validateInputs);
}