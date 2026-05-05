<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
</head>

<body
    style="margin: 0; padding: 0; background-color: #f4f7f9; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" style="padding: 40px 0;">
                <table width="550" border="0" cellspacing="0" cellpadding="0"
                    style="background-color: #ffffff; border-radius: 8px; border: 1px solid #e1e8ed; overflow: hidden;">

                    <!-- Header con Logo e Institucionalidad -->
                    <tr>
                        <td align="center"
                            style="padding: 30px 40px; background-color: #ffffff; border-bottom: 3px solid #233C7E;">
                            <!-- Si tienes logo online, cambia el src. Si es local, usa la sintaxis CID de abajo -->
                            <img src="{{ $message->embed(public_path('img/logo_pestana.png')) }}" alt="Logo">
                        </td>
                    </tr>

                    <!-- Cuerpo del Mensaje -->
                    <tr>
                        <td style="padding: 40px;">
                            <h2 style="color: #1a202c; font-size: 18px; margin-bottom: 20px; font-weight: 700;">
                                Restablecimiento de contraseña:
                            </h2>

                            <p style="color: #4a5568; font-size: 15px; line-height: 1.6; margin-bottom: 25px;">
                                Estimado usuario, {{ $usuario->nombres }} {{ $usuario->primer_apellido }} {{ $usuario->segundo_apellido }}. <br><br>
                                Se ha procesado una solicitud para generar una nueva clave de acceso asociada a esta
                                cuenta de correo electrónico. Por su seguridad, el sistema ha generado una clave
                                temporal única.
                            </p>

                            <div
                                style="background-color: #f8fafc; border: 1px solid #cbd5e1; padding: 25px; border-radius: 6px; text-align: center; margin-bottom: 25px;">
                                <p
                                    style="margin: 0 0 10px 0; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 1px;">
                                    Nueva Clave Temporal</p>
                                <span
                                    style="font-family: 'Courier New', Courier, monospace; font-size: 32px; font-weight: bold; color: #233C7E; letter-spacing: 5px;">
                                    {{ $claveTemporal }}
                                </span>
                            </div>

                            <p style="color: #4a5568; font-size: 14px; line-height: 1.6;">
                                <strong>Nota de seguridad:</strong> Esta clave le permitirá el acceso inmediato. Le
                                recordamos que es obligatorio actualizar esta contraseña desde su panel de perfil tras
                                el primer inicio de sesión para garantizar la integridad de su cuenta.
                            </p>
                        </td>
                    </tr>

                    <!-- Pie de página -->
                    <tr>
                        <td style="padding: 20px 40px; background-color: #f1f5f9; text-align: center;">
                            <p style="color: #94a3b8; font-size: 12px; margin: 0;">
                                Este es un mensaje automático, por favor no responda a esta dirección.<br>
                                &copy; {{ date('Y') }} Servicios Institucionales MPPRIJP.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
