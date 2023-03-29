<?php
include_once "classe_aluno/aluno.class.php";
$aluno1 = new Aluno("joao","vitor",22,"sistemas");
// $aluno1->setNome("joao"); //$aluno->nome = "joao";
// $aluno1->setSobrenome("vitor");
// $aluno1->setIdade(20);
// $aluno1->setTurma("2 ano");


print_r($aluno1);

// $aluno1->getNomeCompleto();

echo "O nome do aluno é: ". $aluno1->getNomeCompleto();