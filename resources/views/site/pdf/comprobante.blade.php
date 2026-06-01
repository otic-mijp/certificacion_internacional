<!DOCTYPE html>
<html lang="es-ve">

<head>
    <meta charset="UTF-8">
    <title>Comprobante de Solicitud de Antecedentes Penales</title>
    <style>
        @page {
            margin: 0.8cm 1.5cm;
        }

        /* Fuerza de manera estricta a que TODO el documento use exactamente la misma fuente */
        * {
            font-family: 'Helvetica', sans-serif;
        }

        body {
            line-height: 1.6;
            font-size: 10.5pt;
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
            margin-bottom: 25px;
            padding-bottom: 10px;
        }

        .texto-header {
            width: 63%;
            text-align: center;
            font-size: 7pt;
            font-weight: bold;
            color: #333;
            line-height: 1.5;
            text-transform: uppercase;
        }

        .img-header-izq {
            width: 75px;
            height: auto;
        }

        /* --- Título y Trámite --- */
        .titulo-principal {
            text-align: center;
            font-size: 14pt;
            margin: 5px 0 15px 0;
            font-weight: bold;
            color: #000000;
            width: 100%;
        }

        .numero-tramite {
            text-align: center;
            font-size: 10.5pt;
            font-weight: bold;
            color: #d32f2f;
            margin-bottom: 25px;
            background-color: #fdf2f2;
            padding: 5px 15px;
            border: 1px solid #ffcdd2;
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            width: 320px;
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
            font-size: 10pt;
            color: #4f5f6f;
        }

        .valor-dato {
            color: #111111;
            text-transform: uppercase;
            font-weight: normal;
        }

        /* --- Nota de Advertencia --- */
        .nota-advertencia {
            font-size: 8.5pt;
            color: #7f8c8d;
            font-style: italic;
            margin-top: 10px;
        }

        /* --- Footer Fijo abajo --- */
        .footer-pagina {
            position: absolute;
            bottom: 40px;
            width: 100%;
            text-align: center;
        }

        .img-banner-footer {
            width: 100%;
            height: 90px;
            padding: 0;
            z-index: -1;
        }

        .footer-texto {
            font-size: 6.5pt;
            margin-top: 10px;
            color: #444;
            line-height: 1.1;
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

    <div style="text-align: center;">
        <div class="numero-tramite">
            N° DE TRÁMITE: {{ $tramite->num_tramite }}
        </div>
    </div>

    <div class="seccion-titulo">Datos del Ciudadano / Solicitante</div>

    <table class="tabla-datos">
        <tr>
            <td class="label-dato">Nombres y Apellidos:</td>
            <td class="valor-dato">
                <strong>{{ $nombres }} {{ $primer_apellido }} {{ $segundo_apellido }}.</strong>
            </td>
        </tr>
        <tr>
            <td class="label-dato">Cédula de Identidad:</td>
            <td class="valor-dato">
                {{ $tramite->nacionalidad }}-{{ number_format($tramite->cedula_titular ?? ($tramite->num_identificacion ?? 0), 0, ',', '.') }}.
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
            <img src="{{ $banner_footer }}" alt="Img Banner" class="img-banner-footer">
        @endif
        <div class="footer-texto">
            Esquina de Platanal, Este 1, Avenida Urdaneta, Edificio Sede MPPRIJP, Piso {{ $piso }}, Parroquia
            La Candelaria, <br>
            Municipio Libertador, Caracas, Venezuela. Teléfono: +58 {{ $telefono_ministerio }}
        </div>
    </footer>
</body>

</html>
