<?php
/*
    Arquivo buscaAlteraConteudo.php é o arquivo que vai vai ser acionado via sockets para buscar os sites cadastrados
    comparalos com os conteudos atuais com os que estao salvos no site, caso tenha algum alterado ele retorna um bip, e tambem altera o conteudo
    pelo novo.
    Autor: Cleison Ferreira de Melo.
*/
    include_once $_SERVER[ 'DOCUMENT_ROOT' ]."/framework/controlador.php";
    $__autoload->carregar('retiraConteudo');
    $funcoes = new funcoes();
    $funcoesDados = new funcoesDados();
    $tratarDados = new retiraConteudo();
    $tratarDados->setCampos("*");
    $tratarDados->setCondicoes(" ORDER BY pag_link, pag_data, pag_hora");
    $consulta = $tratarDados->pesquisarDados();
    $sites = "";
    $alteracoes = "";
    if($funcoesDados->getLinhas($consulta))
    {
        while($resultados = $funcoesDados->getResultados($consulta))
        {
            $conteudo = $funcoes->busca($resultados[ 'pag_link' ], $resultados[ 'pag_link' ]);
            if($conteudo != $resultados[ 'pag_conteudo' ])
            {
                $tratarDados->setAlteracoes(" pag_conteudo = '".$resultados[ 'pag_conteudo' ]."',pag_data = now(),pag_hora = now() ");
                $tratarDados->setCondicoes(" WHERE pag_id = ".$resultados[ 'pag_id' ]);
                $tratarDados->alterarDados();
                $alteracoes .= $resultados[ 'pag_link' ]."; ";
            }
        }
    }
?>