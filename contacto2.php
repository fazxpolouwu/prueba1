<?php
// send_mail.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor de correo
        $mail->isSMTP();                                           // Usar SMTP
        $mail->Host = 'smtp.gmail.com';                              // Servidor SMTP de Gmail (puedes usar otro)
        $mail->SMTPAuth = true;                                      // Habilitar autenticación SMTP
        $mail->Username = 'tucorreo@gmail.com';                      // Tu correo
        $mail->Password = 'tucontraseña';                             // Tu contraseña (o una app password si usas Gmail)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Cifrado TLS
        $mail->Port = 587;                                           // Puerto de Gmail para SMTP

        // Remitente y destinatarios
        $mail->setFrom($email, $name);                               // Dirección desde la que se enviará el correo
        $mail->addAddress('correo@empresa.com', 'Nombre de Empresa'); // Dirección de destino (donde llegará el correo)
        
        // Contenido del correo
        $mail->isHTML(true);                                          // Enviar en formato HTML
        $mail->Subject = 'Nuevo mensaje de contacto';
        $mail->Body    = "Nombre: $name<br>Email: $email<br><br>Mensaje:<br>$message";

        // Enviar el correo
        $mail->send();
        echo "<p>Mensaje enviado correctamente.</p>";
    } catch (Exception $e) {
        echo "<p>Error al enviar el mensaje: {$mail->ErrorInfo}</p>";
    }
}
?>
