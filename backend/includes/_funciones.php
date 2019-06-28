<?php  
    require_once '_db.php';

    if(isset($_POST["accion"])){
	    switch ($_POST["accion"]) {
            case "login":
                login($_POST["user"],$_POST["password"]);
            break;
            case "comentario":
                comentario();
            break;
        }
    }
    
    function comentario(){
        global $db;
        extract($_POST);
        
        
        $headers = "MIME-Version: 1.0" . PHP_EOL;
        $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;    
        $headers .= "Return-Path: xw_1745@hotmail.com" . PHP_EOL;
        $headers .= "To: Oliver <xw_1745@hotmail.com>" . PHP_EOL;
        $headers .= "From: ".$correo." <Comentario>". PHP_EOL;

        mail('xw_1745@hotmail.com', $correo."Comentario", $mensaje, $headers);
        
        $response = array('status' => 'ok', 'messaje' => 'send');
        echo json_encode($response); 
        exit();

        
    }   
    
    
?>
