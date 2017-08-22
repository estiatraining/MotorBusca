<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                                           //
// Arquivo tags.class.php é o arquivo que contem os objetos de criaçao de tags html que sao mostrados no sistema                                     //
//                                                                                                                                                   //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    include_once "loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('conexao');
    //classe tags
    class tags
    {
        public $classe = '';//atributo que recebe a classe que é setado nos metodos getSelect(),getinput() e gettextarea()
        public $resultado = '';//atributo que recebe o resultado da busta no metodo getSelect()
        public $tag = ''; //atributo tag que recebe e retorna a tag a ser impressa na tela
        public $selecao = ''; //atributo selecao seta qual opcao do metodo getSelect() foi selecionado
        public $i = 0; //atributo de uso generico
        private static $conexao = '';
        private static $tipo = '';
        //metodo de construcao
        public final function __construct()
        {
            if(empty(self::$conexao))
            {
                self::$conexao = new conexao();
                self::$conexao->conectar();
                self::$tipo = self::$conexao->tipo;
            }
        }
        //metodo de destruicao
        public function __destruct(){}
        //@return metodo que retorna uma combobox usando uma busca no banco de dados ou nao.
        //@param $_tipo e o tipo de sgbd pode ser postgre ou mysql
        //@param $_conexao e a conexao que foi feita com o banco de dados
        //@param $_sql e a sql que trara resultados
        //@param $_name e o nome da tag
        //@param $_value e o valor da tag
        //@param $_class e o valor da class
        //@param $_events sao os eventos ou folhas de estilo da tag
        //@param $_required campo requirido ou nao
        //@param $_option Array contendo options além dos da SQL
        public final function getSelect($_conexao,$_sql,$_name,$_value,$_events = '',$_class = '',$_required = 'false',$_option = array())
        {
            if ( $_sql <> null )
            {
                if(self::$tipo)
        	        $this->resultado = pg_query($_sql );
                else if(self::$tipo)
                    $this->resultado = mysql_query($_sql,$_conexao);
            }
            else
            {
        	    $this->resultado = 0;
            }
            $this->tag = "<select name='$_name' class='$_class' required='$_required' $_events >";
            $this->tag = $this->tag . "<option value=''>--- ESCOLHA UM ITEM ---</option>";
            for ( $this->i = 0; $this->i < sizeof( $options ); $this->i++ )
            {
                if ( $_options[ $this->i ][ 'identificador' ] == $_value )
                {
                    $this->selecao = 'selected';
                }
                else
                {
                    $this->selecao = '';
                }
                $this->tag = $this->tag . "<option $this->selecao value='".$_options[ $this->i ][ 'identificador' ]."'>".$_options[ $this->i ][ 'descritivo' ]."</option>";
            }
            if(self::$tipo)
            {
                if(pg_num_rows($this->resultado) != 0)
                {
                    while($this->vetor = pg_fetch_array($this->resultado))
                    {
                        if ( $this->vetor[ 'identificador' ] == $_value )
                        {
                            $seleciona = 'selected';
                        }
                        else
                        {
                            $seleciona = '';
                        }
                        $this->tag = $this->tag . "<option $seleciona value='".$this->vetor[ 'identificador' ]."'>".$this->vetor[ 'descritivo' ]."</option>";
                    }
                }
            }
            else if(self::$tipo)
            {
                while($this->vetor = mysql_fetch_array($this->resultado))
                {
                    if ( $this->vetor[ 'identificador' ] == $_value )
                    {
                        $seleciona = 'selected';
                    }
                    else
                    {
                        $seleciona = '';
                    }
                    $this->tag = $this->tag . "<option $seleciona value='".$this->vetor[ 'identificador' ]."'>".$this->vetor[ 'descritivo' ]."</option>";
                }
            }
            $this->tag = $this->tag . "</select>";
            return $this->tag;
        }
        //@return metodo que retorna uma tag do tipo imput pra receber dados
        //@param $_name nome do input
        //@param $_type tipo do imput pode ser: text,submit,radio,checkbox e etc...
        //@param $_size tamanho do input
        //@param $_value valor do input
        //@param $_required se o campo é requirido ou nao
        //@param $_events eventos e stilos da tag
        //@param $_class e o valor da class
        //@param $_quantidade maxima de caracteres no input
        public final function getInput( $_name, $_type, $_value, $_events = '' ,$_class = '',$_size = '', $_required = 'false', $_maxlength = '')
        {
            return "<input type='$_type' name='$_name' value='$_value' class='$_class' size='$_size' maxlength='$_maxlength'  required='$_required' $_events />";
        }
        //@return metodo que retorna uma tag do tipo textarea pra receber dados
        //@param $_name nome do input
        //@param $_rows quantidade linhas do textarea
        //@param $_cols quantidade de colunas do textarea
        //@param $_value valor do input
        //@param $_class e o valor da class
        //@param $_required se o campo é requirido ou nao
        //@param $_events eventos e stilos da tag
        //@param $_quantidade maxima de caracteres no input
        public final function getTextarea($_name,$_value,$_rows,$_cols,$_events = '',$_required = 'false',$_maxlength = '')
        {
            return "<textarea name='$_name' rows='$_rows' class='$_class' cols='$_cols' required='$_required' $_events maxlength='$_maxlength' >$_value</textarea>";
        }
    }
?>