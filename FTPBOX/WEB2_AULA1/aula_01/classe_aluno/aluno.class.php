<?php
class Aluno {
    private $nome;
    private $sobrenome;
    private $idade;
    private $turma;

    function __construct($nomeExteno, $sobrenomeExteno, $idadeExteno, $turmaExteno){
        $this->nome = $nomeExteno;
        $this->sobrenome = $sobrenomeExteno;
        $this->idade = $idadeExteno;
        $this->turma = $turmaExteno;
    }

    function getNome(){
        return $this->nome;
    }

    function getSobrenome(){
        return $this->sobrenome;
    }

    function getIdade(){
        return $this->idade;
    }

    function getTurma(){
        return $this->turma;
    }

    function setNome($nomeExteno){
        $this->nome = $nomeExteno;
    }

    function setSobrenome($sobrenomeExteno){
        $this->sobrenome = $sobrenomeExteno;
    }

    function setIdade($idadeExteno){
        $this->idade = $idadeExteno;
    }

    function setTurma($turmaExteno){
        $this->turma = $turmaExteno;
    }

    function getNomeCompleto(){
        //echo "O nome completo é: {$this->nome} {$this->sobrenome}";
        return "{$this->nome} {$this->sobrenome}";
    }

    function __toString()
    {
        return $this->nome ."". $this->sobrenome;
    }

}