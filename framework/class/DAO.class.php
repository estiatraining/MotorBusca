<?php
/*
    Arquivo DAO.class.php é o arquivo que interage entre a camada de persistencia e camada de controle dos dados
    Autor: Cleison Ferreira de Melo.
*/
    include_once "loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('transacao,conexao,logs,sessoes');
    final class DAO
    {
        private $sql = "";
        private static $conexao = '';
        private static $tipo = '';
        private $busca = '';
        private $logs = '';
        public final function __construct()
        {
            if(empty(self::$conexao))
            {
                self::$conexao = new conexao();
                self::$conexao->conectar();
                self::$tipo = self::$conexao->tipo;
            }
        }
        //metodo que limpa a sql apos ser commitada
        private final function limpaSql()
        {
            $this->sql = '';
        }
        //metodo que carrega as sql´s de insert
        //@param $_tabela e o nome da tabela que vai receber a insercao
        //@param $_campos e o nome dos campos que vai receber a insercao
        //@param $_valores e o nome dos valores dos campos
        public final function setInsert($_tabela, $_campos, $_valores)
        {
            $this->sql .= " INSERT INTO ".$_tabela." ( ".$_campos." ) VALUES ( ".$_valores." ); ";
        }
        //metodo que carrega as sql´s de update
        //@param $_tabela e o nome da tabela que vai receber a atualizacao
        //@param $_alteracoes e o nome dos campos com as alteracaoes que vai receber a atualizacao
        //@param $_condicoes e o nome das condicoes
        public final function setUpdate($_tabela,$_alteracoes,$_condicoes)
        {
            $this->sql .= " UPDATE ".$_tabela." SET ".$_alteracoes." ".$_condicoes."; ";
        }
        //metodo que carrega as sql´s de delete
        //@param $_tabela e o nome da tabela que vai ser apagado o dado
        //@param $_condicoes e o nome das condicoes para exclusao
		public final function setDelete($_tabela,$_condicoes)
        {
            $this->sql .= " DELETE FROM ".$_tabela." ".$_condicoes."; ";
        }
        //metodo que carrega as sql´s de select
        //@param $_tabela e o nome da tabela que vai receber a
        //@param $_campos e o nome dos campos que vai receber a insercao
        //@param $_condicoes e o nome das condicoes
        public final function setSelect($_tabela,$_campos,$_condicoes)
        {
            $this->sql .= " SELECT ".$_campos." FROM ".$_tabela." ".$_condicoes."; ";
            $this->busca = 'sim';
        }
        //metodo que executa os metodos da classe DAO
        public final function execute()
        {
            $sessoes = new sessoes();
            $sessoes->startSessao();
            $diretorios = $sessoes->getSessao('diretorios');
            $this->logs = new logs($_SERVER[ 'DOCUMENT_ROOT' ]."/framework/logs_erro/");
            if(!empty($this->sql))
            {
                if(!empty($this->busca))
                {
                    try
                    {
                        if(self::$tipo == 'pgsql')
                        {
                            if(!@pg_query($this->sql))
                                throw new excecoes(excecoes::ERRO_CONSULTA);
                            else
                                return @pg_query($this->sql);
                        }
                        if(self::$tipo == 'mysql')
                        {
                            if(!@mysql_query($this->sql))
                                throw new excecoes(excecoes::ERRO_CONSULTA);
                            else
                                return @mysql_query($this->sql);
                        }
                    }
                    catch(Exception $e)
                    {
                        echo $e."<b><i> Linha: ".$e->getLine()."<br />Arquivo: ".$_SERVER[ 'PHP_SELF' ]."</i></b><br />";
                        $mensagem = $this->sql."\n";
                        $mensagem .= $e."<b><i> Linha: ".$e->getLine()."<br />Arquivo: ".$_SERVER[ 'PHP_SELF' ]."</i></b><br />";
                        $this->logs->escrever($mensagem);
                    }
                    self::limpaSql();
                }
                else
                {
                    try
                    {
                        $exec = new transacao();
                        $exec->startTransacao();
                        if(self::$tipo == 'pgsql')
                        {
                            if(@pg_query($this->sql))
                            {
                                return $exec->getCommitTransacao();
                            }
                            else
                            {
                                $exec->getRollbackTransacao();
                                throw new excecoes(excecoes::ERRO_SQL);
                            }
                        }
                        if(self::$tipo == 'mysql')
                        {
                            if(@mysql_query($this->sql))
                            {
                                return $exec->getCommitTransacao();
                            }
                            else
                            {
                                $exec->getRollbackTransacao();
                                throw new excecoes(excecoes::ERRO_SQL);
                            }
                        }
                    }
                    catch(Exception $e)
                    {
                        echo $e."<b><i> Linha: ".$e->getLine()."<br />Arquivo: ".$_SERVER[ 'PHP_SELF' ]."</i></b><br />";
                        $mensagem = $this->sql."\n";
                        $mensagem .= $e."<b><i> Linha: ".$e->getLine()."<br />Arquivo: ".$_SERVER[ 'PHP_SELF' ]."</i></b><br />";
                        $this->logs->escrever($mensagem);
                    }
                    self::limpaSql();
                }
            }
        }
    }
?>