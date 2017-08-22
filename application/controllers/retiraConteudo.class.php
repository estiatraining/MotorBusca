<?php
/*
    Arquivo retiraConteudo.class.php é o arquivo que vai fazer a busca de todo conteudo de um site
    Autor: Cleison Ferreira de Melo.
*/
    include_once $_SERVER[ 'DOCUMENT_ROOT' ]."/framework/controlador.php";
    //carregando a classe retiraConteudoDados.class.php
    $__autoload = new loadClass();
    $__autoload->carregar('retiraConteudoDados');
    final class retiraConteudo
    {
        private $link; //@attribute $link é o link que foi acessado
        private $Conteudos; //@attribute $conteudos sao os links da pagina acessada
        private $alteracoes; //@attribute $alteracoes sao as alteracoes para alteracao na tabela
        private $condicoes; //@attribute $condicoes sao as condicoes para uma busca, alteracao na tabela
        private $Campos;
        //metodo construtor
        public function __construct(){}
        //metodo setCampos() seta os Campos da pagina
        //@param $_Campos é o Campos da pagina
        public final function setCampos($_Campos)
        {
            $this->Campos = $_Campos;
        }
        //metodo getCampos() retorna o Campos setado
        public final function getCampos()
        {
            return $this->Campos;
        }
        //metodo setLink() seta o link da pagina
        //@param $_link é o link da pagina
        public final function setLink($_link)
        {
            $this->link = $_link;
        }
        //metodo getLink() retorna o link setado
        public final function getLink()
        {
            return $this->link;
        }
        //metodo setConteudo() seta o conteudo(links) da pagina
        //@param $_conteudo é o conteudo  da pagina
        public final function setConteudo($_Conteudo)
        {
            $this->Conteudos = $_Conteudo;
        }
        //metodo getConteudo() retorna o conteudo setado
        public final function getConteudo()
        {
            return $this->Conteudos;
        }
        //metodo setcondicoes() seta as condicoes para as alteraçoes no banco
        //@param $_condicoes sao as condicoes
        public final function setCondicoes($_condicoes)
        {
            $this->condicoes = $_condicoes;
        }
        //metodo getcondicoes() retorna as condicoes que foram setadas
        public final function getCondicoes()
        {
            return $this->condicoes;
        }
        //metodo setalteracoes() seta as alteracoes que vao ser feitas no banco
        //@param $_alteracoes sao as alteracoes
        public final function setAlteracoes($_alteracoes)
        {
            $this->alteracoes = $_alteracoes;
        }
        //metodo getalteracoes() retorna as alteracoes que foram setadas
        public final function getAlteracoes()
        {
            return $this->alteracoes;
        }
        //metodo inserirDados() trata os dados e  instancia a classe retiraConteudoDados para que possa  persistir os dados
        public final function inserirDados()
        {
            $retiraConteudoDados = new retiraConteudoDados();
            $funcoesDados = new funcoesDados();
            $retiraConteudoDados->setCampos($this->Campos);
            $retiraConteudoDados->setValores("'".$this->link."', '".$this->Conteudos."', now(), now()");
            if($funcoesDados->getLinhas(self::pesquisarDados()) == 0)
            {
                return $retiraConteudoDados->insert();
            }
        }
        //metodo que pesquisa os dados no banco
        public final function pesquisarDados()
        {
            $retiraConteudoDados = new retiraConteudoDados();
            $retiraConteudoDados->setCampos($this->Campos);
            $retiraConteudoDados->setCondicoes($this->condicoes);
            return $retiraConteudoDados->select();
        }
        //metodo que deleta os dados no banco
        public final function deletarDados()
        {
            $retiraConteudoDados = new retiraConteudoDados();
            $retiraConteudoDados->setAlteracoes($this->alteracoes);
            $retiraConteudoDados->setCondicoes($this->condicoes);
            return $retiraConteudoDados->delete();
        }
        //metodo que altera os dados no banco
        public final function alterarDados()
        {
            $retiraConteudoDados = new retiraConteudoDados();
            $retiraConteudoDados->setCondicoes($this->condicoes);
            $retiraConteudoDados->setAlteracoes($this->alteracoes);
            return $retiraConteudoDados->update();
        }
    }
?>
