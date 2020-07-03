<?php  
    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }

    function executeForm() {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $comentarios = $_POST['comentarios'];
        $enviar =$_POST['enviar'];

        $mensaje = "<h1>" . $nombre . "</h1>";
        $mensaje .= "<p>¿Cuál vas a aceptar?:" . $enviar . "</p>";
        $mensaje .= "<hr />";
        $mensaje .= $_POST['mensaje'];

        $para = 'eliferaponte19@egmail.com'; // acá va el mail a donde va a llegar el mensaje  
        $asunto = 'Mensaje de la web';

        $headers = "Mime-version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
        $headers .= "From: $correo\r\n";
        $headers .= "To: $para";

        mail($para, $asunto, $mensaje, $headers);
        redirect('../gracias.html');
    }

    if(isset($_POST['button-submit'])) {
        executeForm();
    } 
?>