<?php 
include "nusoap/lib/nusoap.php";
$server = new soap_server;
$server->configureWSDL('urn:Servidor');
$server->wsdl->schemaTargetNamespace = 'urn:Servidor';

$con = mysql_connect ('localhost', 'root');
mysql_select_db('maumau');
	$query2 = mysql_query("SELECT * FROM alunos,turmas WHERE turmas.id_disciplina=".$id_disciplina." AND turmas.id_aluno=alunos.id GROUP BY alunos.nome");
 	$resultado = mysql_fetch_array($query);

function exemplo($x){

	return $resultado[0];
}
 $server->register('exemplo', 
	array('x' => 'xsd:int'),
	array('return' => 'xsd:string'),
	'urn:Servidor.exemplo',
	'urn:Servidor.exemplo',
	'rpc',
	'encoded',
	'Retorna os alunos');

 $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

 ?>
