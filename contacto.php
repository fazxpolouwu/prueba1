<?php
// send_mail.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Aquí se pueden agregar validaciones de los datos, como comprobar que el email tenga el formato correcto

    $to = "correo@empresa.com"; // Reemplazar con el correo real
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $name\nEmail: $email\nMensaje:\n$message";
    $headers = "From: $email";

    // Intentar enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Mensaje enviado correctamente.</p>";
    } else {
        echo "<p>Error al enviar el mensaje. Intenta nuevamente más tarde.</p>";
    }
}
?>
