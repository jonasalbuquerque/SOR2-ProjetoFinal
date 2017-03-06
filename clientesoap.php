<?php 
$client = new SoapClient(null, array(
	'location' => 'http://localhost/SOR2-ProjetoFinal/serversoap.php',
	'uri'=>'http:/localhost/SOR2-ProjetoFinal',
	'trace' => 1));

$result = $client->hello("Sistemas Operacionais de Redes I");

if (is_soap_fault($result)){
	trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})", E_ERROR);
} else{
	echo "Resultado Encontrado: <br><br>";
	echo $result;
}
 
?>
