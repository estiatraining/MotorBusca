/*
    Arquivo index.js é o arquivo que contem os codigos javascript usados no sistema
    Autor: Cleison Ferreira de Melo
*/
var ajax;
var dadosUsuario = '';
var idTimeOut;
function requisicaoHTTP(tipo, url, assinc)
{
    if(window.XMLHttpRequest)
    {
        ajax = new XMLHttpRequest();
    }
    else if(window.ActiveXObject)
    {
		var aVersoes = ["MSXML2.XMLHttp.6.0", "MSXML2.XMLHttp.5.0","MSXML2.XMLHttp.4.0", "MSXML2.XMLHttp.3.0","MSXML2.XMLHttp", "Microsoft.XMLHttp"];
		for (var i = 0; i < aVersoes.length; i++)
        {
			try
            {
				ajax = new ActiveXObject(aVersoes[i]);
			}
            catch (e) {}
		}
    }
    if(ajax)
    {
        iniciaRequisicao(tipo, url, assinc);
    }
    else
        alert('Seu navegador não possui suporte para esta aplicação!');
}
function iniciaRequisicao(tipo, url, bool)
{
    criaQueryString();
    ajax.open(tipo, url, bool);
    ajax.onreadystatechange = function()
    {
        if(ajax.readyState == 1)
        {
            //carregando....
            idTimeOut = setTimeout("tempoEsgotado();", 100000);
            var loading = document.createElement('span');
            var texto = document.createTextNode('Carregando...');
            loading.setAttribute('id','aviso');
            loading.appendChild(texto);
        }
        else if(ajax.readyState == 2)
        {
            //enviado...
        }
        else if(ajax.readyState == 3)
        {
            //recebendo...
        }
        else if(ajax.readyState == 4)
        {
            clearTimeout(idTimeOut);
            if(ajax.status == 200)
            {
                trataDados();
            }
            else
            {
                alert("Problema na comunicação com o objeto XMLHttpRequest!");
            }
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    //ajax.overrideMimeType("text/xml"); //usado no mozilla
    ajax.send(dadosUsuario);
}
function tempoEsgotado()
{
    ajax.abort();
    clearTimeout(idTimeOut);
    alert("Problema na comunicação com o servidor, comunicação foi abortada, tente novamente!");
}
function enviaDados(url)
{
    criaQueryString();
    requisicaoHTTP("POST", url, true);
}
function criaQueryString()
{
    dadosUsuario = "";
    var frm = document.forms[0];
    var numElementos = frm.elements.length;
    for(var i = 0; i < numElementos; i++)
    {
        if(i < numElementos - 1)
        {
            if(frm.elements[i].type == "radio" && frm.elements[i].checked)
            {
                for(var j = 0; j < frm.elements[i].length; j++)
                {
                    dadosUsuario += frm.elements[i].name + "=" + encodeURIComponent(frm.elements[i].value) + "&";
                }
            }
            else
                dadosUsuario += frm.elements[i].name + "=" + encodeURIComponent(frm.elements[i].value) + "&";
        }
        else
        {
            dadosUsuario += frm.elements[i].name + "=" + encodeURIComponent(frm.elements[i].value);
        }
    }
}