/*
    Arquivo index.js é o arquivo que contem os codigos javascript usados no sistema
    Autor: Cleison Ferreira de Melo
*/
var aguardando = false;
function Sugestoes(caminho)
{
    var palavras = document.getElementById('palavras');
    if(palavras.value.length > 0)
    {
        if(!aguardando)
        {
            var url = caminho+"?palavras="+encodeURIComponent(palavras.value);
            requisicaoHTTP("GET", url, true);
        }
    }
    else
        limparSugestoes();
}
function MostrarSugestoes(dados)
{
    limparSugestoes();
    var linha, celula, texto;
    var ul = document.getElementById('ul');
    var num = dados.getElementsByTagName("nome").length;
    if(num > 0)
    {
        ul.style.visibility = 'visible';
        for(var i = 0; i < num; i++)
        {
            var li = document.createElement('li');
            var a = document.createElement('a');
            a.setAttribute('href','javascript: PreencherCaixa(this);');
            a.setAttribute('onclick','PreencherCaixa(this);');
            ul.appendChild(li);
            li.appendChild(a);
            var sugestao = dados.getElementsByTagName("nome")[i].firstChild.data;
            var texto = document.createTextNode(sugestao);
            a.appendChild(texto);
        }
    }
}
function PreencherCaixa(valor)
{
    var caixaTexto = document.getElementById("palavras");
    document.forms[0].palavras.value = valor.firstChild.nodeValue;
    limparSugestoes();
}
function limparSugestoes()
{
    var ul = document.getElementById('ul');
    while(ul.hasChildNodes())
    {
        ul.removeChild(ul.childNodes[0]);
    }
    ul.style.visibility = 'hidden';
}
function trataDados()
{
    var resposta = ajax.responseXML;
    MostrarSugestoes(resposta);
}