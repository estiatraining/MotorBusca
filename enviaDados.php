<?php
    include_once $_SERVER[ 'DOCUMENT_ROOT' ]."/framework/controlador.php";
    include_once "application/views/buscaAlteraConteudo.php";
    $sockets = new sockets();
    $sockets->setHost('http://localhost/enviaDados.php');
    $sockets->setPorta('82');
    if($alteracoes != "")
    {
        if ($sockets->Bind() or $sockets->Conecta())
        {
            $sockets->Enviar($alteracoes);
            $sockets->Receber();
        }
        $sockets->Fechar();
    }
?>
