<?php
/*
    Arquivo cookies.class.php é o arquivo que inseri cookies
    Autor: Cleison Ferreira de Melo.
*/
    final class cookies
    {
        private $nome = '';
        private $valor = '';
        public $tempo = '';
        public $caminho = '';
        public $dominio = '';
        public $seguranca = '';
        public final function __construct() {  }
        public final function setNome($_nome)
        {
            $this->nome = $_nome;
        }
        public final function setValor($_valor)
        {
            $this->valor = $_valor;
        }
        public final function getNome()
        {
            return $this->nome;
        }
        public final function getValor()
        {
            return $this->valor;
        }
        public final function imbutirCookies()
        {
            setcookie($this->nome, $this->valor, time()+60*60*24*30, $this->caminho, $this->dominio, $this->seguranca);
        }
        public final function lerCookies($_nome)
        {
            return $_COOKIE[ "$_nome" ];
        }
    }
?>
