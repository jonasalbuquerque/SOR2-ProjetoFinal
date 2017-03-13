<!DOCTYPE html>
<html>
<head>
	<title>Web service Maumau</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="client.php?escolha=3" method="POST">
		<p>DIGITE O NOME DO ALUNO E ESCOLHA A DISCIPLINA EM QUE DESEJA MATRICULA-LO</p>
		Nome: <input type="text" name="nome"><br>
		Disciplina:
		<select name="disciplina" >
			<option value="0"></option>
			<option value="1" >Implementação de Sistemas</option>
			<option value="2">Sistemas Operacionais de Redes I</option>
			<option value="3">Gestão Empresarial</option>
			<option value="4">Suporte ao Usuário</option>
			<option value="5">Tópicos especiais em informática</option>
		</select>
		<br><br><input type="submit" name="" value="Enviar">
	</form>
	<br><br><a href="index.php">Voltar</a>
</body>
</html>