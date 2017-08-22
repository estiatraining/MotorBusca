<?php
/*
    Arquivo cookies.class.php é o arquivo que inseri cookies
    Autor: Cleison Ferreira de Melo.
*/
    final class sockets
    {
        private $socket = "";
        private $host = "";
        private $port = "";
        public final function setPorta($_porta)
        {
            $this->port = $_porta;
        }
        public final function getPorta()
        {
            return $_porta ;
        }
        public final function setHost($_host)
        {
            $this->host = $_host;
        }
        public final function getHost()
        {
            return $_host;
        }
        public final function __construct()
        {
            $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        }
        public final function Conecta()
        {
            return socket_connect($this->socket, $this->host, $this->port);
        }
        public final function Bind()
        {
            return socket_bind($this->socket, "'".$this->host."'", $this->port);
        }
        public final function Enviar($_string)
        {
            return socket_sendto($this->socket, "'".$_string."'", strlen($_string), 0x100, "'".$this->host."'", $this->port);
        }
        public final function Fechar()
        {
            socket_close($this->socket);
        }
        public final function Receber()
        {
            return socket_read(self::Aceitar(), 1024);
        }
        public final function Aceitar()
        {
            return socket_accept($this->socket);
        }
    }
?>
