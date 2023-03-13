<?php
include_once "classes/ul.class.php";

$valores = array("joao","antônio","marcos","google","facebook");
$definicao = array("Aluno","Aluno","Aluno","Site","Site");

echo("<h2> Lista OL </h2>");
echo(new Listas("1","li-padrao","ol",$valores));


echo("<h2> Lista UL </h2>");
echo(new Listas("2","li-padrao","ul",$valores));

echo("<h2> Lista DL </h2>");
echo(new Listas("3","li-padrao","dl",$valores,$definicao));