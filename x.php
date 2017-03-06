<?php
$con = mysql_connect ('localhost', 'root');
mysql_select_db('maumau');
$id_disciplina = 1;
$query = mysql_query("SELECT * FROM aluno,turmas WHERE turmas.id_disciplina=".$id_disciplina." AND turmas.id_aluno=aluno.id GROUP BY aluno.nome");
$resultado = mysql_fetch_array($query);
while($linha = mysql_fetch_array($query)){
	echo $linha["nome"];
}
mysql_close($con);

 ?>