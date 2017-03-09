<?php 
include "nusoap/lib/nusoap.php";
$server = new soap_server;
$server->configureWSDL('urn:Servidor');
$server->wsdl->schemaTargetNamespace = 'urn:Servidor';


function exemplo($id){
	$con = mysql_connect ('localhost', 'root');
	mysql_select_db('maumau');
	$query = mysql_query("SELECT nome FROM disciplina WHERE id =".$id);
	$nome = mysql_result($query, 0, "nome");
	$query2 = mysql_query("SELECT * FROM aluno,turmas WHERE turmas.id_disciplina=".$id." AND turmas.id_aluno=aluno.id GROUP BY aluno.nome");
	$array = [];
	$array["disciplina"] = utf8_encode($nome);
	while ($resultado = mysql_fetch_array($query2)){
		$r = utf8_encode($resultado["nome"]);
		$array[$resultado["matricula"]] =  $r; 
	}
	
	return serialize($array);
}
 $server->register('exemplo', 
	array('id' => 'xsd:int'),
	array('return' => 'xsd:string'),
	'urn:Servidor.exemplo',
	'urn:Servidor.exemplo',
	'rpc',
	'encoded',
	'Retorna os alunos');

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

 ?>
