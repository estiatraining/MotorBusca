<?php
     //classe filha funcDados que herda o tipo de banco da classe conexao e contem os metodos que sao utilizados para trabalhar com os bancos de dados postgre e mysql
    include_once "loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('transacao,conexao,logs,sessoes');
     class funcoesDados
     {
        private $consulta = ''; //atributo de nome consulta
        private $resposta = ''; // atributo de retorno se os dados foram inseridos ou nao!
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
        //metodo destruct que destroi os valores dos atributos
        public function __destruct(){}
        //metodo getLinhas retorna o numero de linhas de uma respectiva consulta ao banco de dados
        public final function getLinhas($_consulta)
        {
            if(self::$tipo == "pgsql")
            {
                return pg_num_rows($_consulta);
            }
            else if(self::$tipo == "mysql")
            {
                return mysql_num_rows($_consulta);
            }
        }
        // metodo getResultados retorna em forma de array os resultados de uma consulta ao banco de dados
        public final function getResultados($_consulta)
        {
            if(self::$tipo == "pgsql")
            {
                return pg_fetch_assoc($_consulta);
            }
            else if(self::$tipo == "mysql")
            {
                return mysql_fetch_assoc($_consulta);
            }
        }
        // metodo getLibera libera os campos da consulta que foi setada no metodo getResultados.
        public final function getLibera($_consulta)
        {
            if(self::$tipo == "pgsql")
            {
                return pg_free_result($_consulta);
            }
            else if(self::$tipo == "mysql")
            {
                return mysql_free_result($_consulta);
            }
        }
     }
?>
