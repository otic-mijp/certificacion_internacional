<!DOCTYPE html>
<html lang="es-ve">

<head>
    <meta charset="UTF-8">
    <title>Comprobante de Solicitud de Antecedentes Penales</title>
    <style>
        /* --- Configuración del Papel para DomPDF --- */
        @page {
            size: letter;
            margin: 1.0cm 1.8cm;
        }

        * {
            font-family: 'Times New Roman';
        }

        body {
            line-height: 1.6;
            font-size: 10pt;
            color: #2d3748;
            margin: 0;
            padding: 0;
        }

        /* --- Marca de Agua / Fondo --- */
        .fondo-escudo {
            position: absolute;
            top: 25%;
            left: 50%;
            width: 420px;
            height: 420px;
            margin-left: -210px;
            opacity: 0.08;
            z-index: -1;
        }

        /* --- Encabezado --- */
        .tabla-header {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            /* Crucial para PDFs */
            margin-bottom: 20px;
        }

        .col-vacia {
            width: 20%;
        }

        .col-centro-superior {
            width: 60%;
            text-align: center;
            vertical-align: top;
            font-size: 12px;
            font-weight: bold;
            color: #000000;
            line-height: 1.3;
        }

        /* Configuración de imágenes */
        .img-logo {
            display: block;
            margin: 8px auto 0 auto;
            max-height: 50px;
            width: auto;
        }

        /* Segunda fila: Bloque de ministerios */
        .texto-ministerios {
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            color: #000000;
            line-height: 1.4;
            padding-top: 10px;
        }

        /* --- Título y Trámite --- */
        .titulo-principal {
            text-align: center;
            font-size: 14pt;
            margin: 15px 0 20px 0;
            font-weight: bold;
            color: #1a365d;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .tabla-tramite {
            width: 100%;
            margin-bottom: 30px;
        }

        .numero-tramite {
            font-size: 11pt;
            font-weight: bold;
            color: #9b2c2c;
            background-color: #fff5f5;
            padding: 8px 20px;
            border: 1px dashed #feb2b2;
            text-align: center;
            border-radius: 4px;
        }

        /* --- Bloque de Datos --- */
        .seccion-titulo {
            font-size: 11pt;
            font-weight: bold;
            color: #1a365d;
            border-bottom: 2px solid #2b6cb0;
            padding-bottom: 5px;
            margin-top: 10px;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .tabla-datos {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
        }

        .tabla-datos tr:nth-child(even) {
            background-color: #f7fafc;
        }

        .tabla-datos td {
            padding: 10px 14px;
            border-bottom: 1px solid #edf2f7;
            vertical-align: middle;
        }

        .label-dato {
            font-weight: bold;
            width: 35%;
            font-size: 9.5pt;
            color: #4a5568;
        }

        .valor-dato {
            color: #1a202c;
            text-transform: uppercase;
            font-size: 10pt;
        }

        .negrita {
            font-weight: bold;
            color: #000000;
        }

        .nota-rechazo {
            font-size: 9pt;
            color: #c53030;
            background-color: #fff5f5;
            border-left: 4px solid #feb2b2;
            padding: 10px 15px;
            margin-bottom: 20px;
        }

        /* --- Nota de Advertencia --- */
        .nota-advertencia {
            font-size: 8.5pt;
            color: #718096;
            background-color: #edf2f7;
            border-left: 4px solid #cbd5e0;
            padding: 10px 15px;
            margin-top: 15px;
            font-style: italic;
        }

        /* --- Footer Fijo Abajo --- */
        .footer-pagina {
            position: absolute;
            bottom: 0px;
            width: 100%;
            text-align: right;
        }

        .img-banner-footer {
            width: 100%;
            height: auto;
            max-height: 75px;
            display: block;
            border-bottom: 1px solid #000;
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

    <!-- Escudo de Fondo de Agua -->
    <img src="{{ $logo_ministerial_fondo }}" class="fondo-escudo" alt="Fondo Ministerial">

    <!-- Encabezado -->
    <table class="tabla-header">
        <tr>
            <td class="col-vacia"></td>
            <td class="col-centro-superior">
                REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                <img src="{{ $logo_ministerial }}" class="img-logo">
            </td>
            <td class="col-vacia"></td>
        </tr>
        <tr>
            <td colspan="3" class="texto-ministerios">
                MINISTERIO DEL PODER POPULAR PARA RELACIONES INTERIORES, JUSTICIA Y PAZ<br>
                DESPACHO DEL VICEMINISTERIO DE POLÍTICA INTERIOR Y SEGURIDAD JURÍDICA<br>
                DIRECCIÓN GENERAL DE ARTICULACIÓN PARA JUSTICIA Y PAZ<br>
                COORDINACIÓN DE ANTECEDENTES PENALES
            </td>
        </tr>
    </table>

    <div class="titulo-principal">Comprobante de Solicitud de Antecedentes Penales</div>

    <!-- Número de Trámite -->
    <table class="tabla-tramite">
        <tr>
            <td align="center">
                <table width="auto" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
                    <tr>
                        <td class="numero-tramite">
                            N° DE TRÁMITE: {{ $tramite->num_tramite }}{{ $rechazado ? " | $rechazado" : '' }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    @if ($rechazado)
        <div class="nota-rechazo">
            Nota: Su solicitud ha sido rechazada. Para continuar con la gestión de su trámite, por favor diríjase a la
            Coordinación de Antecedentes Penales.
            Ubicación: Parroquia La Candelaria, Municipio Libertador, Distrito capital.
            Allí se le brindará la asistencia necesaria para resolver cualquier inconveniente relacionado con su
            solicitud.
        </div>
    @endif

    <!-- Sección Datos -->
    <div class="seccion-titulo">Datos del Ciudadano / Solicitante</div>

    <table class="tabla-datos">
        <tr>
            <td class="label-dato">Nombres y apellidos:</td>
            <td class="valor-dato">
                <span class="negrita">{{ $nombres }} {{ $primer_apellido }} {{ $segundo_apellido }}.</span>
            </td>
        </tr>
        <tr>
            <td class="label-dato">Cédula de identidad:</td>
            <td class="valor-dato">
                <span
                    class="negrita">{{ $tramite->nacionalidad }}-{{ number_format($tramite->cedula_titular ?? ($tramite->num_identificacion ?? 0), 0, ',', '.') }}.</span>
            </td>
        </tr>
        <tr>
            <td class="label-dato">País solicitante:</td>
            <td class="valor-dato">{{ $pais_nombre_oficial }}.</td>
        </tr>
        <tr>
            <td class="label-dato">Fecha de solicitud del trámite:</td>
            <td class="valor-dato">
                {{ $tramite->created_at->translatedFormat('d \d\e F \d\e Y') }}.
            </td>
        </tr>
    </table>

    <!-- Advertencia -->
    <div class="nota-advertencia">
        <strong>Importante:</strong> Esta planilla representa un comprobante de registro y no garantiza ni constituye la
        aprobación definitiva de la solicitud de antecedentes penales.
    </div>

    <!-- Footer Fijo -->
    <footer class="footer-pagina">
        <img src="{{ $banner_footer }}" alt="Banner Footer" class="img-banner-footer">
        <div class="footer-texto">
            Esquina de Platanal, Este 1, Avenida Urdaneta, Edificio Sede MPPRIJP, Piso {{ $piso }}, Parroquia
            La Candelaria,<br>
            Municipio Libertador, Distrito capital, Venezuela. Teléfono: +58 {{ $telefono_ministerio }}
        </div>
    </footer>

</body>

</html>
