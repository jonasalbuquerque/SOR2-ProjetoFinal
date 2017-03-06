<?php
require_once('nusoap/lib/nusoap.php');
$wsdl   = 'http://localhost/SOR2-ProjetoFinal/server2.php?wsdl';
$client = new soapclient($wsdl, true);
$err    = $client->getError();
if ($err) {
    echo "Erro no construtor<pre>" . $err . "</pre>";
}
$result = $client->call('alunosMatriculados', array(
    'Programação Web'
));
if ($client->fault) {
    echo "Falha<pre>" . print_r($result) . "</pre>";
} else {
    $err = $client->getError();
    if ($err) {
        echo "Erro<pre>" . $err . "</pre>";
    } else {
    	/*foreach ($aluno as $result) {
    		print_r($aluno);
    	}*/
        print_r($result);
        
    }
}
?>