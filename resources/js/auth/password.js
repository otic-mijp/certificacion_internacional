// document.addEventListener('DOMContentLoaded', function () {
//     // 1. Lógica para mostrar/ocultar contraseña
//     const toggleButton = document.querySelector('button[type="button"]');
//     const passwordInput = document.getElementById('password');
//     const confirmInput = document.getElementById('password_confirmation');

//     // Obtenemos el SVG para poder cambiarlo si quieres (opcional)
//     const eyeIcon = toggleButton.querySelector('svg');

//     toggleButton.addEventListener('click', function () {
//         // Cambiamos el tipo de input de password a text y viceversa
//         const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
//         passwordInput.setAttribute('type', type);
//         confirmInput.setAttribute('type', type); // Opcional: que ambos se muestren a la vez

//         // Cambiar color del ícono para indicar estado
//         this.classList.toggle('text-blue-600');
//         this.classList.toggle('text-slate-400');
//     });

//     // 2. Validación en tiempo real (Coincidencia de contraseñas)
//     function validatePasswords() {
//         if (confirmInput.value === '') {
//             confirmInput.classList.remove('border-green-500', 'border-red-500');
//             return;
//         }

//         if (passwordInput.value === confirmInput.value) {
//             confirmInput.classList.remove('border-red-500', 'border-slate-200');
//             confirmInput.classList.add('border-green-500');
//         } else {
//             confirmInput.classList.remove('border-green-500', 'border-slate-200');
//             confirmInput.classList.add('border-red-500');
//         }
//     }

//     passwordInput.addEventListener('input', validatePasswords);
//     confirmInput.addEventListener('input', validatePasswords);
// });