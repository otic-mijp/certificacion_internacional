<!DOCTYPE html>
<html lang="es-ve">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Antecedentes Penales</title>
    <style>
        /* --- Configuración del Papel para DomPDF --- */
        @page {
            size: letter; /* Fuerza explícitamente el tamaño carta */
            margin: 0.8cm 1.5cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.5;
            font-size: 10pt; /* Ajustado ligeramente para mejorar balance en Carta */
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

        .img-header-dere {
            width: 65px;
            height: auto;
        }

        /* --- Títulos y Contenido --- */
        .titulo-principal {
            text-align: center;
            font-size: 13pt;
            margin: 10px 0 15px 0;
            font-weight: bold;
            color: #000;
            width: 100%;
            letter-spacing: 0.5px; /* Suaviza el espaciado en títulos en mayúscula */
        }

        .parrafo {
            text-align: justify;
            margin-bottom: 12px;
        }

        .contenedor-datos {
            text-align: left;
            margin: 12px 0;
        }

        .datos-usuario {
            font-size: 10pt;
            text-transform: uppercase;
            color: #000;
            line-height: 1.8;
        }
        
        .negrita {
            font-weight: bold;
        }

        /* --- Bloque de Firmas --- */
        .seccion-firmas {
            margin-top: 20px;
            text-align: center;
        }

        .firma-container {
            width: 100%;
            margin-bottom: 5px;
        }

        .sello-oficial {
            width: 110px;
            height: 110px;
            vertical-align: middle;
            margin-right: 20px;
        }

        .firma-digital {
            max-width: 110px;
            max-height: 110px;
            vertical-align: middle;
        }

        .nombre-autoridad {
            font-weight: bold;
            font-size: 9.5pt;
            text-transform: uppercase;
            margin-top: 5px;
        }

        .cargo-autoridad {
            text-transform: uppercase;
            font-size: 8.5pt;
            font-weight: bold;
            max-width: 85%;
            margin: 0 auto;
            line-height: 1.2;
        }

        .base-legal {
            font-size: 8pt;
            text-transform: uppercase;
            line-height: 1.2;
            margin-top: 8px;
            color: #333;
        }

        /* --- Notas y Verificación --- */
        .nota-atencion {
            font-size: 7.5pt;
            text-align: justify;
            margin-top: 15px;
            padding-top: 8px;
            line-height: 1.3;
            border-top: 0.5px solid #ccc;
        }

        .url-validacion {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        .tabla-qr-footer {
            width: 100%;
            margin-top: 10px;
        }

        .qr-final {
            width: 45px;
            margin-bottom: 3px;
        }

        .qr-etiqueta {
            font-size: 6pt;
            font-weight: bold;
            display: block;
            color: #444;
        }

        /* --- Footer Fijo --- */
        .footer-pagina {
            position: absolute;
            bottom: 0px; /* Ajustado al límite del margen del @page */
            width: 100%;
            text-align: center;
        }

        .img-banner-footer {
            width: 100%;
            height: auto; /* Evita deformaciones por forzar 90px */
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
            la <span class="negrita">{{ $nombre_direccion }}</span>, en el ejercicio de sus funciones y cumpliendo la Ley de
            Registro de Antecedentes Penales publicada en la Gaceta Oficial de la República de Venezuela (hoy República
            Bolivariana de Venezuela) <span class="negrita">Nro. {{ $gaceta_cambio_pais }}, de fecha
            {{ $fecha_cambio_gaceta_pais }}</span>, a solicitud de parte interesada expide el presente certificado al ciudadano(a):
        </p>

        <div class="contenedor-datos">
            <div class="datos-usuario">
                <span class="negrita">{{ $nombre_solicitante }}</span><br>
                cédula de identidad: <span class="negrita">{{ $datos }}.</span>
            </div>
        </div>

        <p class="parrafo">
            Se certifica que, luego de revisada la fuente de los datos de la Oficina de Antecedentes Penales, y hasta la
            emisión del presente documento, que el referido ciudadano(a) <span class="negrita">NO REGISTRA ANTECEDENTES
            PENALES</span> en la REPÚBLICA BOLIVARIANA DE VENEZUELA.
        </p>

        <p class="parrafo">
            El presente certificado se emite a efectos de ser presentado ante las autoridades de:
            <span class="negrita" style="text-transform: uppercase;">{{ $pais_solicitud }}</span>.
        </p>

        <p style="margin-top: 15px;">
            Certificación que se expide en la ciudad de Caracas, el <span class="negrita">{{ $fecha_actual }}</span>.
        </p>

        <div class="seccion-firmas">
            <div class="firma-container">
                <img src="{{ $sello_direccion }}" alt="Sello Oficial" class="sello-oficial">
                <img src="{{ $firma_viceministro }}" alt="Firma Digital" class="firma-digital">
            </div>
            <div class="nombre-autoridad">{{ $nombre_viceministro }}</div>
            <div class="cargo-autoridad">{{ $viceministro_nombre_direccion }}</div>
            <div class="base-legal">
                DESIGNADA SEGÚN DECRETO <span class="negrita">NRO. {{ $nro_decreto_desgnacion }}</span> DE
                FECHA {{ $fecha_decreto_desgnacion }},<br>
                PUBLICADO EN GACETA OFICIAL DE LA REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                <span class="negrita">{{ $nro_decreto_extraordinario }}</span> EXTRAORDINARIO DE LA MISMA FECHA.
            </div>
        </div>

        <div class="nota-atencion">
            <span class="negrita">ATENCIÓN:</span> Este documento consta de una (1) hoja, la cual no debe contener enmiendas,
            tachaduras, modificaciones o superposiciones. Los datos de identificación del solicitante son
            suministrados por el Servicio Administrativo de Identificación, Migración y Extranjería (SAIME). La
            autenticidad de este certificado puede verificarse a través del portal: <br>
            <span class="url-validacion">{{ $web }}/{{ $nro_tramite }}</span> escaneando el código QR superior.
        </div>

        <table class="tabla-qr-footer">
            <tr>
                <td align="center" width="50%">
                    <img src="{{ $qr_cedula }}" alt="QR Solicitante" class="qr-final">
                    <span class="qr-etiqueta">ID SOLICITANTE</span>
                </td>
                <td align="center" width="50%">
                    <img src="{{ $qr_tramite }}" alt="QR Trámite" class="qr-final">
                    <span class="qr-etiqueta">VALIDACIÓN TRÁMITE</span>
                </td>
            </tr>
        </table>
    </div>

    <footer class="footer-pagina">
        <img src="{{ $banner_footer }}" alt="Banner Footer" class="img-banner-footer">
        <div class="footer-texto">
            Esquina de Platanal, Este 1, Avenida Urdaneta, Edificio Sede MPPRIJP, Piso {{ $piso }}, Parroquia
            La Candelaria, <br>
            Municipio Libertador, Caracas, Venezuela. Teléfono: +58 {{ $telefono_ministerio }} <br>
        </div>
    </footer>
</body>
</html>