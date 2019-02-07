<img src="../../../index.php"
<?php session_start(); ?>
<?php include_once("../Conexao.php"); ?>
<?php include_once("../../Model/Usuario.php"); ?>
<?php include_once("../../Controller/DAOUsuario.php"); ?> 
<?php
if(isset($_POST['logar']) && isset($_POST['email_usu']) && isset($_POST['senha_usu']))
{
	$usu = trim($_POST['email_usu']); //Escapar de injeção sql

	$senha = trim($_POST['senha_usu']);
	
	$conexao = new Conexao();
	
	$daoUsuario =  new DAOUsuario($conexao);
	
	$usuario = new Usuario(1, $usu, $senha);
	
	//print_r($usuario);
	
	$result = $daoUsuario->altenticarUsuario($usuario);

	$resultado = mysqli_fetch_assoc($result);

	if(!$resultado)
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../index.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao logar. Por favor verifique login e senha, tente novamente.\");
		</script>";
	}
	elseif(isset($resultado))
	{
		$_SESSION['usuarioId'] = $resultado['id'];
		$_SESSION['usuarioNome'] = $resultado['usuario'];
		
		header("Location: ../../../index.php");
	}
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../../index.php'>
			<script type= \"text/javascript\">
			alert(\"Usuário ou senha inválido. verifique os campos obrigatórios.\");
			</script>";
}
?>