<?php
    final class webServices
    {
        public function __construct(){ }
        public function enviarEmail($_destino, $_cabecalho, $_mensagem, $_headers)
        {
            if(empty($_destino))
                throw new SoapFault('Client', 'Par�metro destino n�o foi preenchido!');
            if(empty($_cabecalho))
                throw new SoapFault('Client', 'Par�metro titulo n�o foi preenchido!');
            if(empty($_mensagem))
                throw new SoapFault('Client', 'Par�metro mensagem n�o foi preenchido!');
            if(empty($_headers))
                throw new SoapFault('Client', 'Par�metro headers(cabe�alho) n�o foi preenchido!');
        }
    }
?>

