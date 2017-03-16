<?php

require_once 'proteted/autopw.php';

function enviarEmail($email) {      // función que nos envia un email a nuestro correo informandonos que hemos recibido un contacto
    
    $para      = 'ignacio_siles@hotmail.com';
    $titulo    = 'New contact in my web';
    $mensaje   = 'Se ha registrado un nuevo contacto';
    $cabeceras = 'From: '.$email . "\r\n" .
        'Reply-To: '.$email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($para, $titulo, $mensaje, $cabeceras);
}

if (isset($_POST['nombre']) && isset($_POST['suEmail']) && isset($_POST['texto'])) {    // si todos los campos estan correctos
    
    $nombre = $_POST['nombre']; // recuperamos las variables
    $email = $_POST['suEmail'];
    $texto = $_POST['texto'];
    
    $jsondata = array();
    
    $namebd = nombreBD();
    $dsn = dsn();
    $usuario = ususario();
    $contrasenia = contrasena();
    
    @ $database = new mysqli($dsn, $usuario, $contrasenia, $namebd);        // hacemos la conexión
    
    if ($database->connect_errno) {
        $error = $database->error;  // si se produce un error al conectar
    }
    
        // preparamos la inserción
    
    $sql = "INSERT INTO `contactos` (`nombre`, `email`, `texto`) VALUES ('".$nombre ."', '".$email."', '". $texto ."')";

    // hacemos la inserción
    
    if ($registros = $database->query($sql)) {
        $jsondata["success"] = true;
        enviarEmail($email);
        $jsondata["data"] = "Su contacto ha sido enviado y registrado correctamente.";
    } else {
        $jsondata["success"] = false;
        $jsondata["data"] = $error;
    }
    
    header('Content-type: application/json: charset=utf-8');
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    
    $database->close();
}

exit();
