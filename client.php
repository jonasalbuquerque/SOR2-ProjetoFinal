<?php 

include "nusoap/lib/nusoap.php";
$client = new soapclient('http://localhost/SOR2-ProjetoFinal/server.php?wsdl');
$escolha = $_GET['escolha'];
if ($escolha == 1){
	$result = $client->call('exibe', array('id'=>$_POST["disciplina"]));
	utf8_decode($result);
	$lista = unserialize($result);
}
else if ($escolha ==2){
	$result = $client->call('cadastra', array('nome'=>$_POST["nome"], 'matricula'=>$_POST["matricula"]));
}
else if ($escolha ==3){
	$result = $client->call('matricula', array('nome'=>$_POST["nome"], 'disciplina'=>$_POST["disciplina"]));
}
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Web service Maumau</title>
	<meta charset="utf-8">
</head>
<body>
	<?php if ($escolha == 1){ ?>
	<h1><?php print_r($lista["disciplina"]); ?></h1>
	<table>
	<tr>
		<td><b>Nº</b></td>
		<td><b>Nome</b></td>
		<td><b>Matrícula</b></td>
	</tr>
	<?php 
		$linha = 0;
		foreach ($lista as $matricula => $nome) { 
			if(($matricula!="disciplina") and ($matricula!="voltar")) {?>
		<tr>
			<td> <?php echo $linha; ?></td>
			<td> <?php  print_r($nome); ?></td>
			<td> <?php  print_r($matricula); ?></td>
		</tr>
	<?php $linha++; }} ?>
	</table>
	<?php echo "<br><br>".$lista["voltar"];
	} else if($escolha == 2)
	 	echo "<p>".$result."</p";
	  else if ($escolha == 3)
	 	echo "<p>".$result."</p"; ?>	
</body>
</html>