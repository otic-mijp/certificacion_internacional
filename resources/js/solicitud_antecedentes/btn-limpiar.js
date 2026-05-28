import Swal from 'sweetalert2';

const btnLimpiar = document.getElementById('btnLimpiar');

if (btnLimpiar) {

    btnLimpiar.addEventListener('click', () => {

        document.getElementById('miFormulario').reset();

        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Formulario limpiado',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });

    });


}