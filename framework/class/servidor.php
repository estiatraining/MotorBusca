<?php
    function enviarEmail($_destino, $_cabecalho, $_mensagem, $_headers)
    {
        if(empty($_destino))
            throw new SoapFault('Client', 'Parâmetro destino não foi preenchido!');
        if(empty($_cabecalho))
            throw new SoapFault('Client', 'Parâmetro título não foi preenchido!');
        if(empty($_mensagem))
            throw new SoapFault('Client', 'Parâmetro mensagem não foi preenchido!');
        if(empty($_headers))
            throw new SoapFault('Client', 'Parâmetro headers(cabeçalho) não foi preenchido!');
        $resultado = "mail($_destino, $_cabecalho, $_mensagem, $_headers);";
        return $resultado;
    }
    $server = new SoapServer("webServices.wsdl", array('encoding'=>'ISO-8859-1'));
    $server->addFunction("enviarEmail");
    $server->handle();
?>

