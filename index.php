<?php session_start(); ?>
<?php
if(isset($_SESSION['usuarioNome']))
{
	echo($_SESSION['usuarioNome']);
}
else
{
	echo('deslogado');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.jpg" /> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Teste</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.jpg" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">LOGAR <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='Classes/View/Artigos/artigos.php'>ARTIGOS</a>
          </li>
        </ul>
      </div>
    </nav>
<p>&nbsp;</p>
<p>&nbsp;</p>
 <div>
 <form name="formLogar" action="Classes/Conexao/valida/valida.php" target="_self" method="post">
 <table class="jumbotron" width="600" bgcolor="#EEEEEE" align="center">
<tr><td align="center" height="39" border="1"><h2>LOGAR</h2></td></tr>
 <tr>
    <tr>
      <td align="center"><font color="#000000"></font></br>
    <input class='btn btn-group border-0 text-center font-weight-bold' name="email_usu" size="35" placeholder="usuário (Obrigatório)" id="email_usuario" type="text" maxlength="60"></td>
    </tr>
    <tr><td><blockquote></blockquote></td></tr>
    <tr>
      <td align="center"><font color="#000000"></font></br>
    <input class='btn btn-group border-0 text-center font-weight-bold' name="senha_usu" placeholder="senha (Obrigatório)" size="35" id="senha_usu" type="password" maxlength="16"></td>
    </tr>
	<tr><td><blockquote></blockquote></td></tr>
   <tr>
      <td align="center"><input class="btn btn-block btn-lg btn-success" type="submit" value="Entrar" name="logar" id="enviar" ></td>
</tr>
<tr><td><blockquote></blockquote></td></tr>
<tr>
      <td align="center"><input class="btn btn-block btn-lg btn-danger" type="submit" formaction="Classes/Conexao/valida/sair.php" value="Sair" name="logar" id="enviar" >
	  </td>
</tr>
<tr><td><blockquote></blockquote></td></tr>
</table>
 </form>
 </di>
    <br/>
    <br/>
    <br/>
    <p>&nbsp;</p>
    </br>&nbsp;
  </body>

</html>