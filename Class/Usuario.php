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

			$this->setData($results[0]);

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

			$this->setData($results[0]);
		}
	}

	public function setData($data){

		$this->setIdUsuario($data["id_usuario"]);
		$this->setDesLogin($data["desLogin"]);
		$this->setDesSenha($data["desSenha"]);
		$this->setDtCadastro(new DateTime($data["dtCadastro"]));
	}

	public function insert(){
		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			':LOGIN'=>$this->getDesLogin(),
			':PASSWORD'=>$this->getDesSenha()
		));

		if(count($results) > 0){

			$this->setData($results[0]);
		}
	}

	public function update($login, $password){

		$this->setDesLogin($login);
		$this->setDesSenha($password);

		$sql = new Sql();

		$sql->query("UPDATE tb_usuarios SET desLogin = :LOGIN desSenha = :PASSWORD WHERE id_usuario = :ID", array(
			':LOGIN'=>$this->getDesLogin(),
			':PASSWORD'=>$this->getDesSenha(),
			':ID'=>$this->getIdUsuario()));
	}

	public function __construct($login = "", $password = ""){
		$this->setDesLogin($login);
		$this->setDesSenha($password);
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