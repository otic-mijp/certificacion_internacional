<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body style="margin: 0; padding: 0; background-color: #f4f7f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" style="padding: 40px 0;">
                <table width="600" border="0" cellspacing="0" cellpadding="0"
                    style="background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #e1e8ed;">
                    <tr>
                        <td align="center" style="padding: 30px 0 10px 0;">
                            <img src="{{ $message->embed(public_path('img/logo_pestana.png')) }}" alt="Logo" style="max-width: 150px; height: auto;">
                        </td>
                    </tr>

                    <!-- Cuerpo del Mensaje -->
                    <tr>
                        <td style="padding: 30px 50px;">
                            <h1 style="color: #233C7E; font-size: 22px; margin-bottom: 20px; font-weight: 800; text-align: center;">
                                ¡Hola, Bienvenido(a)!
                            </h1>

                            <p style="color: #4a5568; font-size: 16px; line-height: 1.8; text-align: center; margin-bottom: 25px;">
                                Te damos la bienvenida al portal oficial para la gestión del <strong>Certificado de Antecedentes Penales</strong> con validez internacional.
                            </p>

                            <p style="color: #4a5568; font-size: 15px; line-height: 1.6; text-align: center; margin-bottom: 30px;">
                                Esta herramienta te permitirá tramitar tu documentación de seguridad ante el Ministerio de Relaciones Interiores, Justicia y Paz de forma digital.
                            </p>

                            <!-- Botón de Acción -->
                            <div style="text-align: center; margin-bottom: 35px;">
                                <a href="http://certificacioninternacional.mijp.gob.ve"  style="background-color: #233C7E; color: #ffffff; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block;">
                                   Acceder al Sistema
                                </a>
                            </div>

                            <!-- Nota importante -->
                            <div style="background-color: #f8fafc; border-left: 4px solid #233C7E; padding: 15px; margin-bottom: 10px;">
                                <p style="color: #4a5568; font-size: 13px; line-height: 1.5; margin: 0;">
                                    <strong>Recuerda:</strong> nuestra página posee la gestion de trámites solicitudes restringida.
                                </p>
                            </div>
                        </td>
                    </tr>

                    <!-- Pie de página -->
                    <tr>
                        <td style="padding: 30px; background-color: #f8fafc; text-align: center; border-top: 1px solid #edf2f7;">
                            <p style="color: #94a3b8; font-size: 12px; margin: 0 0 10px 0;">
                                Enviado por el Ministerio del Poder Popular para Relaciones Interiores Justicia y Paz.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>