document.addEventListener('DOMContentLoaded', function () {
    // Seleccionamos ambos campos por su ID
    const inputsTelefónicos = ['telefono_celular', 'telefono_local'];

    if (inputsTelefónicos) {

        inputsTelefónicos.forEach(id => {

            const input = document.getElementById(id);

            if (input) {
                input.addEventListener('input', function (e) {
                    let value = e.target.value;

                    // Nueva Regla: Permitir números, espacios y el signo + al inicio
                    // Explicación: (?!^\+) ignora el + al inicio, [^\d\s] busca lo que NO sea dígito o espacio
                    let cleaned = value.replace(/(?!^\+)[^\d\s]/g, '');

                    // Limitar longitud para evitar abusos en la BD (30 caracteres es seguro)
                    if (cleaned.length > 30) {
                        cleaned = cleaned.substring(0, 30);
                    }

                    e.target.value = cleaned;
                });
            }

        });
    }

});