<?php
/*
    Arquivo dataGrid.class.php é o arquivo que seta os valores e cria uma datagrid e imprime no sistema
    Autor: Cleison Ferreira de Melo.
*/
    include_once "DAO.class.php";
    include_once "conexao.class.php";
    include_once "funcoesDados.class.php";
    include_once "loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('conexao, DAO, funcoesDados');
    final class dataGrid
    {
        private $sql = '';
        private $qtdLinhas = 10;
        private $qtdColunas = 5;
        private $nomesColunas = '';
        private $inicio = '';
        private $fim = '';
        private $pagina = '';
        private $vetor = '';
        private $vetorNome = '';
        private $selecionados = '';
        private $quantidade = '';
        private $deletar = '';
        private $alterar = '';
        private $incluir = '';
        private $tabela = '';
        private $campos = '';
        private $condicoes = '';
        public function __construct() { }
        /* Metodos Sets*/
        public function setCampos($_campos)
        {
            $this->campos = $_campos;
        }
        public function setCondicoes($_condicoes)
        {
            $this->condicoes = $_condicoes;
        }
        public function setTabela($_tabela)
        {
            $this->tabela = $_tabela;
        }
        public function setSql($_sql )
        {
            $this->sql = $_sql ;
        }
        public function setAlterar($_alterar )
        {
            $this->alterar = $_alterar ;
        }
        public function setDeletar($_deletar )
        {
            $this->deletar = $_deletar ;
        }
        public function setFim($_fim )
        {
            $this->fim = $_fim ;
        }
        public function setIncluir($_incluir )
        {
            $this->incluir = $_incluir ;
        }
        public function setInicio($_inicio )
        {
            $this->inicio = $_inicio ;
        }
        public function setNomesColunas($_nomesColunas )
        {
            $this->nomesColunas = $_nomesColunas ;
        }
        public function setPagina($_pagina )
        {
            $this->pagina = $_pagina ;
        }
        public function setQtdColunas($_qtdColunas )
        {
            $this->qtdColunas = $_qtdColunas ;
        }
        public function setQtdLinhas($_qtdLinhas )
        {
            $this->qtdLinhas = $_qtdLinhas ;
        }
        public function setQuantidade($_quantidade )
        {
            $this->quantidade = $_quantidade ;
        }
        public function setSelecionados($_selecionados )
        {
            $this->selecionados = $_selecionados ;
        }
        public function setVetor($_vetor )
        {
            $this->vetor = $_vetor ;
        }
        public function setVetorNome($_vetorNome )
        {
            $this->vetorNome = $_vetorNome ;
        }
        /* Metodos Gets*/
        public function getSql()
        {
            $this->sql;
        }
        public function getAlterar()
        {
            $this->alterar;
        }
        public function getDeletar()
        {
            $this->deletar;
        }
        public function getFim()
        {
            $this->fim;
        }
        public function getIncluir()
        {
            $this->incluir;
        }
        public function getInicio()
        {
            $this->inicio;
        }
        public function getNomesColunas()
        {
            $this->nomesColunas;
        }
        public function getPagina()
        {
            $this->pagina;
        }
        public function getQtdColunas()
        {
            $this->qtdColunas;
        }
        public function getQtdLinhas()
        {
            $this->qtdLinhas;
        }
        public function getQuantidade( )
        {
            $this->quantidade;
        }
        public function getSelecionados()
        {
            $this->selecionados ;
        }
        public function getVetor()
        {
            $this->vetor;
        }
        public function getVetorNome( )
        {
            $this->vetorNome;
        }
        public final function criarGrid()
        {
            $funcoesDados = new funcoesDados();
            $DAO = new DAO();
            $DAO->setSelect($this->tabela, $this->campos, $this->condicoes);
            $this->sql = $DAO->execute();
            $DAO->limpaSql();
            $consulta = $this->sql;
            $qtdLinhasConsulta = $funcoesDados->getLinhas($consulta);
            if($qtdLinhasConsulta <= $this->qtdLinhas)
                $totalPag = 1;
            if($qtdLinhasConsulta % $this->qtdLinhas == 0)
                $totalPag = ceil($qtdLinhasConsulta / $this->qtdLinhas);
            else
                $totalPag =  ceil($qtdLinhasConsulta / $this->qtdLinhas);
            $funcoesDados->getLibera($consulta);
            if(!empty($this->pagina))
            {
                $this->inicio = 0;
                $this->pagina = 1;
            }
            else
                $this->inicio = ($this->pagina - 1) * $this->qtdLinhas;
            $DAO->setSelect($this->tabela, $this->campos, $this->condicoes);
            $this->sql = $DAO->execute();
            $DAO->limpaSql();
            $resultado = $this->sql;
        }
    }
?>