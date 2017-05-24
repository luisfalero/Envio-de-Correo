<?php

require_once("correo.php");

$asunto = "Envío de Correo";
$html = "<h3>Hola Mundo</h3>";
$correo = "yyyyyy@yyyy.yyy";
$nombre = "Luis Falero Otiniano";

try{
    $objCorreo = new Correo();
    $objCorreo->setAsunto($asunto);
    $objCorreo->setHtml($html);
    $objCorreo->setParaCorreo($correo);
    $objCorreo->setParaNombre($nombre);
    $objCorreo->enviarCorreo();
    $retorno = 'true';
} catch (Exception $exc) {
    $retorno = "false";    
    die;
}

echo $retorno;

?>
