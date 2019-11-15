<?php
$nombre = $_POST['txtNombreApellido'];
$mail = $_POST['txtCorreo'];
$asunto = $_POST['txtAsunto'];
$comentario = $_POST['txtAyuda'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Mensaje enviado por: " . $nombre . ",\r\n";
$mensaje .= "Correo: " . $mail . " \r\n";
$mensaje .= "Asunto: " . $asunto . " \r\n";
$mensaje .= "Mensaje: " . $comentario . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'piclabgt@gmail.com';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location: ../index.html");
?>