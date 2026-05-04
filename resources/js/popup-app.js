// document.addEventListener("DOMContentLoaded", () => {
    
//     // Referencias a los elementos usando los nuevos IDs
//     const modalContainer = document.getElementById('modal-container');
//     const modalBackdrop = document.getElementById('modal-backdrop');
//     const modalCloseIcon = document.getElementById('modal-close-icon');
//     const modalConfirmButton = document.getElementById('modal-confirm-button');

//     // Función para mostrar el modal
//     const showModal = () => {
//         if (modalContainer) {
//             modalContainer.classList.remove('hidden');
//         }
//     };

//     // Función para ocultar el modal
//     const hideModal = () => {
//         if (modalContainer) {
//             modalContainer.classList.add('hidden');
//         }
//     };

//     // Ejecutar la función para mostrar el modal al cargar la página
//     showModal();

//     // Asignación de eventos de escucha (Click)
//     // Usamos el operador ?. (optional chaining) para asegurar que el código no falle si falta un ID
//     modalCloseIcon?.addEventListener('click', hideModal);
//     modalConfirmButton?.addEventListener('click', hideModal);
//     modalBackdrop?.addEventListener('click', hideModal);
// });