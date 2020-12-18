<?php
/* $error = '';
$enviado = ''; */
if (!empty($_POST)) {
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $msj = $_POST['msj'];
  $captcha = $_POST['g-recaptcha-response'];
  $secret = '6LcObf0ZAAAAADp5m3xuoW-wgBjuJuPii5yx6awb';
  /* Proteger el formulario */
  $nombre = trim($nombre);
  $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
  $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
  $correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
  $msj = filter_var($msj, FILTER_SANITIZE_STRING);
  $msj = htmlspecialchars($msj);
  $msj = trim($msj);
  $msj = stripslashes($msj);
  $msj = addslashes($msj);
  /* Validar el captcha */
  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
  $arr = json_decode($response);
  //var_dump($arr);
  if ($arr->success == TRUE && $arr->score > 0.5) {

    $enviar_a = 'antonysmith195@gmail.com';
    $asunto = 'Sitio web Yorkshire / Shih Tzu';
    $mensaje_preparado = "De: $nombre \n";
    $mensaje_preparado = "Correo: $correo \n";
    $mensaje_preparado = "Mensaje: $msj \n";
    //mail($enviar_a, $asunto, $mensaje_preparado);
    //echo $nombre . " tu correo es: " . $correo . " y tu mensaje es: " . $msj;
    echo "Correo enviado";
  } else {
    //header("Location:index.php");
    echo 'Solo puede enviar 1 vez el correo';
  } /* else {
    echo "Vuelve a cargar la página";
  } */
}
