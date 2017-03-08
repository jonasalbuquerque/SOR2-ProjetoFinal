<?php 
include "nusoap/lib/nusoap.php";
$server = new soap_server;
$server->configureWSDL('urn:Servidor');
$server->wsdl->schemaTargetNamespace = 'urn:Servidor';


function exemplo($name){
	$con = mysql_connect ('localhost', 'root');
	mysql_select_db('maumau');
	$query = mysql_query("SELECT id FROM disciplina WHERE nome='".$name."'");
	$id = mysql_result($query,0,'id');
	$query2 = mysql_query("SELECT * FROM aluno,turmas WHERE turmas.id_disciplina=".$id." AND turmas.id_aluno=aluno.id GROUP BY aluno.nome");
	$array = [];
	while ($resultado = mysql_fetch_array($query2)){
		array_push($array, $resultado["nome"]);
	}
	//$resultado = mysql_fetch_array($query2);
	
	return serialize($array);
}
 $server->register('exemplo', 
	array('name' => 'xsd:int'),
	array('return' => 'xsd:string'),
	'urn:Servidor.exemplo',
	'urn:Servidor.exemplo',
	'rpc',
	'encoded',
	'Retorna os alunos');

 $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

 ?>
