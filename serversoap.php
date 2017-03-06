<?php 

$servidor = "localhost";
$usuario_bd = "root";
$banco = "maumau";
$con = mysql_connect($servidor, $usuario_bd);
mysql_select_db($banco);

$server = new SoapServer(null, array('uri'=>"http://localhost/SOR2-ProjetoFinal"));

function hello($name){
	$query = mysql_query("SELECT * FROM disciplina WHERE nome = '".$name."'");
	$id_disciplina = mysql_result($query,0,'id');
	$query2 = mysql_query("SELECT * FROM aluno,turmas WHERE turmas.id_disciplina=".$id_disciplina." AND turmas.id_aluno=aluno.id GROUP BY aluno.nome");
	
	$resultado = "";
	$count = 0;
	while($linha = mysql_fetch_array($query2)){
		$resultado += $linha['nome'];
		$count++;
	}
	$resultado += "".$count;
	return $resultado;
}

$server->addFunction("hello");

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$server->handle();
} else{
	$functions = $server->getFunctions();
	foreach ($functions as $func) {
		print $func."<br>";
	}
}

 ?>