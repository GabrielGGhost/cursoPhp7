<?php 

class Usuario {

	private $idUsuario;
	private $desLogin;
	private $desSenha;
	private $dtCadastro;

	public function getIdUsuario(){
		return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}


	public function getDesLogin(){
		return $this->desLogin;
	}
	public function setDesLogin($desLogin){
		$this->desLogin = $desLogin;
	}


	public function getDesSenha(){
		return $this->desSenha;
	}
	public function setDesSenha($desSenha){
		$this->desSenha = $desSenha;
	}


	public function getDtCadastro(){
		return $this->dtCadastro;
	}
	public function setDtCadastro($dtCadastro){
		$this->dtCadastro = $dtCadastro;
	}

	public static function search($login){
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE desLogin LIKE concat('%' , :SEARCH, '%')", array(
			":SEARCH"=>$login));
	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios");
	}

	public function login($login, $password){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE desLogin = :LOGIN AND desSenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password));

		if(count($results) > 0){

			$row = $results[0];
			$this->setIdUsuario($row["id_usuario"]);
			$this->setDesLogin($row["desLogin"]);
			$this->setDesSenha($row["desSenha"]);
			$this->setDtCadastro(new DateTime($row["dtCadastro"]));
		} else
		{
			throw new Exception("Login ou senha incorretos");
		}

	}

	public function loadById($id){
		$sql = new Sql();

		$results = $sql->select("SELECT *  FROM tb_usuarios WHERE id_usuario = :ID", array(
			":ID"=> $id
		));

		if(count($results) > 0){

			$row = $results[0];
			$this->setIdUsuario($row["id_usuario"]);
			$this->setDesLogin($row["desLogin"]);
			$this->setDesSenha($row["desSenha"]);
			$this->setDtCadastro(new DateTime($row["dtCadastro"]));
		}
	}

	public function __toString(){
		return json_encode(array(
			"ID do Usuario: "=>$this->getIdUsuario(),
			"Login: " =>$this->getDesLogin(),
			"Senha: " =>$this->getDesSenha(),
			"Data de cadastro: " =>$this->getDtCadastro()
		));
	}
}


?>