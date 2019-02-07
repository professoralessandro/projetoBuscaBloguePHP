<?php session_start(); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php include_once("../../Model/Artigo.php"); ?>
<?php include_once("../../Controller/DAOArtigo.php"); ?>

<?php
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && $_SESSION['usuarioNome'] == 'admin')
{
	if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null)
	{
		$conexao = new Conexao();

		$daoArtigo = new DAOArtigo($conexao);

		$id = trim(filter_input(INPUT_GET, 'idArtigo', FILTER_SANITIZE_NUMBER_INT));

		$usuariodelOK = $daoArtigo->excluirArtigo($id);

		if(!$usuariodelOK)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http:../Artigos/artigos.php'>
			<script type= \"text/javascript\">
			alert(\"O artigo foi deletado com sucesso.\");
			</script>";
		}
		else
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http:../Artigos/artigos.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao deletar o artigo. Tente novamente\");
			</script>";
		}
	}//ISSET LOGIN
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
			<script type= \"text/javascript\">
			alert(\"Erro. Você não tem permissão para acessar a página\");
			</script>";
	}//SESSION
}//IF VERIFICA GERENTE
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
		<script type= \"text/javascript\">
		alert(\"Você não tem autorização.\");
		</script>";
}//IF VERIFICA GERENTE
?>