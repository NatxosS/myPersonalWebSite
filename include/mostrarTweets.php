<?php

require_once 'showTweets.php';

$todoHTML = "";

try {
    $mostrarT = new Twitter();
    
    $info = $mostrarT->getArrayTweets($mostrarT->getTweets());

    $cabecera =  $mostrarT->mostrarCabecera($info);
    $cuerpo = $mostrarT->displayTweet($info);
} catch(Exception $ex) {
    $cabecera = "Error -- ". $ex;
}


$json = array();

$json["success"] = true;
$json["data"] = $cabecera . $cuerpo;




header('Content-type: application/json: charset=utf-8');
echo json_encode($json, JSON_FORCE_OBJECT);

exit();
?>
