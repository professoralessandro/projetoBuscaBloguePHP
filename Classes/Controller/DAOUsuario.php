<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/Usuario.php"); ?>
<?php
class DAOUsuario 
{
	//ATRIBUTOS
	private $conexao;
	//ATRIBUTOS
	
	//CONSTRUTOR
	public function __construct($conexao)
    {
        $this->conexao = $conexao;
		//$this->conexao = new Conexao();
    }
	//CONSTRUTOR
    
	//METODOS
	public function inserirUsuario($usuario)
	{
		$sqlComand = "insert into usuario(usuario, senha) values('";
		$sqlComand = $sqlComand . $usuario->getUsuario() . "','";
		$sqlComand = $sqlComand . $usuario->getSenha() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//INSERIR
	
	public function alterarUsuario($usuario)
	{
		$sqlComand = "update usuario set usuario = ". $usuario->getUsuario() .
		" senha = ". $usuario->getSenha() .
		" where id = ". $usuario->getId()
		;
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}
	
	public function excluirUsuario($id)
	{
		$sqlComand = "delete from usuario where id = ". $id ;		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}
	
	public function localizarUsuario($id)
	{
		$sqlComand = "select * from usuario where id = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}
	
	//ALTENTICARUSUARIO
	public function altenticarUsuario($usuario)
	{
		//$usuario = new Usuario();
		
		$sqlComand = $sqli = "SELECT * FROM `usuario` WHERE usuario = '".$usuario->getUsuario()."' && senha = '".$usuario->getSenha()."' LIMIT 1";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}
	//ALTENTICARUSUARIO
	
	public function listarUsuario()
	{
		$sqlComand = " select * from usuario ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}
	//METODOS
}//class
?>