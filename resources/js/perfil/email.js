/**
 * Inicializa la validación del cambio de correo
 */
export function initEmailValidation() {
    const emailInput = document.getElementById('email');
    const confirmInput = document.getElementById('email_confirmation');
    const submitBtn = document.getElementById('email-submit-btn');
    
    // Obtenemos el correo actual para comparar (puedes añadir un ID al input readonly si prefieres)
    const currentEmail = "jesusvilla1203@gmail.com"; 

    // Expresión regular para validar formato de email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailInput || !confirmInput || !submitBtn) return;

    const validateForm = () => {
        const emailValue = emailInput.value.trim();
        const confirmValue = confirmInput.value.trim();

        // 1. Validar formato
        const isFormatValid = emailRegex.test(emailValue);
        
        // 2. Validar que coincidan
        const doMatch = emailValue === confirmValue && emailValue !== "";

        // 3. Validar que sea diferente al actual
        const isDifferent = emailValue !== currentEmail;

        // Feedback visual para el input principal
        if (emailValue !== "") {
            updateInputStatus(emailInput, isFormatValid);
        } else {
            resetInputStatus(emailInput);
        }

        // Feedback visual para la confirmación
        if (confirmValue !== "") {
            updateInputStatus(confirmInput, doMatch);
        } else {
            resetInputStatus(confirmInput);
        }

        // Lógica del botón
        if (isFormatValid && doMatch && isDifferent) {
            submitBtn.disabled = false;
            submitBtn.className = "w-full py-4 bg-[#233C7E] hover:bg-[#1a2d5f] text-white text-sm font-bold uppercase tracking-widest rounded-xl shadow-lg shadow-blue-900/20 transition-all transform active:scale-[0.98] cursor-pointer opacity-100";
        } else {
            submitBtn.disabled = true;
            submitBtn.className = "w-full py-4 bg-slate-400 text-white text-sm font-bold uppercase tracking-widest rounded-xl shadow-lg transition-all opacity-70 cursor-not-allowed";
        }
    };

    // Funciones auxiliares para no repetir código
    function updateInputStatus(el, isValid) {
        if (isValid) {
            el.classList.remove('border-slate-200', 'border-red-400');
            el.classList.add('border-green-500');
        } else {
            el.classList.remove('border-slate-200', 'border-green-500');
            el.classList.add('border-red-400');
        }
    }

    function resetInputStatus(el) {
        el.classList.remove('border-green-500', 'border-red-400');
        el.classList.add('border-slate-200');
    }

    emailInput.addEventListener('input', validateForm);
    confirmInput.addEventListener('input', validateForm);
}

// Inicialización automática
document.addEventListener('DOMContentLoaded', initEmailValidation);