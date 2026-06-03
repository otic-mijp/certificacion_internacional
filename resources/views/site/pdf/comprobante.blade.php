<!DOCTYPE html>
<html lang="es-ve">

<head>
    <meta charset="UTF-8">
    <title>Comprobante de Solicitud de Antecedentes Penales</title>
    <style>
        /* --- Configuración del Papel para DomPDF --- */
        @page {
            size: letter; /* Asegura el tamaño Carta de forma estricta */
            margin: 0.8cm 1.5cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.5;
            font-size: 10pt; /* Normalizado para balance en tamaño Carta */
            color: #2c3e50;
            margin: 0;
            padding: 0;
        }

        /* --- Marca de Agua / Fondo --- */
        .fondo-escudo {
            position: absolute;
            top: 25%;
            left: 50%;
            width: 450px;
            height: 450px;
            margin-left: -225px;
            opacity: 0.08;
            z-index: -1;
        }

        /* --- Encabezado --- */
        .tabla-header {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .texto-header {
            width: 60%;
            text-align: center;
            font-size: 7pt;
            font-weight: bold;
            color: #333;
            line-height: 1.4;
            text-transform: uppercase;
        }

        .img-header-izq {
            width: 75px;
            height: auto;
        }

        /* --- Título y Trámite --- */
        .titulo-principal {
            text-align: center;
            font-size: 13pt;
            margin: 10px 0 15px 0;
            font-weight: bold;
            color: #000000;
            width: 100%;
            letter-spacing: 0.5px;
        }

        /* Corrección DomPDF: Centrado clásico usando tablas en lugar de inline-block */
        .tabla-tramite {
            width: 100%;
            margin-bottom: 25px;
        }

        .numero-tramite {
            font-size: 10.5pt;
            font-weight: bold;
            color: #d32f2f;
            background-color: #fdf2f2;
            padding: 6px 15px;
            border: 1px solid #ffcdd2;
            text-align: center;
        }

        /* --- Bloque de Datos --- */
        .seccion-titulo {
            font-size: 11pt;
            font-weight: bold;
            color: #002e63;
            border-bottom: 1px solid #ced4da;
            padding-bottom: 4px;
            margin-top: 20px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .tabla-datos {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fafafa;
            border: 1px solid #e0e0e0;
        }

        .tabla-datos td {
            padding: 10px 12px;
            border-bottom: 1px solid #eeeeee;
        }

        .label-dato {
            font-weight: bold;
            width: 35%;
            font-size: 9.5pt;
            color: #4f5f6f;
        }

        .valor-dato {
            color: #111111;
            text-transform: uppercase;
            font-size: 10pt;
        }
        
        .negrita {
            font-weight: bold;
        }

        /* --- Nota de Advertencia --- */
        .nota-advertencia {
            font-size: 8pt;
            color: #7f8c8d;
            font-style: italic;
            margin-top: 10px;
        }

        /* --- Footer Fijo Abajo --- */
        .footer-pagina {
            position: absolute;
            bottom: 0px; /* Ajustado al margen del @page */
            width: 100%;
            text-align: center;
        }

        .img-banner-footer {
            width: 100%;
            height: auto;
            max-height: 75px;
            display: block;
            margin: 0 auto;
        }

        .footer-texto {
            font-size: 6pt;
            margin-top: 5px;
            color: #444;
            line-height: 1.2;
        }
    </style>
</head>

<body>
    @if ($logo_ministerial_fondo)
        <img src="{{ $logo_ministerial_fondo }}" class="fondo-escudo">
    @endif

    <table class="tabla-header">
        <tr>
            <td align="left" width="20%">
                <img src="{{ $logo_ministerial }}" class="img-header-izq">
            </td>
            <td class="texto-header">
                REPÚBLICA BOLIVARIANA DE VENEZUELA <br>
                MINISTERIO DEL PODER POPULAR PARA LAS RELACIONES INTERIORES, JUSTICIA Y PAZ <br>
                DESPACHO DEL VICEMINISTERIO DE POLÍTICA INTERIOR Y SEGURIDAD JURÍDICA <br>
                DIRECCIÓN GENERAL DE ARTICULACIÓN PARA JUSTICIA Y PAZ <br>
                COORDINACIÓN DE ANTECEDENTES PENALES
            </td>
            <td align="right" width="20%"></td>
        </tr>
    </table>

    <div class="titulo-principal">COMPROBANTE DE SOLICITUD DE ANTECEDENTES PENALES</div>

    <table class="tabla-tramite">
        <tr>
            <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="numero-tramite">
                            N° DE TRÁMITE: {{ $tramite->num_tramite }} 
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="seccion-titulo">Datos del Ciudadano / Solicitante</div>

    <table class="tabla-datos">
        <tr>
            <td class="label-dato">Nombres y Apellidos:</td>
            <td class="valor-dato">
                <span class="negrita">{{ $nombres }} {{ $primer_apellido }} {{ $segundo_apellido }}.</span>
            </td>
        </tr>
        <tr>
            <td class="label-dato">Cédula de Identidad:</td>
            <td class="valor-dato">
                <span class="negrita">{{ $tramite->nacionalidad }}-{{ number_format($tramite->cedula_titular ?? ($tramite->num_identificacion ?? 0), 0, ',', '.') }}.</span>
            </td>
        </tr>
        <tr>
            <td class="label-dato">País Solicitante:</td>
            <td class="valor-dato">{{ $pais_nombre_oficial }}.</td>
        </tr>
        <tr>
            <td class="label-dato">Fecha de Inicio del Trámite:</td>
            <td class="valor-dato">
                {{ $tramite->created_at->translatedFormat('d \d\e F \d\e Y') }}.
            </td>
        </tr>
    </table>

    <div class="nota-advertencia">
        * Advertencia: esta planilla no representa la aprobación de la solicitud.
    </div>

    <footer class="footer-pagina">
        @if ($banner_footer)
            <img src="{{ $banner_footer }}" alt="Banner Footer" class="img-banner-footer">
        @endif
        <div class="footer-texto">
            Esquina de Platanal, Este 1, Avenida Urdaneta, Edificio Sede MPPRIJP, Piso {{ $piso }}, Parroquia
            La Candelaria, <br>
            Municipio Libertador, Caracas, Venezuela. Teléfono: +58 {{ $telefono_ministerio }}
        </div>
    </footer>
</body>

</html>