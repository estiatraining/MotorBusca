<?php
/*
    Arquivo funcoes.class.php é o arquivo que contem diversos metodos de funcionalidades para o sistema
    Autor: Cleison Ferreira de Melo.
*/
    final class funcoes
    { 
	    public $nome = ''; //atributo nome e o nome do arquivo que vai sofrer upload
        public $tamanho = ''; //atributo tamanho do arquivo do upload
        public $tipo = ''; //atributo tipo de arquivo ex:doc,pdf,jpg e etc...
        public $temp = '';  //atributo temp e o arquivo temporario que é utilizado no momento de upload
        public $destino = ''; //atributo de destino do arquivo
        public $semana = ''; //atributo dos dias da semana
        public $meses = ''; //atributo dos dias do mes
        public $vetor = ''; //atributo de nome vetor de uso generico
        public $hoje = ''; //atributo de nome hoje, recebe a data atual
        public $aniversario = ''; //atributo aniversario e a data de aniversario pra calcular a idade
        public $idade = ''; //atributo idade e o resultado do calculo de idade do metodo setcalculaIdade()
        public $sql = '';//atributo que recebe as proibiçoes de codigo sql para evitar sql-injection
        private $classes = '';//atributo que recebe o array do vetor
        private $pastas = ''; //atributo para o laço de foreach
        private $pasta = ''; //atributo para o laço de foreach
        private $array; //atributo para receber arrays
        private $arrayString; //atributo para receber array de string
        private $igual; //atributo de comparaçao
        private $diferente; //atributo de comparaçao
        private $igual2; //atributo de comparacao
        private $diferente2; //atributo de comparacao
        private $palavra; //atributo que recebe uma palavra
        public $i = 0; //patributo de uso geral
        //metodo de contrucao
        public function __construct(){}
		//metodo de destruicao
		public function __destruct(){}
        //metodo busca() ele faz uma busca recursiva em uma pagina a procura de links de tags <a> e tags <frame>
        //@param $_link é o link da pagina que vai ser rastreada
        //@param $_repetidos é os links que vao ser comparados a procura de repetiçao
        public final function busca($_link, $_repetidos)
        {
            $this->arrayString = file($_link);
            $this->igual = "";
            $this->diferente = "sim";
            $_resultado = "";
            foreach($this->arrayString as $_linhas => $_frase)
            {
                $this->palavra = str_replace("'", "&quot;", strtolower( htmlspecialchars($_frase)));
                if(self::frames($this->palavra, $_link) != "")
                {
                    $this->array = explode(";", $_repetidos);
                    for($i = 0; $i < sizeof($this->array); $i++)
                    {
                        if($this->array[$i] == self::frames($this->palavra, $_link))
                            $this->igual = "sim";
                        else
                            $this->diferente = "sim";
                    }
                    $_repetidos .= self::frames($this->palavra, $_link)."; ";
                    if(($this->diferente == "sim" ) and ($this->igual != "sim"))
                    {
                        if(@file(self::frames($this->palavra, $_link)))
                        {
                            $_resultado .= self::busca(self::frames($this->palavra, $_link), $_repetidos);
                        }
                    }
                }
                else if(self::a($this->palavra, $_link) != "" )
                {
                    $this->vetor = explode(";", $_resultado);
                    $this->igual2 = "";
                    $this->diferente2 = "sim";
                    for($i = 0; $i < sizeof($this->vetor); $i++)
                    {
                        if($this->vetor[$i] == self::a($this->palavra, $_link))
                            $this->igual2 = "sim";
                        else
                            $this->diferente2 = "sim";
                    }
                    if(($this->diferente2 == "sim" ) and ($this->igual2 != "sim"))
                    {
                        $_resultado .= self::a($this->palavra, $_link)."; ";
                    }
                }
            }
            //echo "Busca-->".$_resultado."<br /><br />";
            return $_resultado;
        }
        //metodo frames() trata links que estao em tags <frame>
        //@param $_frase é a frase que vai ser tratada
        //@param $_link é o link(URL) do site
        public final function frames($_frase, $_link)
        {
            $_resultado = "";
            if(preg_match("/&lt;frame /i",$_frase))
            {
                $this->vetor = explode('src=&quot;', $_frase);
                $this->vetor = explode("&quot;", $this->vetor[1]);
                if(!preg_match("/http:/i", $this->vetor[0]))
                    $_resultado = $_link."/".$this->vetor[0];
                else
                    $_resultado = $this->vetor[0];
            }
            else
                $_resultado = "";
            return $_resultado;
        }
        //metodo a() trata de links de tags <a>
        //@param $_frase é a frase que vai ser tratada
        //@param $_link é o link(URL) do site
        public final function a($_frase, $_link)
        {
            $_resultado = "";
            if(preg_match("/&lt;a /i", $_frase))
            {
                $this->vetor = @explode('href=&quot;', $_frase);
                //echo $_frase." - ".$this->vetor[1]."<br /><br />";
                $this->vetor = @explode("&quot;", $this->vetor[1]);
                if(!preg_match("/http:/i", $this->vetor[0]))
                    $_resultado = $_link."/".$this->vetor[0];
                else
                    $_resultado = $this->vetor[0];
            }
            else
                $_resultado = "";
            return $_resultado;
        }
        //@return metodo para fazer upload de arquivos
        //@param $_arquivo deve ser o valor $_FILE[ 'arquivo' ]
        //@param $_caminho e o lugar onde ficara o arquivo depois do upload
        public final function setArquivar($_arquivo,$_caminho)
        {
		    $this->nome = $_arquivo[ 'name' ];
            $this->tamanho = $_arquivo[ 'size' ];
            $this->tipo = $_arquivo[ 'type' ];
            $this->temp = $_arquivo[ 'tmp_name' ];
            $this->destino = $_caminho.$this->nome;
            if($this->tamanho <= 6000000)
            {
                 if(move_uploaded_file($this->temp, $this->destino))
                 {
                     return "sim";
                 }
                 else
                     return "nao";
            }
        }
        //@return metodo que retorna a data do dia do mes e ano formatada para faciu compreençao do usuario
        public final function setDataFormatada()
        {
            $this->semana = array( "Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado"  );
            $this->meses  = array( "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho","Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" );
            return $this->semana[ date( 'w' ) ].", ".date('d')." de ".$this->meses[ intval( date( 'm' ) ) - 1 ]." de ".date( 'Y' ).".";
        }
        //@return metodo que retorna a data atual no formato dd/mm/aaaa
        public final function setData()
        {
		    return date("d/m/Y");
        }
        //@return metodo que retorna a hora atual no formato hh:mm:ss
        public final function setHora()
        {
		    return date('H:m:s');
        }
        //@return metodo que formata o formato dd/mm/aaaa para o formato do banco de dados aaaa-mm-dd
        //@param $_data é a data que vai ser formatada
        public final function setFormatDataBanco($_data)
        {
            $this->vetor = split("/", $_data);
            return ($this->vetor[2].'-'.$this->vetor[1].'-'.$this->vetor[0]);
        }
        //@return metodo que formata o formato aaaa-mm-dd do banco de dados para o formato de sistema dd/mm/aaaa
        //@param $_data é a data que vai ser formatada
        public final function setFormatDataSistema($_data)
        {
            if($_data == NULL)
                return "00/00/0000";
            else
            {
                $this->vetor = split("-", $_data);
                return ($this->vetor[2].'/'.$this->vetor[1].'/'.$this->vetor[0]);
            }
        }
        //@return metodo que calcula a idade de uma pessoa
        //@param $_data é a data de nascimento da pessoa ex: dd/mm/aaaa
        public final function setCalculaIdade($_data)
        {
            $this->hoje = explode("/",$this->data());
            $this->aniversario = explode("/",dataBanco($_data));
            $this->idade = $this->hoje[2] - $this->aniversario[2];
            if($this->aniversario[1] > $this->hoje[1])
            {
                $this->idade--;
            }
            else if(($this->aniversario[1] == $this->hoje[1]) && ($this->aniversario[0] > $this->hoje[0]))
            {
                $this->idade--;
            }
            return $this->idade;
        }
        //@return metodo pra imprimir no browser uma mensagem de recepçao se baseando nos peridos do dia
        public final function setSaldacao()
        {
            if( date('H') < 12 and date('H') >= 7 )
            {
                return $this->nome = "Bom Dia";
            }
            else if( date('H') >= 12 and date('H') < 18)
            {
                return $this->nome = "Boa Tarde";
            }
            else
            {
                return $this->nome = "Boa Noite";
            }
        }
        //@return metodo que transforma uma string em seus caracteres maiusculos
        //@param $_string que vai sofrer a açao
        public final function setMaiusculo($_string)
        {
            return strtoupper($_string);
        }
        //@return metodo que transforma uma string em seus caracteres minusculos
        //@param $_string que vai sofrer a açao
        public final function setMinusculo($_string)
        {
            return strtolower($_string);
        }
        //@return metodo que previne a sql-injection
        //@param $_string é a string que vai ser tratada
        protected final function setAntiInjection($_string)
        {
            $this->sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|%|\\\\)/"),"",$_string);
            return trim(strip_tags(addslashes($_string)));
        }
    }
?>

