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
		
		$link = $daoArtigo->capturarString($result2[0]);

		//echo($link); echo("<br>");

		$titulo = $result2[1];
		
		$resultado = $daoArtigo->listarArtigos();
		
		//$daoArtigo->inserirArtigo(1, $titulo, $link);
		  
		while($dados = mysqli_fetch_array($resultado))	  
		{
			if($titulo != $dados['titulo'] )
			{
				
				$artigo = new Artigo(1, 1, $titulo, $link);
				
				//echo("titulo: ".$titulo."Link: ".$link);
				
				$result = $daoArtigo->inserirArtigo($artigo);
				
				if(!$result)
				{
					echo("Gravou");
				}
				else
				{
					echo("Não gravou");
				}
				
				print_r($artigo);
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
    <title>Chayd`s</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <figure class="imgcontainer">
    </figure>
    
    <nav id="topnav">
    <ul>
        <li><a href='../../../index.php'>INÍCIO</a>
        </li>
        <li><a href='#'>ARTIGOS</a>
        </li>
      </ul>
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