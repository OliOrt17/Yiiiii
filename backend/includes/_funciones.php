<?php
  require_once '_db.php';
  function create_session($user,$type){
	session_start();
	$_SESSION['US']= $user;
	$_SESSION['USR_ID']= $type[0]["usr_id"];
	$cookie_name = "lau";
	$cookie_value = $type[0]["usr_id"];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	return;
}

function get_data_session(){

	return $_SESSION;
}
    if(isset($_POST["accion"])){
	    switch ($_POST["accion"]) {
            case "delete_session":
            delete_session();
            break;
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
            case "eliminar_car":
            eliminar_car();
            break;
            case "insertar_car":
            insertar_car();
            break;
            case "consulta_car":
            consulta_car();
            break;
            case "editar_car":
            editar_car();
            break;
            case "mostrar_car":
            mostrar_car();
            break;
            case "eliminar_pro":
            eliminar_pro();
            break;
            case "insertar_pro":
            insertar_pro();
            break;
            case "consulta_pro":
            consulta_pro();
            break;
            case "editar_pro":
            editar_pro();
            break;
            case "mostrar_pro":
            mostrar_pro();
            break;
            case "eliminar_cos":
            eliminar_cos();
            break;
            case "insertar_cos":
            insertar_cos();
            break;
            case "consulta_cos":
            consulta_cos();
            break;
            case "editar_cos":
            editar_cos();
            break;
            case "mostrar_cos":
            mostrar_cos();
            break;
            case "eliminar_sta":
            eliminar_sta();
            break;
            case "insertar_sta":
            insertar_sta();
            break;
            case "consulta_sta":
            consulta_sta();
            break;
            case "editar_sta":
            editar_sta();
            break;
            case "mostrar_sta":
            mostrar_sta();
            break;
            case "insertar_nos":
            insertar_nos();
            break;
            case "mostrar_nos":
            mostrar_nos();
            break;
            case "eliminar_nos":
            eliminar_nos();
            break;
            case "consulta_nos":
            consulta_nos();
            break;
            case "editar_nos":
            editar_nos();
            break;
            case "eliminar_rev":
            eliminar_rev();
            break;
            case "insertar_rev":
            insertar_rev();
            break;
            case "consulta_rev":
            consulta_rev();
            break;
            case "editar_rev":
            editar_rev();
            break;
            case "mostrar_rev":
            mostrar_rev();
            break;
        }
    }

    function delete_session(){
    	$_COOKIE['lau']=0;
    	setcookie("lau", 0, time()-1,"/");
    	session_start();
    	session_destroy();

    	return;

    }
    //reviews

    function mostrar_rev(){
        global $db;
        $consultar = $db->select("reviews","*");
	    echo json_encode($consultar);
    }
    function editar_rev(){
        global $db;
        extract($_POST);
        $editar=$db->update("reviews",["rev_nom"=>$nom,
        "rev_com"=>$des,"rev_cli"=>$ico,"rev_img"=>$foto],["rev_id"=>$registro]);


        if($editar){
            echo 3;
        }else{
            echo 4;
        }
    }
    function consulta_rev(){
        global $db;
        extract($_POST);
        $consultar = $db -> get("reviews","*",["AND" => ["rev_id"=>$registro]]);
        echo json_encode($consultar);
    }
    function insertar_rev(){
        global $db;
        extract($_POST);
        $insertar=$db->insert("reviews",["rev_nom"=>$nom,"rev_com"=>$des,
        "rev_cli"=>$ico, "rev_img"=>$foto,"rev_fa"=>date("Y").date("m").date("d")]);


        if($insertar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function eliminar_rev(){
        global $db;
        extract($_POST);
        $eliminar=$db->delete("reviews",["rev_id" => $rev]);

        if($eliminar){
            echo 1;
        }else{
            echo 2;
        }
    }

    //integrantes
    function consulta_nos(){
        global $db;
        extract($_POST);
        $consultar = $db -> get("integrantes","*",["AND" => ["int_id"=>$registro]]);
        echo json_encode($consultar);
    }
    function editar_nos(){
        global $db;
        extract($_POST);
        $editar=$db->update("integrantes",["int_nombre"=>$nombre,
        "int_img"=>$foto],["int_id"=>$registro]);


        if($editar){
            echo 3;
        }else{
            echo 4;
        }
    }
    function eliminar_nos(){
        global $db;
        extract($_POST);
        $eliminar=$db->delete("integrantes",["int_id" => $nos]);

        if($eliminar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function mostrar_nos(){
        global $db;
        $consultar = $db->select("integrantes","*");
	    echo json_encode($consultar);
    }
    function insertar_nos(){
        global $db;
        extract($_POST);
        $insertar=$db->insert("integrantes",["int_nombre"=>$nombre,
        "int_img"=>$foto, "int_fa"=>date("Y").date("m").date("d")]);


        if($insertar){
            echo 1;
        }else{
            echo 2;
        }
    }


    //stats

    function mostrar_sta(){
        global $db;
        $consultar = $db->select("stats","*");
	    echo json_encode($consultar);
    }
    function editar_sta(){
        global $db;
        extract($_POST);
        $editar=$db->update("stats",["sta_nom"=>$nom,
        "sta_num"=>$des,"sta_ico"=>$ico],["sta_id"=>$registro]);


        if($editar){
            echo 3;
        }else{
            echo 4;
        }
    }
    function consulta_sta(){
        global $db;
        extract($_POST);
        $consultar = $db -> get("stats","*",["AND" => ["sta_id"=>$registro]]);
        echo json_encode($consultar);
    }
    function insertar_sta(){
        global $db;
        extract($_POST);
        $insertar=$db->insert("stats",["sta_nom"=>$nom,
        "sta_num"=>$des,"sta_ico"=>$ico, "sta_fa"=>date("Y").date("m").date("d")]);


        if($insertar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function eliminar_sta(){
        global $db;
        extract($_POST);
        $eliminar=$db->delete("stats",["sta_id" => $sta]);

        if($eliminar){
            echo 1;
        }else{
            echo 2;
        }
    }

    //Cosechas
    function mostrar_cos(){
        global $db;
        $consultar = $db->select("cosecha","*");
	    echo json_encode($consultar);
    }
    function editar_cos(){
        global $db;
        extract($_POST);
        $editar=$db->update("cosecha",["cos_nom"=>$nom,
        "cos_desc"=>$des,"cos_ico"=>$ico],["cos_id"=>$registro]);


        if($editar){
            echo 3;
        }else{
            echo 4;
        }
    }
    function consulta_cos(){
        global $db;
        extract($_POST);
        $consultar = $db -> get("cosecha","*",["AND" => ["cos_id"=>$registro]]);
        echo json_encode($consultar);
    }
    function insertar_cos(){
        global $db;
        extract($_POST);
        $insertar=$db->insert("cosecha",["cos_nom"=>$nom,
        "cos_desc"=>$des,"cos_ico"=>$ico]);


        if($insertar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function eliminar_cos(){
        global $db;
        extract($_POST);
        $eliminar=$db->delete("cosecha",["cos_id" => $cos]);

        if($eliminar){
            echo 1;
        }else{
            echo 2;
        }
    }
    //productos
    function consulta_pro(){
        global $db;
        extract($_POST);
        $consultar = $db -> get("productos","*",["AND" => ["pro_id"=>$registro]]);
        echo json_encode($consultar);
    }
    function editar_pro(){
        global $db;
        extract($_POST);
        $editar=$db->update("productos",["pro_nom"=>$nombre,
        "pro_img"=>$foto,"pro_desc"=>$des],["pro_id"=>$registro]);


        if($editar){
            echo 3;
        }else{
            echo 4;
        }
    }
    function eliminar_pro(){
        global $db;
        extract($_POST);
        $eliminar=$db->delete("productos",["pro_id" => $pro]);

        if($eliminar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function mostrar_pro(){
        global $db;
        $consultar = $db->select("productos","*");
	    echo json_encode($consultar);
    }
    function insertar_pro(){
        global $db;
        extract($_POST);
        $insertar=$db->insert("productos",["pro_nom"=>$nombre,
        "pro_img"=>$foto,"pro_desc"=>$des, "pro_fa"=>date("Y").date("m").date("d")]);


        if($insertar){
            echo 1;
        }else{
            echo 2;
        }
    }
    //caracteristicas
    function mostrar_car(){
        global $db;
        $consultar = $db->select("caracteristicas","*");
	    echo json_encode($consultar);
    }
    function editar_car(){
        global $db;
        extract($_POST);
        $editar=$db->update("caracteristicas",["car_nom"=>$nom,
        "car_desc"=>$des,"car_ico"=>$ico],["car_id"=>$registro]);


        if($editar){
            echo 3;
        }else{
            echo 4;
        }
    }
    function consulta_car(){
        global $db;
        extract($_POST);
        $consultar = $db -> get("caracteristicas","*",["AND" => ["car_id"=>$registro]]);
        echo json_encode($consultar);
    }
    function insertar_car(){
        global $db;
        extract($_POST);
        $insertar=$db->insert("caracteristicas",["car_nom"=>$nom,
        "car_desc"=>$des,"car_ico"=>$ico, "car_fa"=>date("Y").date("m").date("d")]);


        if($insertar){
            echo 1;
        }else{
            echo 2;
        }
    }
    function eliminar_car(){
        global $db;
        extract($_POST);
        $eliminar=$db->delete("caracteristicas",["car_id" => $car]);

        if($eliminar){
            echo 1;
        }else{
            echo 2;
        }
    }

    //funciones pra galeria
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
        "gal_img"=>$foto],["gal_id"=>$registro]);


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

    //funcion para cargar imagenes
    function carga_foto(){
        if(isset($_FILES["archivo"])){
            $foto=$_FILES["archivo"]["name"];
            $temporal=$_FILES["archivo"]["tmp_name"];
            $carpeta="../../images/";
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
//servicios
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

    $type=$db->select("usuarios","*",["AND"=>["usr_email"=>$user,"usr_password"=>$password]]);
    create_session($user,$type);

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
        extract($_POST);
        global $db;


        //Datos para el correo
        $destino="xw_1745@hotmail.com";
        $asunto="Comentario";

        $header="De: $nom \n";
        $header.="Correo: $correo \n";
        $header.="Telefono: $tel \n";
        $header.="Mensaje: $mensaje \n";

        //enviando mensaje
       $enviar= mail($destino,$asunto,$header);
       if($enviar){
           echo 1;
       }

    }


?>
