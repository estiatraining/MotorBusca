<?php
/*
    Arquivo carregar.class.php é o arquivo que carrega as classes do sistema
    Autor: Cleison Ferreira de Melo.
*/
    final class loadClass
    {
        private $classes = '';
        private $temp = '';
        private $pastas = '';
        private $pasta = '';
        public function __construct(){}
        public final function carregar($_vetor)
        {
            $this->classes = explode(',',$_vetor);
            $this->temp = $_SERVER[ 'DOCUMENT_ROOT' ]."/";
    		$this->pastas = array('application/models','application/controllers','application/views','framework/class');
            for($i = 0; $i < sizeof($this->classes); $i++)
            {
                foreach($this->pastas as $this->pasta)
                {
        		    if(file_exists($this->temp."{$this->pasta}/{$this->classes[$i]}.class.php"))
                    {
        		        include_once $this->temp."{$this->pasta}/{$this->classes[$i]}.class.php";
                    }
                }
            }
        }
    }
?>
