<?php
/*
    Arquivo diretorios.class.php é o arquivo que seta os diretorios do sistema
    Autor: Cleison Ferreira de Melo.
*/
    include_once "loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('excecoes,sessoes');
    class diretorios
    {
        public $server = "";
        public $framework = "";
        public $arquivos_ini = "";
        public $classe = "";
        public $css = "";
        public $images = "";
        public $scripts = "";
        public $imagens = "";
        public $script_js = "";
        public $styles_css = "";
        public $application = "";
        public $controllers = "";
        public $models = "";
        public $views = "";
        public $logs_erro = "";
        final function __construct()
        {
            if(file_exists($_SERVER[ 'DOCUMENT_ROOT' ]."/framework/arquivos_ini/diretorios.ini"))
            {
                $dados = parse_ini_file($_SERVER[ 'DOCUMENT_ROOT' ]."/framework/arquivos_ini/diretorios.ini");
                $this->server = $_SERVER[ 'DOCUMENT_ROOT' ];
                $this->framework = $dados[ 'framework' ];
                $this->arquivos_ini = $this->server . $this->framework . $dados[ 'arquivos_ini' ];
                $this->classe = $this->server . $this->framework . $dados[ 'class' ];
                $this->css = $this->server . $this->framework . $dados[ 'css' ];
                $this->images = $this->server . $this->framework . $dados[ 'images' ];
                $this->scripts = $this->server . $this->framework . $dados[ 'scripts' ];
                $this->imagens = $this->server . $dados[ 'imagens' ];
                $this->script_js = $this->server . $dados[ 'script_js' ];
                $this->styles_css = $this->server . $dados[ 'styles_css' ];
                $this->application = $dados[ 'application' ];
                $this->controllers = $this->server . $this->application . $dados[ 'controllers' ];
                $this->models = $this->server . $this->application . $dados[ 'models' ];
                $this->views = $this->server . $this->application . $dados[ 'views' ];
                $this->logs_erro = $this->server . $this->framework . $dados[ 'logs_erro' ];
                $array = array('server' => $this->server, 'arquivos_ini' => $this->arquivos_ini, 'class' => $this->classe, 'css' => $this->css, 'images' => $this->images,
                               'scripts' => $this->scripts, 'imagens' => $this->imagens, 'script_js' => $this->script_js, 'styles_css' => $this->styles_css, 'controllers' => $this->controllers, 'models' => $this->models,
                               'views' => $this->views, 'logs_erro' => $this->logs_erro);
                $sessoes = new sessoes();
                $sessoes->startSessao();
                $sessoes->setSessao("diretorios",$array);
            }
            else
                echo "<b><i>Erro ao buscar arquivo de configuração de diretorios!</i></b>";
        }
        public final function getListar($_diretorio)
        {
            switch($_diretorio)
            {
                case "arquivos_ini":
                    return $this->arquivos_ini;
                    break;
                case "class":
                    return $this->classe;
                    break;
                case "css":
                    return $this->css;
                    break;
                case "images":
                    return $this->images;
                    break;
                case "scripts":
                    return $this->scripts;
                    break;
                case "styles_css":
                    return $this->styles_css;
                    break;
                case "imagens":
                    return $this->imagens;
                    break;
                case "script_js":
                    return $this->script_js;
                    break;
                case "controllers":
                    return $this->controllers;
                    break;
                case "models":
                    return $this->models;
                    break;
                case "views":
                    return $this->views;
                    break;
                case "logs_erro":
                    return $this->logs_erro;
                    break;
            }
        }
    }
?>