<?php 

include "nusoap/lib/nusoap.php";
$client = new soapclient('http://localhost/SOR2-ProjetoFinal/serverTest.php?wsdl');
$result = $client->call('exemplo', array('x'=>1));
echo utf8_encode($result);

 ?>