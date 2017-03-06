<?php 

$con = mysql_connect ('localhost', 'root');
mysql_select_db('maumau');
$query = mysql_query("SELECT * FROM alunos,turmas WHERE turmas.id_disciplina=1 AND turmas.id_aluno=alunos.id GROUP BY alunos.nome");
$resultado = mysql_fetch_array($query);
while($linha = mysql_fetch_array($query)){
	echo $linha["nome"];
}
		 
mysql_close($con);

 ?>