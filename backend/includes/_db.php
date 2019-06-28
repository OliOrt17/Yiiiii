<?php 
require_once 'Medoo.php';

use Medoo\Medoo;
 
$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'softengi_data',
    'server' => 'softenginesolutions.com.mx',
    'username' => 'softengi_prueba',
    'password' => 'jlBmiBY,DH*6'
]);


    $db ->insert("comentario",[
    "cmt_nom"=>"nnd,,dm",
    "cmt_email"=>"kkldj",
    "cmt_tel"=>"747483",
    "cmt_mensaje"=>"lkjlrekjw",
    "cmt_fechA"=>date("Y").date("m").date("d"),
    "cmt_status"=>1]);

?>
