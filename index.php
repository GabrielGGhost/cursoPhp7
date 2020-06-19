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

//Fazer login
// $user = new Usuario();
// $user->login("Gabriel Artioli","Senha1234567");
// echo $user;

//Insere um novo usuário
// $aluno = new Usuario();
// $aluno->setDeslogin("Aluno");
// $aluno->setDesSenha("@aluno");
// $aluno->insert();
// echo $aluno;

// Insere um novo usuário mais facilmente
// $aluno = new Usuario("Joaozinho", "987654321");
// $aluno->insert();
// echo $aluno;

//Alterar Usuário
// $aluno = new Usuario();
// $aluno->loadById(7);
// $aluno->update("Joao", "senhaCerta");

$aluno = new Usuario();
$aluno->loadById(7);
$aluno->delete();

echo $aluno;
?>