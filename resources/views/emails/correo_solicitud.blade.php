<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Solicitud de Certificación Internacional</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f7f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f4f7f9;">
        <tr>
            <td align="center" style="padding: 40px 10px;">
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #e1e8ed;">
                    
                    <tr>
                        <td align="center" style="padding: 35px 0 10px 0;">
                            <img src="{{ $message->embed(public_path('img/logo_pestana.png')) }}" alt="Logo" style="max-width: 150px; height: auto; display: block;">
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 10px 50px 20px 50px; text-align: center;">
                            <h2 style="color: #233C7E; margin: 0; font-size: 20px; font-weight: 800; letter-spacing: 0.5px;">
                                MPPRIJP
                            </h2>
                            <p style="color: #718096; margin: 5px 0 0 0; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">
                                Ministerio del Poder Popular para Relaciones Interiores, Justicia y Paz
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 10px 50px 30px 50px;">
                            
                            <p style="margin: 0 0 15px 0; font-size: 16px; line-height: 1.6; color: #2d3748; font-weight: bold;">
                                Estimado Sr(a). {{ $nombre_completo ?? 'Usuario' }}
                            </p>

                            <p style="margin: 0 0 25px 0; font-size: 15px; line-height: 1.6; color: #4a5568;">
                                Su Solicitud de Certificación Internacional se ha realizado satisfactoriamente.
                            </p>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; border-left: 4px solid #233C7E; border-radius: 4px; margin-bottom: 25px;">
                                <tr>
                                    <td style="padding: 15px 20px;">
                                        <span style="display: block; font-size: 11px; text-transform: uppercase; color: #718096; font-weight: bold; margin-bottom: 4px; letter-spacing: 0.5px;">
                                            Número de Trámite
                                        </span>
                                        <span style="display: block; font-size: 18px; color: #1a202c; font-weight: bold; letter-spacing: 0.5px;">
                                            {{ $num_tramite ?? 'null' }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <div style="background-color: #f8fafc; border-left: 4px solid #4a5568; padding: 20px; border-radius: 4px; margin-bottom: 10px;">
                                <h4 style="margin: 0 0 10px 0; color: #233C7E; font-size: 14px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.5px;">
                                    Instrucciones de Impresión del Certificado
                                </h4>
                                <p style="margin: 0 0 12px 0; font-size: 14px; line-height: 1.6; color: #4a5568;">
                                    El Certificado puede ser impreso a <strong>color o en escala de grises (opcional)</strong>, en una hoja con las siguientes características:
                                </p>
                                <ul style="margin: 0; padding-left: 20px; font-size: 13px; line-height: 1.6; color: #4a5568;">
                                    <li style="margin-bottom: 4px;"><strong>Tamaño:</strong> Carta</li>
                                    <li style="margin-bottom: 4px;"><strong>Papel:</strong> Bond</li>
                                    <li style="margin-bottom: 4px;"><strong>Color de la hoja:</strong> Blanca</li>
                                    <li>La hoja debe estar limpia, sin arrugas, sin enmiendas ni tachaduras.</li>
                                </ul>
                            </div>
                            <p> Puede verificar su solicitud en: <a href="http://172.16.11.83/validacionInter/" style="color: #3182ce; text-decoration: none; font-weight: 600;">
                                http://172.16.11.83/validacionInter/
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 30px 50px; background-color: #f8fafc; border-top: 1px solid #edf2f7;">
                            
                            <p style="margin: 0 0 10px 0; font-size: 11px; line-height: 1.5; color: #718096; font-weight: bold; text-transform: uppercase; letter-spacing: 0.5px;">
                                IMPORTANTE:
                            </p>
                            <p style="margin: 0 0 20px 0; font-size: 12px; line-height: 1.6; color: #718096;">
                                El presente correo es enviado automáticamente por nuestro sistema, por favor, no responda, ni reenvíe mensajes a esta cuenta.
                            </p>

                            <div style="border-top: 1px dashed #cbd5e0; padding-top: 20px; margin-bottom: 20px;">
                                <p style="margin: 0 0 12px 0; font-size: 10px; line-height: 1.4; color: #a0aec0; font-weight: bold; text-align: center; letter-spacing: 0.5px;">
                                    *** REGULACIÓN DEL USO DE CORREO ELECTRÓNICO DEL MPPRIJP HACIA EL USUARIO ***
                                </p>
                                <ol style="margin: 0; padding-left: 15px; font-size: 11px; line-height: 1.6; color: #718096; text-align: justify;">
                                    <li style="margin-bottom: 6px;">La información contenida en este correo electrónico y cualquier documento adjunto es propiedad exclusiva del Ministerio del Poder Popular para Relaciones Interiores, Justicia y Paz, es de carácter confidencial y no podrá ser objeto de reproducción total o parcial ni transmitirse de forma alguna por ningún medio.</li>
                                    <li style="margin-bottom: 6px;">Sólo está permitido su recepción y uso a personas debidamente autorizadas.</li>
                                    <li style="margin-bottom: 6px;">Si usted recibió este correo por error, por favor destrúyalo y/o elimine cualquier copia guardada en su sistema.</li>
                                    <li style="margin-bottom: 6px;">Usted no debe utilizar la información aquí contenida para otro propósito, ni compartirla con otras personas.</li>
                                    <li>El incumplimiento de lo antes descrito será sancionado conforme a la Ley.</li>
                                </ol>
                            </div>

                            <p style="margin: 0; font-size: 11px; line-height: 1.4; color: #38a169; text-align: center; font-weight: 600;">
                                🌱 Antes de imprimir este mensaje, asegúrese de que es necesario. La conservación del medio ambiente está en nuestras manos.
                            </p>
                        </td>
                    </tr>
                </table>
                
            </td>
        </tr>
    </table>

</body>
</html>