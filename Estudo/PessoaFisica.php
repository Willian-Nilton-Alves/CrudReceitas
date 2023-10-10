<?php
require __DIR__.'/home/willian/testtest/newteste/vendor/autoload.php';


class pessoaFisica {
    public $nome;
    public $idade;
    public $cpf;
    public $email;


}


$willian = new pessoaFisica();
$willian->nome = 'Willian';
$willian->idade = 25;
$willian->cpf = '123456789';
$willian->email = 'willian@example.com';

dump($willian);