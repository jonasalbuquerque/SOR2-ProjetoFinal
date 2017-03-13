<?php 
include "nusoap/lib/nusoap.php";
$server = new soap_server;
$server->configureWSDL('urn:Servidor');
$server->wsdl->schemaTargetNamespace = 'urn:Servidor';

$server->register('exibe', 
	array('id' => 'xsd:int'),
	array('return' => 'xsd:string'),
	'urn:Servidor.exibe',
	'urn:Servidor.exibe',
	'rpc',
	'encoded',
	'Retorna os alunos');
$server->register('cadastra', 
	array('nome' => 'xsd:string',
			'matricula'=>'xsd:int'),
	array('return' => 'xsd:string'),
	'urn:Servidor.cadastra',
	'urn:Servidor.cadastra',
	'rpc',
	'encoded',
	'Cadastra alunos');
$server->register('matricula', 
	array('nome' => 'xsd:string',
			'disciplina'=>'xsd:int'),
	array('return' => 'xsd:string'),
	'urn:Servidor.matricula',
	'urn:Servidor.matricula',
	'rpc',
	'encoded',
	'Cadastra alunos');
function exibe($id){
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
	$array["voltar"] = "<a href='index.php'>Voltar</a>";
	mysql_close($con);
	return serialize($array);
}
function cadastra($nome, $matricula){
	$con = mysql_connect ('localhost', 'root');
	mysql_select_db('maumau');
	$query = mysql_query("INSERT INTO aluno(nome,matricula) VALUES ('".$nome."',".$matricula.")");
	mysql_close($con);
	return "Aluno cadastrado com sucesso. <br><br> <a href='index.php'>Voltar</a>";
}
function matricula($nome, $disciplina){
	$con = mysql_connect ('localhost', 'root');
	mysql_select_db('maumau');
	$q = mysql_query("SELECT * FROM aluno WHERE nome='".$nome."'");
	$id = mysql_result($q, 0, "id");
	$query = mysql_query("INSERT INTO turmas(id_aluno,id_disciplina) VALUES ('".$id."',".$disciplina.")");
	mysql_close($con);
	return "Aluno matriculado com sucesso. <br><br> <a href='index.php'>Voltar</a>";
}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

 ?>
