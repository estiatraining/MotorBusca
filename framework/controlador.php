<?php
/*
    Arquivo controlador.php
    contém os arquivos do framework já incluidos, não é necessario chamar todos no index.php basta apenas chamar esse arquivo.
    Autor: Cleison Ferreira de Melo.
*/
?>
<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set("display_errors","on");
    ini_set('max_execution_time','180');
    include_once "class/loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('conexao,tags,funcoes,cookies,DAO,diretorios,excecoes,funcoesDados,logs,minhaExcecao,sessoes,transacao,webServices,sockets');
    @$diretorios = new diretorios();
?>