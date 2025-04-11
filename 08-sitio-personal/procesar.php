<?php
header('Content-Type: application/json');

$response = ['success' => false, 'mensaje' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);
  
  // Aquí normalmente guardarías en base de datos
  // Simulamos una respuesta exitosa
  $response['success'] = true;
  $response['mensaje'] = "Gracias $nombre, hemos recibido tu mensaje.";
}

echo json_encode($response);
?>