<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/Artigo.php"); ?>
<?php
class DAOArtigo 
{
	//ATRIBUTOS
	private $conexao;
	//ATRIBUTOS
	
	//CONSTRUTOR
	public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
	//CONSTRUTOR
    
	//METODOS
	public function inserirArtigo($tit, $lk)
	{		
		$sqlComand = "insert into artigos(titulo, link, id_usuario) values('";
		$sqlComand = $sqlComand . $tit . "','";
		$sqlComand = $sqlComand . $lk . "','";
		$sqlComand = $sqlComand . 1 . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		//$this->conexao->Desconectar();
	}//INSERIR
	
	public function alterarArtigo($artigo)
	{
		$sqlComand = "update artigos set id_usuario = ". $artigo->getIdUsuario() .
		" titulo = ". $artigo->getTitulo() .
		" link = ". $artigo->getLink() .
		" where id = ". $artigo->getId()
		;
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}
	
	public function excluirArtigo($id)
	{
		$sqlComand = "delete from artigos where id = ". $id ;		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}
	
	public function localizarArtigo($id)
	{
		$sqlComand = "select * from artigos where id = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}
	
	public function listarArtigos()
	{
		$sqlComand = " select * from artigos ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}
	
	public function capturarDados($str)
	{
		$pos_espaco = strpos($str, ' ');// perceba que há um espaço aqui
		$primeiro_nome = substr($str, 0, $pos_espaco);
		$resto_nome = substr($str, $pos_espaco, strlen($str));

		return $primeiro_nome;
		//return array('primeiro_nome'=> $primeiro_nome, 'resto_nome' => $resto_nome);
	}
	
	function capturarString($string)
	{
		$source = array('<a href="', '"',  'class=btn-uplexis orange>Continue Lendo');
		$replace = array('', '');
		$valor = str_replace($source, $replace, $string); //remove os pontos e substitui a virgula pelo ponto
		return $valor; //retorna o valor formatado para gravar no banco
	}
	
	//METODOS
}//class
?>