<?php
    $cliente = new SoapClient("webServices.wsdl");
    try
    {
        $retorno = $cliente->enviarEmail('cleisommais@yahoo.com.br', "vamos ver se presta", "hehehehehehehehehheheh","From: suporte@arquivooff.com.br");
        echo "<br /><br /><b>Função de envio de emails: <br />".$retorno."<br /><br />";
    }
    catch(SoapFault $e)
    {
        echo "<br /><br />Erro:<b>{$e->faultstring}</b><br /><br />";
    }
?>

