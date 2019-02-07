<?php session_start(); ?>
<?php
		unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome']
		);
		
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../../index.php'>
			<script type= \"text/javascript\">
			alert(\"A sessão foi encerrada com sucesso.\");
			</script>";
?>