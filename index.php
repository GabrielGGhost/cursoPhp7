<?php 

require_once("config.php");

// Carregar 1 usuário
//$root = new Usuario();
// $root->loadById(4);
// echo $root;

//Carregar todos os dados
//$list = Usuario::getList();
// echo json_encode($list);

//Carregar uma lista de usuários buscando pelo login
// $search = Usuario::search("Gabriel");
// echo json_encode($search);

$user = new Usuario();

$user->login("Gabriel Artioli","Senha1234567");

echo $user;

?>