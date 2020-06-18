<?php 

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios", array("ola"=>"ola"));

echo json_encode($usuarios);


?>