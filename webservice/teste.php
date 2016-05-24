<?php
$chave = md5("projetoapk");
echo "
<!DOCTYPE html>
	<head>
		<title>teste webservice</title>
	</head>
	<body>
		<form action='http://localhost/webservice/wsCadastro.php' method='POST'>
		Nome <input type='text' name='nome'/> <br>
		Email <input type='text' name='email'/> <br>
		Senha <input type='text' name='senha'/> <br>
		<input type='hidden' name='chave' value='".$chave."'/><br>
		<input type='submit' name='Enviar'/>
		</form>
		<br>
		<br>
		<br>
		<br>
		<label>Pesquisa (ID)</label>
		<form action='http://localhost/webservice/wsPesquisa.php' method='POST'/>
		<input type='text' name='id' /> 
		<input type='hidden' name='chave' value='".$chave."'/>
		<input type='submit' name='Pesquisar' />
		</form>
		<br>
		<br>
		<br>
		<br>
		<label>Deletar (inativa)</label>
		<form action='http://localhost/webservice/wsInativa.php' method='POST'/>
		<input type='text' name='id' /> 
		<input type='hidden' name='chave' value='".$chave."'/>
		<input type='submit' name='Inativar' />
		</form>
	</body>
</html>
";
?>