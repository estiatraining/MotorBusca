<?php
/*
    Arquivo index.php é o arquivo pai de todos, é nele que deve estar incluido o arquivo controlador.php que é do framework
    Autor: Cleison Ferreira de Melo.
*/
    include_once $_SERVER[ 'DOCUMENT_ROOT' ]."/framework/controlador.php";
    $__autoload->carregar('retiraConteudo');
    $funcoes = new funcoes();
    $tratarDados = new retiraConteudo();
    @$file = $_REQUEST[ 'endereco' ];
    if(isset($file))
    {
        $resultado = @$funcoes->busca($file, $file);
        if($resultado)
        {
            $tratarDados->setCampos("pag_link, pag_conteudo, pag_data, pag_hora");
            $tratarDados->setLink($file);
            $tratarDados->setConteudo($resultado);
            $tratarDados->setCondicoes(" WHERE pag_link = '".$file."' ");
            if($tratarDados->inserirDados())
            {
        ?>
                <script>alert("Dados inseridos com sucesso!");</script>
        <?php
            }
            else
            {
        ?>
                <script>alert("Este link já esta cadastrado!");</script>
        <?php
            }
        }
        else
        {
    ?>
            <script>alert("Não foi encontrado nada para a URL: <?php echo $file; ?>!");</script> 
    <?php
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Testes de scripts!!</title>
    <link rel="stylesheet" type="text/css" href="../../styles_css/index.css" media="screen" />
    <script type="text/javascript" src="../../script_js/index.js"></script>
</head>
<body onload="document.frmCadastro.endereco.focus();">
    <form name="frmCadastro" method="post" action="#">
        <div id="topoCadastro">

        </div>
        <div id="corpoCadastro">
            <h4>
                  Cadastro de Sites:
            </h4>
            <label>Digite o endereço sem a barra no final.<span>Ex:http://g1.com</span>
                <?php
                    $tags = new tags();
                    echo $tags->getInput("endereco", "text", "", "autocomplete='off'");
                ?>
            </label>
            <label>
                <?php
                    $tags = new tags();
                    echo $tags->getInput("enviar","button","GRAVAR", "onclick='validar();' id='gravar'");
                ?>
            </label>
        </div>
        <div id="footerCadastro">

        </div>
    </form>
</body>
</html>
