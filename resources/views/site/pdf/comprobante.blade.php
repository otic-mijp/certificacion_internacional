<!DOCTYPE html>
<html lang="es-ve">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Antecedentes Penales</title>
    <style>
        /* Configuración base para DomPDF */
        @page {
            margin: 0.5cm 1.5cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.5;
            font-size: 11pt;
            color: #1a1a1a;
            margin: 0;
            padding: 0;
        }

        /* --- Marca de Agua Centrada --- */
        .fondo-escudo {
            position: absolute;
            top: 20%;
            left: 50%;
            width: 500px;
            height: 500px;
            margin-left: -250px; /* Truco DomPDF: Mitad del ancho para centrar horizontalmente */
            opacity: 0.15;       /* Reducido un poco para garantizar la legibilidad del texto */
            z-index: -1;
        }

        /* --- Encabezado Corregido y Centrado --- */
        .tabla-header {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .celda-logo-izq {
            width: 20%;
            text-align: left;
            vertical-align: middle;
        }

        .celda-logo-der {
            width: 20%;
            text-align: right;
            vertical-align: middle;
        }

        .texto-header {
            width: 60%; /* 20% + 60% + 20% = 100% Perfecto */
            text-align: center;
            font-size: 7.5pt;
            font-weight: bold;
            color: #333;
            line-height: 1.4;
            text-transform: uppercase;
            vertical-align: middle;
        }

        .img-header-izq {
            width: 80px;
            height: auto;
        }

        /* --- Títulos y Contenido (Para cuando agregues el cuerpo) --- */
        .titulo-principal {
            text-align: center;
            font-size: 14pt;
            margin: 20px 0;
            font-weight: bold;
            color: #000;
            text-transform: uppercase;
        }

        /* --- Footer Fijo abajo --- */
        .footer-pagina {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
        }

        .img-banner-footer {
            width: 100%;
            height: 40px;
        }

        .footer-texto {
            font-size: 7pt;
            margin-top: 8px;
            color: #444;
            line-height: 1.3;
        }
    </style>
</head>

<body>
    <!-- Escudo de fondo -->
    <img src="{{ $logo_ministerial_fondo }}" class="fondo-escudo">

    <!-- Encabezado simétrico -->
    <table class="tabla-header">
        <tr>
            <td class="celda-logo-izq">
                <img src="{{ $logo_ministerial }}" class="img-header-izq">
            </td>
            <td class="texto-header">
                República Bolivariana de Venezuela <br>
                Ministerio del Poder Popular para las Relaciones Interiores, Justicia y Paz <br>
                Despacho del Viceministerio de Política Interior y Seguridad Jurídica <br>
                Dirección General de Articulación para Justicia y Paz <br>
                Coordinación de Antecedentes Penales
            </td>
            <!-- Esta celda equilibra la balanza para que el texto quede centrado exactamente -->
            <td class="celda-logo-der">
                <!-- Puedes dejarla vacía o poner un segundo logo si fuera necesario -->
            </td>
        </tr>
    </table>

    <!-- El contenido del certificado iría aquí -->

    <!-- Pie de página -->
    <footer class="footer-pagina">
        <img src="{{ $banner_footer }}" alt="Img Banner" class="img-banner-footer">
        <div class="footer-texto">
            Esquina de Platanal, Este 1, Avenida Urdaneta, Edificio Sede MPPRIJP, Piso {{ $piso }}, Parroquia La Candelaria, <br>
            Municipio Libertador, Caracas, Venezuela. Teléfono: +58 {{ $telefono_ministerio }}
        </div>
    </footer>
</body>
</html>