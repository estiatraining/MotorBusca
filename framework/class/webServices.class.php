<?php
    final class webServices
    {
        public function __construct(){ }
        public function enviarEmail($_destino, $_cabecalho, $_mensagem, $_headers)
        {
            if(empty($_destino))
                throw new SoapFault('Client', 'Parâmetro destino não foi preenchido!');
            if(empty($_cabecalho))
                throw new SoapFault('Client', 'Parâmetro titulo não foi preenchido!');
            if(empty($_mensagem))
                throw new SoapFault('Client', 'Parâmetro mensagem não foi preenchido!');
            if(empty($_headers))
                throw new SoapFault('Client', 'Parâmetro headers(cabeçalho) não foi preenchido!');
        }
    }
?>

