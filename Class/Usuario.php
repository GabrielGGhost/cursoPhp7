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
		return $this->idUsuario;
	}


	public function getDesLogin(){
		return $this->desLogin;
	}
	public function setDesLogin($desLogin){
		return $this->DesLogin;
	}


	public function getDesSenha(){
		return $this->desSenha;
	}
	public function setDesSenha($desSenha){
		return $this->desSenha;
	}


	public function getDtCadastro(){
		return $this->dtCadastro;
	}
	public function setDtCadastro($dtCadastro){
		return $this->dtCadastro;
	}


	public function loadById($id){
		$sql = new Sql();

		$results = $sql->select("SELECT *  FROM tb_usuarios WHERE idUsuario = :ID", array(
			":ID"=> $id
		));

		if(count($results) > 0){

			$row = $results[0];

			$this->setIdUsuario($row['idUsuario']);
			$this->setDesLogin($row['desLogin']);
			$this->setDesSenha($row['desSenha']);
			$this->setDtCadastro(new DateTime($row['dtCadastro']));
		}
	}

	public function __toString(){
		return json_encode(array(
			"idUsuário"=>$this->getIdUsuario()
		));
	}
}


?>