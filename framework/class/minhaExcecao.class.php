<?php
/*
    Arquivo minhaExecao.class.php é o arquivo que instancia a classe Exception e a usa para gerar erros de excecoes!
    Autor: Cleison Ferreira de Melo.
*/
    class minhaExcecao extends Exception
    {
        /* Redefine a exceção para que a mensagem não seja opcional */
        public function __construct($message, $code = 0)
        {
            parent::__construct($message, $code);
        }
        /* Representação do objeto personalizada no formato string */
        public function __toString()
        {
            return "{$this->message}\n";
        }
    }
?>
