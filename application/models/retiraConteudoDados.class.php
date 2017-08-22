<?php
/*
    Arquivo retiraConteudoDados.class.php � o arquivo que vai persistir os dados no banco
    Autor: Cleison Ferreira de Melo.
*/
    include_once $_SERVER[ 'DOCUMENT_ROOT' ]."/framework/controlador.php";
    final class retiraConteudoDados
    {
        private $campos; //@attribute $campos sao os campos da tabela que vao sofrer a a�ao
        private $valores; //@attribute $valores sao os valores que serao inseridos
        private $condicoes; //@attribute $condicoes sao as condicoes para busca, altera�ao e exclusao
        private $Alteracoes; //@attribute $alteracoes sao os valores que serao alterados
        //metodo construtor
        public final function __construct(){ }
        //metodo setcampos() seta os campos  da tabela
        //@param $_campos � o valor que � recebido
        public final function setCampos($_campos)
        {
            $this->campos = $_campos;
        }
        //metodo getCampos() retorna os campos da tabela
        public final function getCampos()
        {
            return $this->campos;
        }
        //metodo setValores() seta os valores dos campos
        //@param $_valores � o valor que � recebido
        public final function setValores($_valores)
        {
            $this->valores = $_valores;
        }
        //metodo getValores() retorna os valores dos campos
        public final function getValores()
        {
            return $this->valores;
        }
        //metodo setCondicoes() seta as condicoes  da tabela
        //@param $_condicoes � as condicoes
        public final function setCondicoes($_condicoes)
        {
            $this->condicoes = $_condicoes;
        }
        //metodo getCondicoes() retorna as condicoes da busca
        public final function getCondicoes()
        {
            return $this->condicoes;
        }
        //metodo setAlteracoes() seta as Alteracoes  da tabela
        //@param $_Alteracoes � as Alteracoes
        public final function setAlteracoes($_Alteracoes)
        {
            $this->Alteracoes = $_Alteracoes;
        }
        //metodo getAlteracoes() retorna as Alteracoes da busca
        public final function getAlteracoes()
        {
            return $this->Alteracoes;
        }
        //metodo inserirDados() � o metodo que vai chamar a classe DAO e esta vai persistir os dados no banco de dados
        public final function insert()
        {
            $DAO = new DAO();
            $DAO->setInsert("paginas", $this->campos, $this->valores);
            return $DAO->execute();
        }
        //metodo select() faz buscas na tabela
        public final function select()
        {
            $DAO = new DAO();
            $DAO->setSelect("paginas", $this->campos, $this->condicoes);
            return $DAO->execute();
        }
        //metodo update() faz uma alte�ao na tabela
        public final function update()
        {
            $DAO = new DAO();
            $DAO->setUpdate("paginas", $this->Alteracoes, $this->condicoes);
            return $DAO->execute();
        }
        //metodo delete() faz uma exclusao na tabela
        public final function delete()
        {
            $DAO = new DAO();
            $DAO->setDelete("paginas", $this->condicoes);
            return $DAO->execute();
        }
    }
?>