/**
 * Inicializa la funcionalidad de mostrar/ocultar contraseña
 */
export function initPasswordToggle() {
    const toggleButtons = document.querySelectorAll('.toggle-password-btn');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const inputId = this.getAttribute('data-input-id');
            const input = document.getElementById(inputId);
            const icon = this.querySelector('.eye-icon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                `;
            } else {
                input.type = 'password';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        });
    });
}

/**
 * Inicializa la validación de requisitos y coincidencia
 */
function initPasswordSecurity() {
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');
    const submitBtn = document.getElementById('submit-btn');

    const requirements = {
        length: { el: document.getElementById('req-length'), regex: /^.{8,15}$/ },
        caps: { el: document.getElementById('req-caps'), regex: /^(?=.*[a-z])(?=.*[A-Z]).+$/ },
        special: { el: document.getElementById('req-special'), regex: /[!@#$%^&*(),.?":{}|<>#$%\&*\-+?¿]/ }
    };

    if (!passwordInput || !submitBtn) return;

    passwordInput.addEventListener('input', function () {
        const value = this.value;

        // Validar requisitos individuales
        Object.keys(requirements).forEach(key => {
            const { el, regex } = requirements[key];
            if (el) updateRequirementUI(el, regex.test(value));
        });

        checkFormReady(); // Comprobar si habilitamos el botón
    });

    if (confirmInput) {
        confirmInput.addEventListener('input', checkFormReady);
    }

    function checkFormReady() {
        // 1. Verificar requisitos de seguridad
        const allReqsPassed = Object.values(requirements).every(req =>
            req.regex.test(passwordInput.value)
        );

        // 2. Verificar que coincidan
        const passwordsMatch = passwordInput.value === confirmInput.value && passwordInput.value !== "";

        // 3. Lógica de habilitación
        if (allReqsPassed && passwordsMatch) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('bg-slate-400', 'cursor-not-allowed', 'opacity-70');
            submitBtn.classList.add('bg-[#233C7E]', 'cursor-pointer', 'opacity-100');
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add('bg-slate-400', 'cursor-not-allowed', 'opacity-70');
            submitBtn.classList.remove('bg-[#233C7E]', 'cursor-pointer', 'opacity-100');
        }

        // También actualizamos el borde del confirmInput para feedback visual
        validateMatchUI(passwordInput.value, confirmInput.value);
    }

    function validateMatchUI(val1, val2) {
        confirmInput.classList.remove('border-slate-300', 'border-green-500', 'border-red-400');
        if (val2 === "") {
            confirmInput.classList.add('border-slate-300');
        } else if (val1 === val2) {
            confirmInput.classList.add('border-green-500');
        } else {
            confirmInput.classList.add('border-red-400');
        }
    }
}

/**
 * Actualiza la interfaz de cada requisito individual
 */
function updateRequirementUI(element, isValid) {
    const iconContainer = element.querySelector('.icon-container');
    const label = element.querySelector('.label-text');

    if (isValid) {
        iconContainer.className = "icon-container mt-1 w-5 h-5 rounded-full flex items-center justify-center transition-all bg-[#233C7E] border-2 border-[#233C7E]";
        label.classList.remove('text-slate-400');
        label.classList.add('text-[#233C7E]');
        iconContainer.innerHTML = `
            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M5 13l4 4L19 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>`;
    } else {
        iconContainer.className = "icon-container mt-1 w-5 h-5 rounded-full flex items-center justify-center transition-all bg-white border-2 border-slate-200";
        label.classList.remove('text-[#233C7E]');
        label.classList.add('text-slate-400');
        iconContainer.innerHTML = `<div class="dot w-1.5 h-1.5 rounded-full bg-slate-200"></div>`;
    }
}

// Ejecución al cargar el documento
document.addEventListener('DOMContentLoaded', () => {
    initPasswordToggle();
    initPasswordSecurity();
});