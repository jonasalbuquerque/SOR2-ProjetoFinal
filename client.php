<?php 

include "nusoap/lib/nusoap.php";
$client = new soapclient('http://localhost/SOR2-ProjetoFinal/server.php?wsdl');
$result = $client->call('exemplo', array('name'=>$_POST["disciplina"]));
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
	<pre> <?php  print_r($teste); ?></pre>
	
</body>
</html>