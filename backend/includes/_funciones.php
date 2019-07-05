<?php  
    require_once '_db.php';

    if(isset($_POST["accion"])){
	    switch ($_POST["accion"]) {
            case "login":
                login();
            break;
            case "comentario":
                comentario();
            break;
            case "registro":
                registro();
            break;
            case "insertar_usuarios":
            insertar_usuarios();
            break;
            case "eliminar_usuarios":
            eliminar_usuarios();
            break;
            case "mostrar_usuarios":
            mostrar_usuarios();
            break;
            case "consulta_usuarios":
            consulta_usuarios();
            break;
            case "editar_usuarios":
            editar_usuarios();
            break;
            case "eliminar_servicios":
            eliminar_servicios();
            break;
            case "editar_servicios":
            editar_servicios();
            break;
            case "consulta_servicios":
            consulta_servicios();
            break;
            case "insertar_servicios":
            insertar_servicios();
            break;
            case "mostrar_servicios":
            mostrar_servicios();
            break;
            case 'carga_foto':
            carga_foto();
            break;
            case "insertar_gal":
            insertar_gal();
            break;
            case "mostrar_gal":
            mostrar_gal();
            break;
            case "eliminar_gal":
            eliminar_gal();
            break;
            case "consulta_gal":
            consulta_gal();
            break;
            case "editar_gal":
            editar_gal();
            break;
        }
    }
    function consulta_gal(){
        global $db;
        extract($_POST);
        $consultar = $db -> get("galeria","*",["AND" => ["gal_id"=>$registro]]);
        echo json_encode($consultar);
    }
    function editar_gal(){
        global $db;
        extract($_POST);
        $editar=$db->update("galeria",["gal_titulo"=>$nombre,
        "gal_foto"=>$foto],["gal_id"=>$registro]);

        
        if($editar){
            echo 3;
        }else{
            echo 4;
        }
    }
    function eliminar_gal(){
        global $db;
        extract($_POST);
        $eliminar=$db->delete("galeria",["gal_id" => $gal]);

        if($eliminar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function mostrar_gal(){
        global $db;
        $consultar = $db->select("galeria","*");
	    echo json_encode($consultar); 
    }
    function insertar_gal(){
        global $db;
        extract($_POST);
        $insertar=$db->insert("galeria",["gal_titulo"=>$nombre,
        "gal_img"=>$foto, "gal_fa"=>date("Y").date("m").date("d")]);

        
        if($insertar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function carga_foto(){
        if(isset($_FILES["archivo"])){
            $foto=$_FILES["archivo"]["name"];
            $temporal=$_FILES["archivo"]["tmp_name"];
            $carpeta="images/";
            $arreglo["texto"]="Error";
            $arreglo["satus"]=0;
            if(move_uploaded_file($temporal , $carpeta.$foto)){
                $arreglo["texto"]="Subida exitosa";
                $arreglo["archivo"]=$carpeta.$foto;
                $arreglo["status"]=1;
            }
            echo json_encode($arreglo);
        }
    }
    function mostrar_servicios(){
        global $db;
        $consultar = $db->select("servicios","*");
	    echo json_encode($consultar); 
    }
    function insertar_servicios(){
        global $db;
        extract($_POST);
        $insertar=$db->insert("servicios",["ser_nom"=>$nom,
        "ser_des"=>$des, "ser_fa"=>date("Y").date("m").date("d")]);

        
        if($insertar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function consulta_servicios(){
        global $db;
        extract($_POST);
        $consultar = $db -> get("servicios","*",["AND" => ["ser_id"=>$registro]]);
        echo json_encode($consultar);
    }
    function editar_servicios(){
        global $db;
        extract($_POST);
        $editar=$db->update("servicios",["ser_nom"=>$nom,
        "ser_des"=>$des],["ser_id"=>$registro]);

        
        if($editar){
            echo 3;
        }else{
            echo 4;
        }
    }
    function eliminar_servicios(){
        global $db;
        extract($_POST);
        $eliminar=$db->delete("servicios",["ser_id" => $servicios]);

        if($eliminar){
            echo 1;
        }else{
            echo 2;
        }
    }

    function editar_usuarios(){
        global $db;
        extract($_POST);
        $editar=$db->update("usuarios",["usr_nombre"=>$nombre,
        "usr_email"=>$email,
        "usr_password"=>$password,
        "usr_status"=>1],["usr_id"=>$registro]);

        
        if($editar){
            echo 3;
        }else{
            echo 4;
        }
    }
    function consulta_usuarios(){
        global $db;
        extract($_POST);
        $consultar = $db -> get("usuarios","*",["AND" => ["usr_status"=>1, "usr_id"=>$registro]]);
        echo json_encode($consultar);
    }
    function insertar_usuarios(){
        global $db;
        extract($_POST);
        $insertar=$db->insert("usuarios",["usr_nombre"=>$nombre,
        "usr_email"=>$email,
        "usr_password"=>$password,
        "usr_status"=>1]);

        
        if($insertar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function mostrar_usuarios(){
        global $db;
        $consultar = $db->select("usuarios","*",["usr_status" => 1]);
	    echo json_encode($consultar);   
    }
    function eliminar_usuarios(){
        global $db;
        extract($_POST);
        $eliminar=$db->delete("usuarios",["usr_id" => $usuarios]);

        if($eliminar){
            echo 1;
        }else{
            echo 2;
        }
    }    
    function login(){

        global $db;
        extract($_POST);
        $conpassword=$db->select("usuarios","*",["usr_password"=>$password]);#consulta para la contraseña
        $conuser=$db->select("usuarios","*",["usr_email"=>$user]);#consulta para usuario
    
      if($conpassword && $conuser){
            echo 1;
      }elseif(!$conuser){
          echo 0;
      }elseif(!$conpassword){
          echo 2;
      }
    }

    function registro(){
        global $db;
        extract($_POST);

        $insertar=$db->insert("usuarios",["usr_nombre"=>$nom,
        "usr_email"=>$email,
        "usr_password"=>$pass,
        "usr_status"=>1]);

        
        if($insertar){
            echo 1;
        }else{
            echo 2;
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
        

        
    }   
    
    
?>
