<?php
$servidor = "localhost";
$usuario_bd = "root";
$senha_bd = "";
$banco = "maumau";
$con = mysql_connect ($servidor, $usuario_bd, $senha_bd);
mysql_select_db($banco);

require_once('C:\Users\Alunos\Downloads\nusoap-0.9.5\lib\nusoap.php');
$server = new soap_server;
$server->configureWSDL('server.alunosMatriculados', 'urn:server.alunosMatriculados');
$server->wsdl->schemaTargetNamespace = 'urn:server.alunosMatriculados';

$server->register('alunosMatriculados', array(
    'name' => 'xsd:string'
), array(
    'return' => array('xsd:string')
), 'urn:server.alunosMatriculados', 'urn:server.alunosMatriculados#alunosMatriculados', 'rpc', 'encoded', 'Retorna os alunos');

function alunosMatriculados($name)
{
    $query = mysql_query("SELECT nome FROM alunos, turmas, disciplinas WHERE alunos.id = turmas.id_aluno AND disciplinas.id = turmas.id_disciplina AND disciplinas.nome = ".$name);
    $resultado = mysql_fetch_array($query);
    return $resultado;
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>