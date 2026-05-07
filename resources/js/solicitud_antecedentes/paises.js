/**
 * Buscador de Países - Versión: Sin selección por defecto
 */
document.addEventListener('DOMContentLoaded', () => {
    const selectOriginal = document.getElementById('pais_solicitud');
    const inputBusqueda = document.getElementById('custom-search-input');
    const listaOpciones = document.getElementById('custom-options-list');
    const contenedorSelect = document.getElementById('custom-select-container');

    if (!selectOriginal || !inputBusqueda) return;

    // Filtramos las opciones reales (excluyendo la opción "Seleccione...")
    const opcionesOriginales = Array.from(selectOriginal.options).filter(opt => opt.value !== '' && !opt.disabled);

    /**
     * FUNCIÓN: inicializarPersistencia
     * CORRECCIÓN CRÍTICA: Solo rellena el input si Laravel envió un valor previo.
     */
    const inicializarPersistencia = () => {
        // Buscamos si existe alguna opción que tenga el atributo 'selected' de HTML
        // Esto evita que el navegador elija la primera opción por su cuenta.
        const opcionRealmenteSeleccionada = Array.from(selectOriginal.options).find(opt => opt.hasAttribute('selected'));

        if (opcionRealmenteSeleccionada && opcionRealmenteSeleccionada.value !== "") {
            // Si Laravel (vía old) marcó una opción, la mostramos
            inputBusqueda.value = opcionRealmenteSeleccionada.text.trim();
            selectOriginal.value = opcionRealmenteSeleccionada.value;
        } else {
            // Si no hay 'selected' real, limpiamos todo para evitar "Eslovaquia" por defecto
            inputBusqueda.value = '';
            selectOriginal.value = ''; 
        }
    };

    /**
     * FUNCIÓN: renderizarOpciones
     */
    const renderizarOpciones = (filtro = '') => {
        listaOpciones.innerHTML = '';
        const termino = filtro.trim().toLowerCase();

        const filtradas = opcionesOriginales.filter(opt =>
            opt.text.toLowerCase().includes(termino)
        );

        if (filtradas.length === 0) {
            listaOpciones.innerHTML = `<li class="px-4 py-3 text-sm text-slate-400 italic">No hay coincidencias</li>`;
            return;
        }

        filtradas.forEach(opt => {
            const li = document.createElement('li');
            li.textContent = opt.text;
            li.className = 'px-4 py-3 text-sm font-bold text-slate-700 hover:bg-blue-50 hover:text-blue-600 cursor-pointer transition-colors';
            
            li.addEventListener('click', () => {
                selectOriginal.value = opt.value;
                inputBusqueda.value = opt.text;
                listaOpciones.classList.add('hidden');
                // Disparamos evento para que Laravel u otros scripts noten el cambio
                selectOriginal.dispatchEvent(new Event('change'));
            });
            listaOpciones.appendChild(li);
        });
    };

    // --- EVENTOS ---

    inputBusqueda.addEventListener('focus', () => {
        renderizarOpciones(inputBusqueda.value);
        listaOpciones.classList.remove('hidden');
    });

    inputBusqueda.addEventListener('input', (e) => {
        renderizarOpciones(e.target.value);
        // Si el usuario borra el texto, reseteamos el valor oculto
        if (e.target.value === '') {
            selectOriginal.value = '';
        }
    });

    // Cerrar lista al hacer clic fuera
    document.addEventListener('click', (e) => {
        if (!contenedorSelect.contains(e.target)) {
            listaOpciones.classList.add('hidden');
        }
    });

    // Iniciar script
    inicializarPersistencia();
});