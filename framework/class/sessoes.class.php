<?php
/*
    Arquivo sessoes.class.php é o arquivo que seta as sessoes do sistema
    Autor: Cleison Ferreira de Melo.
*/
    class sessoes
    {
        public $nome = '';
        public $valor = '';
        public final function __construct() {  }
        public final function startSessao()
        {
            @session_start();
        }
        public final function setSessao($_nome,$_valor)
        {
            $this->nome = $_nome;
            $this->valor = $_valor;
            session_register("'".$this->nome."'");
            $_SESSION["'".$this->nome."'"] = $this->valor;
        }
        public final function getSessao($_nome)
        {
            return $_SESSION["'".$_nome."'"];
        }
        public final function destroySessao($_nome)
        {
            $_SESSION["'".$_nome."'"];
            session_destroy();
        }
    }
?>
