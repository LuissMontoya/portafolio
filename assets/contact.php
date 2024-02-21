<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Puedes realizar validaciones adicionales aquí si es necesario

    // Enviar el correo electrónico
    $to = "tucorreo@example.com"; // Reemplaza con tu dirección de correo electrónico
    $subject = "Nuevo mensaje de contacto";
    $headers = "From: $email";

    $emailBody = "Nombre: $name\nCorreo electrónico: $email\nMensaje: $message";

    // Enviar el correo electrónico
    $success = mail($to, $subject, $emailBody, $headers);

    // Manejar la respuesta según el éxito o el fracaso del envío del correo
    if ($success) {
        echo json_encode(["success" => true, "message" => "¡Gracias! Tu mensaje ha sido enviado con éxito."]);
    } else {
        echo json_encode(["success" => false, "message" => "Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde."]);
    }
} else {
    // Si alguien trata de acceder directamente a este archivo, muestra un mensaje de error
    echo "Acceso no autorizado";
}

?>
