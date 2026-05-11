<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Registro | MPPRIJP</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8fafc; font-family: sans-serif;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; padding: 40px 10px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 24px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);">
                    <tr>
                        <td align="center" style="padding: 40px 30px 20px 30px;">
                            <h1 style="color: #0f172a; font-size: 28px; font-weight: 800; margin: 0; letter-spacing: -0.025em;">
                                ¡Confirmación de cuenta! <br>
                            </h1>
                            <p style="color: #64748b; font-size: 16px; font-weight: 500; margin-top: 10px;">
                                Sistema Internacional de Gestión de Certificados de Antecedentes Penales
                            </p>
                        </td>
                    </tr>

                    <!-- Sección de Información (Icono + Texto) -->
                    <tr>
                        <td style="padding: 0 40px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f1f5f9; border-radius: 16px; padding: 20px;">
                                <tr>
                                    <td width="50" valign="top">
                                        <div style="background-color: #233C7E; width: 40px; height: 40px; border-radius: 10px; text-align: center; line-height: 40px; color: #ffffff; font-size: 20px;">
                                            ℹ️
                                        </div>
                                    </td>
                                    <td style="padding-left: 15px;">
                                        <h2 style="margin: 0; font-size: 16px; color: #1e293b; font-weight: 700;">Información importante</h2>
                                        <p style="margin: 5px 0 0 0; font-size: 13px; color: #64748b;">Requisitos y restricciones del trámite</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Cuerpo del Mensaje -->
                    <tr>
                        <td style="padding: 30px 40px;">
                            <div style="border: 1px solid #e2e8f0; border-radius: 16px; padding: 25px;">
                                <h3 style="color: #233C7E; font-size: 12px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 10px;">
                                    Límites de Solicitud
                                </h3>
                                <p style="color: #475569; font-size: 15px; line-height: 1.6; margin: 0;">
                                    Solicitudes habilitadas de <b>lunes a viernes</b>.<br>
                                    Posee una restricción de <b>3 trámites al mes</b> y <b>10 anuales</b>.
                                </p>
                            </div>
                        </td>
                    </tr>

                    <!-- Botón de Confirmación (Acción Principal) -->
                    <tr>
                        <td align="center" style="padding: 0 40px 40px 40px;">
                            <p style="color: #64748b; font-size: 14px; margin-bottom: 20px;">
                                Para comenzar a utilizar el sistema, por favor confirma tu cuenta.
                            </p>
                            <a href="{{ $url }}" style="display: inline-block; background-color: #233C7E; color: #ffffff; padding: 16px 32px; border-radius: 12px; text-decoration: none; font-weight: 900; font-size: 13px; text-transform: uppercase; letter-spacing: 0.1em; box-shadow: 0 4px 6px rgba(35, 60, 126, 0.2);">
                                Confirmar Correo y Continuar
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="background-color: #f8fafc; padding: 20px; border-top: 1px solid #e2e8f0;">
                            <p style="margin: 0; color: #94a3b8; font-size: 12px;">
                                &copy; {{ date('Y') }} MPPRIJP - Venezuela. <br>
                                Este es un correo automático, por favor no responda.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
