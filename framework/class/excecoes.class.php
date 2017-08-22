<?php
/*
    Arquivo excecoes.class.php é o arquivo que seta as escecoes do sistema
    Autor: Cleison Ferreira de Melo.
*/
    include_once "loadClass.class.php";
    $__autoload = new loadClass();
    $__autoload->carregar('minhaExcecao');
    class excecoes extends minhaExcecao
    {
        public $var = "";
        const ERRO_BANCO = 1;
        const ERRO_CONSULTA = 2;
        const ERRO_INCLUSAO = 3;
        const ERRO_EXCLUSAO = 4;
        const ERRO_ALTERACAO = 5;
        const ERRO_SINTAXE = 6;
        const ERRO_ENVIO = 7;
        const ERRO_RECEBIMENTO = 8;
        const ERRO_CUSTOM = 9;
        const ERRO_FILE = 10;
        const ERRO_FILE_VAZIO = 11;
        const ERRO_SQL = 12;
        const ERRO_FILE_ABRIR = 13;
        final function __construct($_erro = self::ERRO_DIVERSOS)
        {
             switch($_erro)
             {
                case self::ERRO_BANCO :
                    throw new minhaExcecao("<b><i>Erro, ao conectar ao banco de dados!</i></b>", 1);
                    break;
                case self::ERRO_CONSULTA :
                    throw new minhaExcecao("<b><i>Erro, ao fazer uma consulta no banco de dados!</i></b>", 2);
                    break;
                case self::ERRO_INCLUSAO :
                    throw new minhaExcecao("<b><i>Erro, ao incluir algo no banco de dados!</i></b>", 3);
                    break;
                case self::ERRO_EXCLUSAO :
                    throw new minhaExcecao("<b><i>Erro, ao excluir algo no banco de dados!</i></b>", 4);
                    break;
                case self::ERRO_ALTERACAO :
                    throw new minhaExcecao("<b><i>Erro, ao alterar algo no banco de dados!</i></b>", 5);
                    break;
                case self::ERRO_SINTAXE :
                    throw new minhaExcecao("<b><i>Erro, de sintaxe no script de comando!</i></b>", 6);
                    break;
                case self::ERRO_ENVIO :
                    throw new minhaExcecao("<b><i>Erro, no envio de email!</i></b>", 7);
                    break;
                case self::ERRO_RECEBIMENTO :
                    throw new minhaExcecao("<b><i>Erro, no recebimento de email!</i></b>", 8);
                    break;
                case self::ERRO_CUSTOM :
                    throw new minhaExcecao("<b><i>Erro, ao buscar arquivos!</i></b>", 9);
                    break;
                case self::ERRO_FILE :
                    throw new minhaExcecao("<b><i>Erro, ao abrir arquivo!</i></b>", 10);
                    break;
                case self::ERRO_FILE_VAZIO :
                    throw new minhaExcecao("<b><i>Erro, arquivo de configuração vazio!</i></b>", 11);
                    break;
                case self::ERRO_SQL :
                    throw new minhaExcecao("<b><i>Erro, entrada sql ivalida ou incorreta!</i></b>", 12);
                    break;
                case self::ERRO_FILE_ABRIR :
                    throw new minhaExcecao("<b><i>Erro, não foi possivel escrever no arquivo!</i></b>", 13);
                    break;
                default:
                    $this->var = $_erro;
                    break;
             }
        }
    }
?>