<?php
//include "nusoap/lib/nusoap.php";
//ini_set('display_errors','Off');
$servidor = "localhost";
$usuario_bd = "root";
$banco = "maumau";
$con = mysql_connect ($servidor, $usuario_bd);
mysql_select_db($banco);

require_once('nusoap/lib/nusoap.php');

$server = new soap_server;
$server->configureWSDL('server.alunosMatriculados', 'urn:server.alunosMatriculados');
$server->wsdl->schemaTargetNamespace = 'urn:server.alunosMatriculados';

$server->register('alunosMatriculados', 
	array('name' => 'xsd:string'),
	array('return' => 'xsd:string'),
	'urn:server.alunosMatriculados',
	'urn:server.alunosMatriculados#alunosMatriculados',
	'rpc',
	'encoded',
	'Retorna os alunos');
$query = mysql_query("SELECT * FROM disciplinas WHERE name = '".$name."'");
$id_disciplina = mysql_result($query,0,'id');
$query2 = mysql_query("SELECT * FROM alunos,turmas WHERE turmas.id_disciplina=".$id_disciplina." AND turmas.id_aluno=alunos.id GROUP BY alunos.nome");
 $resultado = mysql_fetch_array($query);

function alunosMatriculados($name)
{
    return $resultado;
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
mysql_close($con);
?>