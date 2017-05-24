<?php
// PHPMailer-5.2.20
require_once('PHPMailer/PHPMailerAutoload.php');

class Correo{

	private $asunto;
	private $html;
    private $para_correo;
    private $para_nombre;
    private $nombre_empresa;

    public function __construct($asunto="",$html="",$para_correo="",$para_nombre="",$nombre_empresa=""){

    	$this->asunto = $asunto;
    	$this->html = $html;
    	$this->para_correo = $para_correo;
    	$this->para_nombre = $para_nombre;
        $this->nombre_empresa = $nombre_empresa;
    }

    public function enviarCorreo(){

        $asunto = utf8_encode("=?UTF-8?B?" . base64_encode($this->asunto) . "?=");
    	$html = $this->html;
    	$para_correo = $this->para_correo;
    	$para_nombre = $this->para_nombre;

        $nombre_empresa = "Empresa Demo";

        $correo = new PHPMailer();

		$correo->IsSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        #$correo->SMTPDebug = 2;

        //Ask for HTML-friendly debug output
        #$correo->Debugoutput = 'html';

		$correo->SMTPAuth = true;

		//Set the encryption system to use - ssl (deprecated) or tls
        $correo->SMTPSecure = 'tls';

		$correo->Host = "smtp.gmail.com";

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $correo->Port = 587;

		#$correo->FromName = "educapolis";
        $correo->FromName = $nombre_empresa;

		$correo->Username = "xxxxxx@xxxx.xxx";//tu corrreo

		$correo->Password = "xxxxxxxxx";// tu clave

		$correo->AddAddress($para_correo,$para_nombre);//correo destino

		$correo->Subject = $asunto;//asunto

		$correo->MsgHTML($html);//mensaje o cuerpo del correo

        // Activo condificacción utf-8
        $correo->CharSet = 'UTF-8';

		if(!$correo->Send()) {
			$resultado =  "Hubo un error: " . $correo->ErrorInfo;
		} else {
			$resultado =  "true";
		}

		return $resultado;
    }

    public function getAsunto() {
        return $this->asunto;
    }
    public function setAsunto($asunto){
        $this->asunto = $asunto;
    }

    public function getHtml() {
        return $this->html;
    }
    public function setHtml($html){
        $this->html = $html;
    }

    public function getParaCorreo() {
        return $this->para_correo;
    }
    public function setParaCorreo($para_correo){
        $this->para_correo = $para_correo;
    }

    public function getParaNombre() {
        return $this->para_nombre;
    }
    public function setParaNombre($para_nombre){
        $this->para_nombre = $para_nombre;
    }

    public function getNombreEmpresa() {
        return $this->nombre_empresa;
    }
    public function setNombreEmpresa($nombre_empresa){
        $this->nombre_empresa = $nombre_empresa;
    }
}

?>
