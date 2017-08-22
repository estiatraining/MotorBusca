<?php
/*
    classe conexao
    Autor: Cleison Ferreira de Melo
*/
    include_once "loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('excecoes');
    class conexao
    {
        private $usr = '';
        private $password = '';
        private $host = '';
        private $port = '';
        private $bank = '';
        public $tipo = '';
        final function __construct() { }
        final function conectar()
        {
            try
            {
                if(file_exists($_SERVER[ 'DOCUMENT_ROOT' ]."/framework/arquivos_ini/conexao.ini"))
                {
                    $dados = parse_ini_file($_SERVER[ 'DOCUMENT_ROOT' ]."/framework/arquivos_ini/conexao.ini");
                    $this->usr = $dados[ 'user' ];
                    $this->password = $dados[ 'password' ];
                    $this->host = $dados[ 'host' ];
                    $this->port = $dados[ 'port' ];
                    $this->bank = $dados[ 'bank' ];
                    $this->tipo = $dados[ 'tipo' ];
                    $tipo = $this->tipo;
                    try
                    {
                        if($tipo != '')
                        {
                            if($tipo == 'pgsql')
                            {
                                try
                                {
                                    $conn = @pg_connect("host=".$this->host." port=".$this->port." dbname=".$this->bank." user=".$this->usr." password=".$this->password."");
                                    if(!$conn)
                                        throw new excecoes(excecoes::ERRO_BANCO);
                                }
                                catch(Exception $e)
                                {
                                    echo $e."<b><i> Linha: ".$e->getLine()."<br />Arquivo: ".$_SERVER[ 'PHP_SELF' ]."</i></b>";
                                }
                            }
                            if($tipo == 'mysql')
                            {
                                try
                                {
                                    $conn = @mysql_connect("'".$this->host.$this->port."'","'".$this->usr."'","'".$this->password."'");
                                    $db = @mysql_select_db("'".$this->bank."'");
                                    if(!$conn or !$db)
                                        throw new excecoes(excecoes::ERRO_BANCO);
                                }
                                catch(Exception $e)
                                {
                                    echo $e."<b><i> Linha: ".$e->getLine()."<br />Arquivo: ".$_SERVER[ 'PHP_SELF' ]."</i></b>";
                                }
                            }
                        }
                        else
                            throw new excecoes(excecoes::ERRO_FILE_VAZIO);
                    }
                    catch(Exception $e)
                    {
                        echo $e."<b><i> Linha: ".$e->getLine()."<br />Arquivo: ".$_SERVER[ 'PHP_SELF' ]."</i></b>";
                    }
                }
                else
                    throw new excecoes(excecoes::ERRO_FILE);
            }
            catch(Exception $e)
            {
                echo $e."<b><i> Linha: ".$e->getLine()."<br />Arquivo: ".$_SERVER[ 'PHP_SELF' ]."</i></b>";
            }
        }
    }
    $a = new conexao();
    $a->conectar();
?>