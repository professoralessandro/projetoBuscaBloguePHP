<?php session_start(); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php include_once("../../Model/Artigo.php"); ?>
<?php include_once("../../Model/Usuario.php"); ?>
<?php include_once("../../Controller/DAOArtigo.php"); ?>
<?php include_once("../../Controller/DAOUsuario.php"); ?>
<?php

$conexao = new Conexao();

$daoArtigo = new DAOArtigo($conexao);

$url = 'https://www.uplexis.com.br/blog/';

$dadosSite = file_get_contents($url);

$result = explode('<div class="wrap-button">', $dadosSite);

$cont = 0;

if(isset($_POST['capturar']) && $_POST['capturar'] != null)
{
	foreach($result as $re)
	{
		
		$result2 = explode('</a>', $result[$cont + 1]);
		
		//echo("titulo: ".$titulo."Link: ".$link);
		
		$lk = $daoArtigo->capturarString($result2[0]);

		//echo($link); echo("<br>");

		$tit = $result2[1];
		
		$resultado = $daoArtigo->listarArtigos();
		
		//$daoArtigo->inserirArtigo(1, $titulo, $link);
		  
		while($dados = mysqli_fetch_array($resultado))	  
		{
			if($tit != $dados['titulo'] )
			{
				
				//$artigo = new Artigo(1, 1, $titulo, $link);
				
				//echo("titulo: ".$titulo."Link: ".$link);
				
				$result = $daoArtigo->inserirArtigo($tit, $lk);
				
				//echo($result);
				/*
				if(!$result)
				{
					echo("Gravou");
				}
				else
				{
					echo("Não gravou");
				}
				*/
				//print_r($artigo);
			}
			else
			{
				
			}
		}
		$cont ++;
	}
}
	

if(isset($_SESSION['usuarioNome']))
{
	echo($_SESSION['usuarioNome']);
}
else
{
	echo('deslogado');
}
?>
<script type="text/javascript">
function conf(){ 
   if( !confirm("Esta operação é irreversível. Tem certeza que deseja deletar o departamento ?") )
           return false;
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="../../../../img/favicon.jpg" /> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produto</title>
    <!-- Bootstrap -->
    <link href="../../../css/bootstrap-4.0.0.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="../../../images/favicon.jpg" />
</head>
<body>
    <figure class="imgcontainer">
    </figure>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../../../index.php">LOGAR <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='#'>ARTIGOS</a>
          </li>
        </ul>
      </div>
    </nav>
<p>&nbsp;</p>
<hr>
     <div class="container" align="center">
      <table align="center">
		<tr>
			<td align="center">
				<h5>&nbsp;&nbsp;&nbsp;&nbsp;id Artigo:&nbsp;&nbsp;&nbsp;&nbsp;</h5>
		    </td>
			<td align="center">
				<h5>&nbsp;&nbsp;&nbsp;&nbsp;Título:&nbsp;&nbsp;&nbsp;&nbsp;</h5>
		    </td>
			<td align="center">
				<h5>&nbsp;&nbsp;&nbsp;&nbsp;Link:&nbsp;&nbsp;&nbsp;&nbsp;</h5>
			</td>
	    </tr>
	<?php $contador = 0;
	$conexao = new Conexao();
    $daoArtigo = new DAOArtigo($conexao);
		  
	$resultado = $daoArtigo->listarArtigos();
		  
	while($dados = mysqli_fetch_array($resultado))	  
	{ $contador = $contador + 1; ?>
        <tr>
		  <td align="center">
              <?php echo $dados['id']; ?>
          </td>
          <td align="center">
              <?php echo $dados['titulo']; ?>
          </td>
          <td align="center">
			  <a href='../Visualizar/LerArtigo.php?idArtigo=<?php echo($dados['id']); ?>' >
              <?php echo $dados['link']; ?>
			  </a>
          </td>
		<?php
		if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && $_SESSION['usuarioNome'] == 'admin')
		{
		?>
		  <td align="center">
			  
		<!--	<a onclick="return conf();" href='ListaUsuarioInf.php?idPessoa=<?php echo $dados['idDepartamento'];?> '><input name='deletar' type='submit' value='Deletar' ></a> --> 
            <a onClick="return conf();" href='../Deletar/DeletarArtigo.php?idArtigo=<?php echo $dados['id'];?> '><input class="btn btn-danger" name='deletar' type='submit' value='Deletar' ></a>
		  </td>
        </tr>
	<?php
			}
	   } ?>
      </table>
   <?php
	if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && $_SESSION['usuarioNome'] == 'admin')
		{
		?>
	  <table>
	   <tr>
	   <form name="form_email" action="#" target="_self" method="post">
		   <td align="center">
				<input class="btn btn-primary" name='capturar' type='submit' value='Capturar' >
		   </td>
	   </form>
	   </tr>
	  </table>
	<?php } ?>
    </div>
    <hr>
 </di>
    <br/>
    <br/>
    <br/>
    <p>&nbsp;</p>
    </br>&nbsp;
  </body>

</html>