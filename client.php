<?php 

include "nusoap/lib/nusoap.php";
$client = new soapclient('http://localhost/SOR2-ProjetoFinal/server.php?wsdl');
$result = $client->call('exemplo', array('id'=>$_POST["disciplina"]));
utf8_decode($result);
$teste = unserialize($result);
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Web service Maumau</title>
	<meta charset="utf-8">
</head>
<body>
	<h1><?php print_r($teste["disciplina"]); ?></h1>
	<table>
	<tr>
		<td><b>Nº</b></td>
		<td><b>Nome</b></td>
		<td><b>Matrícula</b></td>
	</tr>
	<?php 
		$linha = 0;
		foreach ($teste as $matricula => $nome) { 
			if($matricula!="disciplina") {?>
		<tr>
			<td> <?php echo $linha; ?></td>
			<td> <?php  print_r($nome); ?></td>
			<td> <?php  print_r($matricula); ?></td>
		</tr>
	<?php $linha++; }} ?>
	</table>
	
</body>
</html>