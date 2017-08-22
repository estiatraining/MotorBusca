<?php
/*
    Arquivo logs.class.php é o arquivo que cria um arquivo de log do sistema
    Autor: Cleison Ferreira de Melo.
*/
    include_once "loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('excecoes');
    final class logs
    {
        private $diretorio = '';
        public function __construct($_diretorio)
        {
            $this->diretorio = $_diretorio;
        }
        public final function escrever($_mensagem)
        {
            try
            {
                $time = date("d - m - Y H:i:s");
                $texto = "<log>\n";
                $texto .= "<time>".$time."</time>\n";
                $texto .= "<message>".$_mensagem."</message>";
                $texto .= "</log>";
                $arquivar = @fopen($this->diretorio.date("d-m-Y H-i-s").".xml","w+");
                if(!$arquivar)
                    throw new excecoes(excecoes::ERRO_FILE);
                if(!@fwrite($arquivar, $texto))
                    throw new excecoes(excecoes::ERRO_FILE_ABRIR);
                @fclose($arquivar);
            }
            catch(Exception $e)
            {
                echo $e."<b><i> Linha: ".$e->getLine()."<br />Arquivo: ".$_SERVER[ 'PHP_SELF' ]."</i></b><br />";
            }
        }
    }
?>