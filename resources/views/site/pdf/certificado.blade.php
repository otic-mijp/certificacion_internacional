<!DOCTYPE html>
<html lang="es-ve">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Antecedentes Penales</title>
    <style>
        /* Configuración para DomPDF */
        @page {
            margin: 0.8cm 1.5cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
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

        .img-header-dere {
            width: 65px;
            height: auto;
        }

        /* --- Títulos y Contenido --- */
        .titulo-principal {
            text-align: center;
            font-size: 14pt;
            margin: 5px 0;
            font-weight: bold;
            color: #000;
            width: 100%;
        }

        .parrafo {
            text-align: justify;
            margin-bottom: 10px;
        }

        .contenedor-datos {
            text-align: left;
            margin: 10px 0;
            border-radius: 5px;
        }

        .datos-usuario {
            font-size: 10pt;
            text-transform: uppercase;
            color: #000;
            line-height: 2;
        }

        /* --- Bloque de Firmas --- */
        .seccion-firmas {
            margin-top: 25px;
            text-align: center;
        }

        .firma-container {
            width: 100%;
            margin-bottom: 5px;
        }

        .sello-oficial {
            width: 120px;
            height: 120px;
            vertical-align: middle;
            margin-right: 20px;
        }

        .firma-digital {
            max-width: 120px;
            max-height: 120px;
            vertical-align: middle;
        }

        .nombre-autoridad {
            font-weight: bold;
            font-size: 10pt;
            text-transform: uppercase;
            margin-top: 5px;
        }

        .cargo-autoridad {
            text-transform: uppercase;
            font-size: 9pt;
            font-weight: bold;
            max-width: 85%;
            margin: 0 auto;
            line-height: 1.1;
        }

        .base-legal {
            font-size: 8.5pt;
            text-transform: uppercase;
            line-height: 1.2;
            margin-top: 8px;
            color: #333;
        }

        /* --- Notas y Verificación --- */
        .nota-atencion {
            font-size: 7.5pt;
            text-align: justify;
            margin-top: 20px;
            padding: 8px;
            line-height: 1.4;
            border-top: 0.5px solid #ccc;
        }

        .url-validacion {
            text-decoration: none;
            color: #000;
            font-weight: bold;
            word-break: break-all;
        }

        .tabla-qr-footer {
            width: 100%;
            margin-top: 10px;
        }

        .qr-final {
            width: 50px;
            margin-bottom: 3px;
        }

        .qr-etiqueta {
            font-size: 6pt;
            font-weight: bold;
            display: block;
            color: #444;
        }

        /* --- Footer --- */
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
    <img src="{{ $logo_ministerial_fondo }}" class="fondo-escudo">

    <table class="tabla-header">
        <tr>
            <td align="left" width="20%"><img src="{{ $logo_ministerial }}" class="img-header-izq"></td>
            <td class="texto-header">
                REPÚBLICA BOLIVARIANA DE VENEZUELA <br>
                MINISTERIO DEL PODER POPULAR PARA LAS RELACIONES INTERIORES, JUSTICIA Y PAZ <br>
                DESPACHO DEL VICEMINISTERIO DE POLÍTICA INTERIOR Y SEGURIDAD JURÍDICA <br>
                DIRECCIÓN GENERAL DE ARTICULACIÓN PARA JUSTICIA Y PAZ <br>
                COORDINACIÓN DE ANTECEDENTES PENALES
            </td>
            <td align="right" width="20%"><img src="{{ $qr_pag_redirect }}" class="img-header-dere"></td>
        </tr>
    </table>

    <div class="contenido">
        <div class="titulo-principal">CERTIFICACIÓN DE ANTECEDENTES PENALES</div>

        <p class="parrafo">
            En nombre del ciudadano Ministro del Poder Popular para las Relaciones Interiores, Justicia y Paz,
            la <strong>{{ $nombre_direccion }}</strong>, en el ejercicio de sus funciones y cumpliendo la Ley de
            Registro de Antecedentes Penales publicada en la Gaceta Oficial de la República de Venezuela (hoy República
            Bolivariana de Venezuela) <span style="font-weight: bold;">Nro. {{ $gaceta_cambio_pais }}, de fecha
                {{ $fecha_cambio_gaceta_pais }}</span>, a solicitud
            de parte interesada expide el presente certificado al ciudadano(a):
        </p>

        <div class="contenedor-datos">
            <div class="datos-usuario">
                <span style="font-weight: bold">
                    {{ $nombre_solicitante }} <br>
                </span>
                cédula de identidad: <span style="font-weight: bold">{{ $datos }}.</span>
            </div>
        </div>

        <p class="parrafo">
            Se certifica que, luego de revisada la fuente de los datos de la Oficina de Antecedentes Penales, y hasta la
            emisión del presente documento, que el referido ciudadano(a) <strong>NO REGISTRA ANTECEDENTES
                PENALES</strong> en la REPÚBLICA BOLIVARIANA DE VENEZUELA.
        </p>

        <p class="parrafo">REPÚBLICA BOLIVARIANA DE VENEZUELA
            El presente certificado se emite a efectos de ser presentado ante las autoridades de:
            <strong style="text-transform: uppercase;">{{ $pais_solicitud }}</strong>.
        </p>

        <p style="margin-top: 10px">
            Certificación que se expide en la ciudad de Caracas, el <strong>{{ $fecha_actual }}</strong>.
        </p>

        <div class="seccion-firmas">
            <div class="firma-container">
                <img src="{{ $sello_direccion }}" alt="Sello del viceministerio no registrado" class="sello-oficial">
                <img src="{{ $firma_viceministro }}" alt="Firma del viceministro no registrada" class="firma-digital">
            </div>
            <div class="nombre-autoridad">{{ $nombre_viceministro }}</div>
            <div class="cargo-autoridad">{{ $viceministro_nombre_direccion }}</div>
            <div class="base-legal">
                DESIGNADA SEGÚN DECRETO <span style="font-weight: bold;">NRO. {{ $nro_decreto_desgnacion }}</span> DE
                FECHA {{ $fecha_decreto_desgnacion }},<br>
                PUBLICADO EN GACETA OFICIAL DE LA REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                <span style="font-weight: bold;">{{ $nro_decreto_extraordinario }}</span> EXTRAORDINARIO DE LA MISMA
                FECHA.
            </div>
        </div>

        <div class="nota-atencion">
            <strong>ATENCIÓN:</strong> Este documento consta de una (1) hoja, la cual no debe contener enmiendas,
            tachaduras, modificaciones o superposiciones. Los datos de identificación del solicitante son
            suministrados por el Servicio Administrativo de Identificación, Migración y Extranjería (SAIME). La
            autenticidad de este certificado puede verificarse a través del portal: <br>
            <a class="url-validacion" target="_blank">{{ $web }}/{{ $nro_tramite }}</a> escaneando el código
            QR superior.
        </div>

        <table class="tabla-qr-footer">
            <tr>
                <td align="center" width="50%">
                    <img src="{{ $qr_cedula }}" alt="Img QR" class="qr-final">
                    <span class="qr-etiqueta">ID SOLICITANTE</span>
                </td>
                <td align="center" width="50%">
                    <img src="{{ $qr_tramite }}" alt="Img QR" class="qr-final">
                    <span class="qr-etiqueta">VALIDACIÓN TRÁMITE</span>
                </td>
            </tr>
        </table>
    </div>

    <footer class="footer-pagina">
        <img src="{{ $banner_footer }}" alt="Img Banner" class="img-banner-footer">
        <div class="footer-texto">
            Esquina de Platanal, Este 1, Avenida Urdaneta, Edificio Sede MPPRIJP, Piso {{ $piso }}, Parroquia
            La Candelaria, <br>
            Municipio Libertador, Caracas, Venezuela. Teléfono: +58 {{ $telefono_ministerio }} <br>
        </div>
    </footer>
</body>

</html>
