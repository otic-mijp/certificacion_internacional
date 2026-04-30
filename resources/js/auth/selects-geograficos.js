document.addEventListener("DOMContentLoaded", function () {

    // 1. INICIALIZACIÓN DE LOS GRUPOS
    // Estado dispara la carga de Municipios
    setupCustomSelect('group-estado', (id) => cargarHijos('municipio', id));

    // Municipio dispara la carga de Parroquias
    setupCustomSelect('group-municipio', (id) => cargarHijos('parroquia', id));

    // Parroquia y Profesión no tienen hijos, así que no llevan callback
    setupCustomSelect('group-parroquia');
    setupCustomSelect('group-profesion');

    /**
     * Función Maestra para configurar cada Select
     */
    function setupCustomSelect(groupId, callback = null) {
        const group = document.getElementById(groupId);
        if (!group) return;

        const buscador = group.querySelector('.buscador');
        const lista = group.querySelector('.lista');
        const inputReal = group.querySelector('.input-real');
        const noResults = group.querySelector('.no-results');

        if (!buscador || !lista || !inputReal) return;

        let indexEnfocado = -1;

        buscador.addEventListener('focus', () => {
            if (!buscador.disabled) {
                lista.classList.remove('hidden');
                filtrarLocal(buscador.value);
            }
        });

        buscador.addEventListener('input', function () {
            if (this.value.trim() === "") inputReal.value = "";
            filtrarLocal(this.value);
        });

        buscador.addEventListener('keydown', function (e) {
            const visibles = Array.from(lista.querySelectorAll('.opcion-item'))
                .filter(opt => opt.style.display !== 'none');

            if (e.key === "ArrowDown") {
                e.preventDefault();
                indexEnfocado = (indexEnfocado + 1) % visibles.length;
                aplicarEnfoque(visibles);
            } else if (e.key === "ArrowUp") {
                e.preventDefault();
                indexEnfocado = (indexEnfocado - 1 + visibles.length) % visibles.length;
                aplicarEnfoque(visibles);
            } else if (e.key === "Enter") {
                e.preventDefault();
                if (indexEnfocado > -1 && visibles[indexEnfocado]) {
                    seleccionar(visibles[indexEnfocado]);
                }
            } else if (e.key === "Escape") {
                lista.classList.add('hidden');
            }
        });

        lista.addEventListener('mousedown', (e) => {
            const item = e.target.closest('.opcion-item');
            if (item) {
                e.preventDefault();
                seleccionar(item);
            }
        });

        function seleccionar(el) {
            buscador.value = el.textContent.trim();
            inputReal.value = el.dataset.value;
            lista.classList.add('hidden');
            buscador.blur();
            if (callback) callback(el.dataset.value);
        }

        function filtrarLocal(termino) {
            const term = termino.toLowerCase().trim();
            const opciones = lista.querySelectorAll('.opcion-item');
            let coincidencias = 0;

            opciones.forEach(opt => {
                const match = opt.textContent.toLowerCase().includes(term);
                opt.style.display = match ? 'block' : 'none';
                if (match) coincidencias++;
            });

            if (noResults) noResults.classList.toggle('hidden', coincidencias > 0);
            indexEnfocado = -1;
            opciones.forEach(o => o.classList.remove('bg-indigo-100'));
        }

        function aplicarEnfoque(visibles) {
            lista.querySelectorAll('.opcion-item').forEach(o => o.classList.remove('bg-indigo-100'));
            if (visibles[indexEnfocado]) {
                visibles[indexEnfocado].classList.add('bg-indigo-100');
                visibles[indexEnfocado].scrollIntoView({ block: 'nearest' });
            }
        }
    }

    /**
     * Función para cargar datos desde Laravel (Fetch API)
     * Adaptada para las rutas: /api/ubicacion/municipios/{id} y /api/ubicacion/parroquias/{id}
     */
    async function cargarHijos(tipo, padreId, idParaSeleccionar = null) {
        const targetGroup = document.getElementById(`group-${tipo}`);
        if (!targetGroup) return;

        const buscador = targetGroup.querySelector('.buscador');
        const lista = targetGroup.querySelector('.lista');
        const inputReal = targetGroup.querySelector('.input-real');

        if (!idParaSeleccionar) {
            buscador.value = "";
            inputReal.value = "";
        }

        // 1. Limpiar el campo actual
        buscador.disabled = false;
        buscador.classList.remove('bg-gray-50', 'bg-gray-100', 'cursor-not-allowed');
        buscador.classList.add('bg-white');
        lista.innerHTML = '<div class="p-3 text-sm text-slate-500 italic">Cargando...</div>';

        // 2. Limpieza en cascada: Si cargo municipios, debo resetear y bloquear parroquias
        if (tipo === 'municipio') {
            const parroquiaGroup = document.getElementById('group-parroquia');
            if (parroquiaGroup) {
                const pBuscador = parroquiaGroup.querySelector('.buscador');
                pBuscador.value = "";
                pBuscador.disabled = true;
                pBuscador.classList.add('bg-gray-100', 'cursor-not-allowed');
                parroquiaGroup.querySelector('.input-real').value = "";
                parroquiaGroup.querySelector('.lista').innerHTML = "";
            }
        }

        try {
            // Ajuste de ruta plural para Laravel
            const segmentoRuta = tipo === 'municipio' ? 'municipios' : 'parroquias';
            const response = await fetch(`http://localhost/certificacion_internacional/public/ubicacion/${segmentoRuta}/${padreId}`);
            const datos = await response.json();

            lista.innerHTML = '';

            if (datos.length === 0) {
                lista.innerHTML = '<div class="p-3 text-sm text-slate-400 text-center">Sin registros</div>';
                return;
            }

            datos.forEach(item => {
                const div = document.createElement('div');
                div.className = 'opcion-item p-3 text-sm cursor-pointer hover:bg-indigo-50 text-slate-600 border-b border-slate-50 last:border-0';
                div.dataset.value = item.id;
                div.textContent = item.nombre.toUpperCase();

                // Si coincide con el valor que Laravel recordó, lo escribimos en el buscador visual
                if (idParaSeleccionar && item.id == idParaSeleccionar) {
                    buscador.value = item.nombre.toUpperCase();
                }

                lista.appendChild(div);
            });

            // Re-añadir el div de no-results
            const nr = document.createElement('div');
            nr.className = 'no-results hidden p-4 text-sm text-slate-400 italic text-center bg-slate-50';
            nr.innerHTML = 'No hay resultados 🔍';
            lista.appendChild(nr);

        } catch (error) {
            console.error("Error al cargar:", error);
            lista.innerHTML = '<div class="p-3 text-sm text-red-500">Error al cargar datos</div>';
        }
    }

    document.addEventListener('mousedown', (e) => {
        const isInside = e.target.closest('.custom-select-group');
        if (!isInside) {
            document.querySelectorAll('.lista').forEach(l => l.classList.add('hidden'));
        }
    });

    function rehidratarSelects() {
        const estadoId = document.querySelector('#group-estado .input-real').value;
        const municipioId = document.querySelector('#group-municipio .input-real').value;

        if (estadoId) {
            // Cargamos municipios y le pasamos el ID del municipio guardado para que lo seleccione
            cargarHijos('municipio', estadoId, municipioId);
        }

        if (municipioId) {
            const parroquiaId = document.querySelector('#group-parroquia .input-real').value;
            // Cargamos parroquias y le pasamos el ID de la parroquia guardada
            cargarHijos('parroquia', municipioId, parroquiaId);
        }
    }

    rehidratarSelects();
});