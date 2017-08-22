<?php
/*
    Arquivo transacao.class.php é o arquivo que persiste os dados no banco de dados
    Autor: Cleison Ferreira de Melo.
*/
    include_once "loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('conexao');
    final class transacao
    {
        private $sql = '';
        private static $conexao = '';
        private static $tipo = '';
        public final function __construct()
        {
            if(empty(self::$conexao))
            {
                self::$conexao = new conexao();
                self::$conexao->conectar();
                self::$tipo = self::$conexao->tipo;
            }
        }
        public final function startTransacao()
        {
            $this->sql = " START TRANSACTION ;";
            if(self::$tipo == 'pgsql')
            {
                pg_query($this->sql);
            }
            if(self::$tipo == 'mysql')
            {
                mysql_query($this->sql);
            }
        }
        public final function getCommitTransacao()
        {
            $this->sql = " COMMIT ;";
            if(self::$tipo == 'pgsql')
            {
                return pg_query($this->sql);
            }
            if(self::$tipo == 'mysql')
            {
                return mysql_query($this->sql);
            }
        }
        public final function getRollbackTransacao()
        {
            $this->sql = " ROLLBACK ;";
            if(self::$tipo == 'pgsql')
            {
                pg_query($this->sql);
            }
            if(self::$tipo == 'mysql')
            {
                mysql_query($this->sql);
            }
        }
    }
?>