<?php
require_once('C:\Users\Alunos\Downloads\nusoap-0.9.5\lib\nusoap.php');
$wsdl   = 'http://localhost/maumau/server2.php?wsdl';
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
    	foreach ($aluno as $result) {
    		print_r($aluno);
    	}
    }
}
?>