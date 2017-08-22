function stAba(menu,conteudo)
{
    this.menu = menu;
    this.conteudo = conteudo;
}

var arAbas = new Array();
arAbas[0] = new stAba('td_cadastro','div_cadastro');
arAbas[1] = new stAba('td_consulta','div_consulta');
arAbas[2] = new stAba('td_manutencao','div_manutencao');
function AlternarAbas(menu,conteudo)
{
    for (i=0;i<arAbas.length;i++)
    {
    	m = document.getElementById(arAbas[i].menu);
    	m.className = 'menu';
    	c = document.getElementById(arAbas[i].conteudo)
    	c.style.display = 'none';
    }
    m = document.getElementById(menu)
    m.className = 'menu-sel';
    c = document.getElementById(conteudo)
    c.style.display = '';
}
function gerar()
{
    if(document.cadfotos.quantidade.value == '')
    {
        alert('Digite a quantidade!');
        document.cadfotos.quantidade.focus();
    }
    else
    {
        document.cadfotos.action = "index.php?menu=7&aba=td_manutencao&conteudo=div_manutencao";
        document.cadfotos.submit();
    }
}
function gerarMus()
{
    if(document.cadmusica.quantMus.value == '')
    {
        alert('Digite a quantidade!');
        document.cadmusica.quantMus.focus();
    }
    else
    {
        document.cadmusica.action = "index.php?menu=7&aba=td_consulta&conteudo=div_consulta";
        document.cadmusica.submit();
    }
}
function validar()
{
    if (document.index.nome.value =='' || document.index.nome.value ==' ')
    {
        alert('Digite o login!');
        document.index.nome.focus();
    }
    else if(document.index.senha.value =='' || document.index.senha.value ==' ')
    {
        alert('Digite a senha!');
        document.index.senha.focus();
    }
    else
    {
        document.index.action = "lib/php/validar.php";
        document.index.submit();
    }
}
function mudacorFundo(nome, cor)
{
    nome.style.backgroundColor = cor;
}
function mudacorLetra(nome, cor)
{
    nome.style.color = cor;
}
function mudaBorda(nome, cor)
{
    nome.style.border = '1px solid  cor ';
}
function valCadCli(usuario)
{
    if(document.cadusuario.t_usuario[0].checked)
    {
        if(document.cadusuario.servicos.value == 0)
        {
            alert('Escolha um serviço!');
            document.cadusuario.servicos.focus();
        }
        else if(document.cadusuario.eventos.value == 0)
        {
            alert('Escolha um evento!');
            document.cadusuario.eventos.focus();
        }
    }
    if(document.cadusuario.nome.value == '')
    {
        alert('Digite o nome!');
        document.cadusuario.nome.focus();
    }
    else if(document.cadusuario.login.value == '')
    {
        alert('Digite o login!');
        document.cadusuario.login.focus();
    }
    else if(document.cadusuario.senha.value == '')
    {
        alert('Digite o senha!');
        document.cadusuario.senha.focus();
    }
    else if(document.cadusuario.r_senha.value == '')
    {
        alert('Repita a senha!');
        document.cadusuario.r_senha.focus();
    }
    else if(document.cadusuario.senha.value != document.cadusuario.r_senha.value)
    {
        alert('As senhas estao diferentes!');
        document.cadusuario.senha.value = '';
        document.cadusuario.r_senha.value = '';
        document.cadusuario.senha.focus();
    }
    else if(document.cadusuario.residencial.value == '' && document.cadusuario.celular.value == '' && document.cadusuario.comercial.value == '')
    {
        alert('Digite pelo menos um telefone!');
        document.cadusuario.residencial.focus();
    }
    else if(document.cadusuario.rua.value == '')
    {
        alert('Digite a rua!');
        document.cadusuario.rua.focus();
    }
    else if(document.cadusuario.bairro.value == '')
    {
        alert('Digite o bairro!');
        document.cadusuario.bairro.focus();
    }
    else if(document.cadusuario.cidade.value == '')
    {
        alert('Digite a cidade!');
        document.cadusuario.cidade.focus();
    }
    else if(document.cadusuario.email.value == '')
    {
        alert('Digite a email!');
        document.cadusuario.email.focus();
    }
    else if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
    {
        document.cadusuario.action = "lib/php/gravar.php";
        document.cadusuario.submit();
    }
}
function valCadMus(usuario)
{
    if(document.cadmusica.pasta.value == 0)
    {
        alert('Escolha uma Configuração!');
        document.cadmusica.pasta.focus();
    }
    else if(document.cadmusica.pasta.value == "IN")
    {
        if(document.cadmusica.infantil.value == 0)
        {
            alert('Escolha a Pasta Infantil!');
            document.cadmusica.infantil.focus();
        }
        else if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
        {
            document.cadmusica.action = "lib/php/gravar.php";
            document.cadmusica.submit();
        }
    }
    else if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
    {
        document.cadmusica.action = "lib/php/gravar.php";
        document.cadmusica.submit();
    }
}
function valCadFot(usuario)
{
    if(document.cadfotos.selClientes.value == 0)
    {
        alert('Escolha um cliente!');
        document.cadfotos.selClientes.focus();
    }
    else if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
    {
        document.cadfotos.action = "lib/php/gravar.php";
        document.cadfotos.submit();
    }
}
function valAltCli(usuario)
{
    if(document.cadusuario.nome.value == '')
    {
        alert('Digite o nome!');
        document.cadusuario.nome.focus();
    }
    else if(document.cadusuario.login.value == '')
    {
        alert('Digite o login!');
        document.cadusuario.login.focus();
    }
    else if(document.cadusuario.senha.value != document.cadusuario.r_senha.value)
    {
        alert('As senhas estao diferentes!');
        document.cadusuario.senha.value = '';
        document.cadusuario.r_senha.value = '';
        document.cadusuario.senha.focus();
    }
    else if(document.cadusuario.residencial.value == '' && document.cadusuario.celular.value == '' && document.cadusuario.comercial.value == '')
    {
        alert('Digite pelo menos um telefone!');
        document.cadusuario.residencial.focus();
    }
    else if(document.cadusuario.rua.value == '')
    {
        alert('Digite a rua!');
        document.cadusuario.rua.focus();
    }
    else if(document.cadusuario.bairro.value == '')
    {
        alert('Digite o bairro!');
        document.cadusuario.bairro.focus();
    }
    else if(document.cadusuario.cidade.value == '')
    {
        alert('Digite a cidade!');
        document.cadusuario.cidade.focus();
    }
    else if(document.cadusuario.email.value == '')
    {
        alert('Digite a email!');
        document.cadusuario.email.focus();
    }
    else if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
    {
        document.cadusuario.action = "lib/php/gravar.php";
        document.cadusuario.submit();
    }
}
function valAltMus(usuario)
{
    if(document.cadmusica.arquivo.value == '')
    {
        alert('Digite o nome da música!');
        document.cadmusica.arquivo.focus();
    }
    else if(document.cadmusica.pasta.value == 0)
    {
        alert('Digite o tipo de configuração!');
        document.cadmusica.pasta.focus();
    }
    else if(document.cadmusica.pasta.value == "IN")
    {
        if(document.cadmusica.infantil.value == 0)
        {
            alert('Escolha a Pasta Infantil!');
            document.cadmusica.infantil.focus();
        }
        else if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
        {
            document.cadmusica.action = "lib/php/gravar.php";
            document.cadmusica.submit();
        }
    }
    else if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
    {
        document.cadmusica.action = "lib/php/gravar.php";
        document.cadmusica.submit();
    }
}
function valAltFot(usuario)
{
    if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
    {
        document.cadfotos.action = "lib/php/gravar.php";
        document.cadfotos.submit();
    }
}
function valExcUsu(usuario)
{
    if(confirm(usuario+', CONFIRMA A EXCLUSÃO DO USUARIO?'))
    {
        document.excusuario.action = "lib/php/gravar.php";
        document.excusuario.submit();
    }
}
function valExcMus(usuario)
{
    if(confirm(usuario+', CONFIRMA A EXCLUSÃO DESSA MÚSICA?'))
    {
        document.excmusica.action = "lib/php/gravar.php";
        document.excmusica.submit();
    }
}
function valExcFot(usuario)
{
    if(confirm(usuario+', CONFIRMA A EXCLUSÃO DAS FOTOS?'))
    {
        document.excfotos.action = "lib/php/gravar.php";
        document.excfotos.submit();
    }
}
function verImagem(imagem)
{
    if(navigator.appName == 'Microsoft Internet Explorer')
    {
        var largura = '650';
        var altura = '420';
    }
    else
    {
        var largura = '650';
        var altura = '420';
    }
    var winl = (screen.width - largura) / 2;
    var wint = (screen.height - altura) / 2;
    window.open("classes/mostImagens.php?imagem="+imagem,"IMAGEM","scrollbars,top="+wint+",left="+winl+",width="+largura+",height="+altura);
}
function grFotEsc(usuario)
{
    if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
    {
        document.frmFotosEsc.action = "lib/php/gravar.php";
        document.frmFotosEsc.submit();
    }
}
function grForAN(usuario)
{
    if(document.frmformulario.idade.value == "")
    {
        alert("Digite a idade!");
        document.frmformulario.idade.focus();
    }
    else if(document.frmformulario.nome.value == "")
    {
        alert("Digite a Nome!");
        document.frmformulario.nome.focus();
    }
    else if(document.frmformulario.data.value == "")
    {
        alert("Digite a Data!");
        document.frmformulario.data.focus();
    }
    else if(document.frmformulario.diaevento.value == "")
    {
        alert("Digite o dia do evento!");
        document.frmformulario.diaevento.focus();
    }
    else if(document.frmformulario.hora.value == "")
    {
        alert("Digite a Hora!");
        document.frmformulario.hora.focus();
    }
    else if(document.frmformulario.minuto.value == "")
    {
        alert("Digite a Minuto!");
        document.frmformulario.minuto.focus();
    }
    else if(document.frmformulario.lugar.value == "")
    {
        alert("Digite o lugar do evento!");
        document.frmformulario.lugar.focus();
    }
    else if(document.frmformulario.cidade[2].checked == true && document.frmformulario.outraCidade.value == "")
    {
        alert("Digite o nome da cidade!");
        document.frmformulario.outraCidade.focus();
    }
    else if(document.frmformulario.tema.value == "")
    {
        alert("Digite o tema da festa!");
        document.frmformulario.tema.focus();
    }
    else if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
    {
        document.frmformulario.action = "lib/php/gravar.php";
        document.frmformulario.submit();
    }
}
function grForBA(usuario)
{
    alert("Não tem nada!");
}
function grForEM(usuario)
{
    if(document.frmformulario.noivo.value == "")
    {
        alert("Digite o nome do noivo!");
        document.frmformulario.noivo.focus();
    }
    else if(document.frmformulario.noiva.value == "")
    {
        alert("Digite o nome da noiva!");
        document.frmformulario.noiva.focus();
    }
    else if(document.frmformulario.diaevento.value == '')
    {
        alert("Digite o dia do evento!");
        document.frmformulario.diaevento.focus();
    }
    else if(document.frmformulario.hora.value == '')
    {
        alert("Digite a hora!");
        document.frmformulario.hora.focus();
    }
    else if(document.frmformulario.minuto.value == '')
    {
        alert("Digite o minuto!");
        document.frmformulario.minuto.focus();
    }
    else if(document.frmformulario.igreja.value == '')
    {
        alert("Digite o nome da Igreja ou Capela!");
        document.frmformulario.igreja.focus();
    }
    else if(document.frmformulario.lugar.value == '')
    {
        alert("Digite o nome do lugar do evento!");
        document.frmformulario.lugar.focus();
    }
    else if(document.frmformulario.paisagens.value == 0)
    {
        alert("Escolha uma paisagem!");
        document.frmformulario.paisagens.focus();
    }
    else if(document.frmformulario.cidade[2].checked == true && document.frmformulario.outraCidade.value == "")
    {
        alert("Digite o nome da cidade!");
        document.frmformulario.outraCidade.focus();
    }
    else if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
    {
        document.frmformulario.action = "lib/php/gravar.php";
        document.frmformulario.submit();
    }
}
function grForOU(usuario)
{
    alert("Não tem nada!");
}
function impForm(usuario,acao)
{
    window.open("classes/relFormCarMus.php?usuario="+usuario+"&acao="+acao,"Formulários","top=0,scrollbars=yes,left=0,width=" + ( screen.availWidth -7 ) + ",height=" + ( screen.availHeight -24));
}
function relUsu()
{
    var modelo,usuario,cont,indice;
    cont = document.frmRelusu.modelo.length;
    for (i = 0; i < cont; i++)
    {
        if (document.frmRelusu.modelo[i].checked)
            break;
    }
    modelo = document.frmRelusu.modelo[i].value;
    indice = document.frmRelusu.selCliente.selectedIndex;
    usuario = document.frmRelusu.selCliente.options[indice].value;
    if(modelo == 'form')
    {
        if(document.frmRelusu.selCliente.value == 0)
            alert("Escolha um usuario.");
        else
        window.open("classes/relFormCarMus.php?usuario="+usuario+"&acao=AS","Formulários","top=0,scrollbars=yes,left=0,width=" + ( screen.availWidth -7 ) + ",height=" + ( screen.availHeight -24));
    }
    else
        window.open("classes/relUsuarios.php?usuario="+usuario+"&modelo="+modelo,"Relatórios","top=0,scrollbars=yes,left=0,width=" + ( screen.availWidth -7 ) + ",height=" + ( screen.availHeight -24));
}
function relMus()
{
    var modelo,usuario,cont,indice;
    cont = document.frmRelmus.modelo.length;
    for (i = 0; i < cont; i++)
    {
        if (document.frmRelmus.modelo[i].checked)
            break;
    }
    modelo = document.frmRelmus.modelo[i].value;
    indice = document.frmRelmus.selCliente.selectedIndex;
    usuario = document.frmRelmus.selCliente.options[indice].value;
    window.open("classes/relMusicas.php?usuario="+usuario+"&modelo="+modelo,"Relatórios","top=0,scrollbars=yes,left=0,width=" + ( screen.availWidth -7 ) + ",height=" + ( screen.availHeight -24));
}
function relFot()
{
    var modelo,usuario,cont,indice;
    cont = document.frmRelfotos.modelo.length;
    for (i = 0; i < cont; i++)
    {
        if (document.frmRelfotos.modelo[i].checked)
            break;
    }
    modelo = document.frmRelfotos.modelo[i].value;
    indice = document.frmRelfotos.selCliente.selectedIndex;
    usuario = document.frmRelfotos.selCliente.options[indice].value;
    window.open("classes/relFotos.php?usuario="+usuario+"&modelo="+modelo,"Relatórios","top=0,scrollbars=yes,left=0,width=" + ( screen.availWidth -7 ) + ",height=" + ( screen.availHeight -24));
}
function popupAjuda(menu)
{
    if(navigator.appName == 'Microsoft Internet Explorer')
    {
        var largura = '600';
        var altura = '480';
    }
    else
    {
        var largura = '615';
        var altura = '460';
    }
    var winl = (screen.width - largura) / 2;
    var wint = (screen.height - altura) / 2;
    window.open("classes/ajuda.php?menu="+menu,"Help","scrollbars=no,top="+wint+",left="+winl+",width="+largura+",height="+altura);
}
function popupMail()
{
    if(navigator.appName == 'Microsoft Internet Explorer')
    {
        var largura = '388';
        var altura = '280';
    }
    else
    {
        var largura = '400';
        var altura = '320';
    }
    var winl = (screen.width - largura) / 2;
    var wint = (screen.height - altura) / 2;
    window.open("classes/mail.php","Mail","scrollbars=no,top="+wint+",left="+winl+",width="+largura+",height="+altura);
}
function novoPortfolio()
{
    if(navigator.appName == 'Microsoft Internet Explorer')
    {
        var largura = '388';
        var altura = '210';
    }
    else
    {
        var largura = '400';
        var altura = '230';
    }
    var winl = (screen.width - largura) / 2;
    var wint = (screen.height - altura) / 2;
    window.open("classes/portfolio.php?novo=sim","Portfolio","scrollbars=no,top="+wint+",left="+winl+",width="+largura+",height="+altura);
}
function mostrarPortfolio(link,id)
{
    if(navigator.appName == 'Microsoft Internet Explorer')
    {
        var largura = '650';
        var altura = '515';
    }
    else
    {
        var largura = '655';
        var altura = '520';
    }
    var winl = (screen.width - largura) / 2;
    var wint = (screen.height - altura) / 2;
    window.open("classes/portfolio.php?mostrar=sim&id="+id+"&link="+link,"Portfolio","scrollbars=no,top="+wint+",left="+winl+",width="+largura+",height="+altura);
}
function altPortfolio(id)
{
    if(navigator.appName == 'Microsoft Internet Explorer')
    {
        var largura = '388';
        var altura = '210';
    }
    else
    {
        var largura = '400';
        var altura = '230';
    }
    var winl = (screen.width - largura) / 2;
    var wint = (screen.height - altura) / 2;
    window.open("classes/portfolio.php?alterar=sim&id="+id,"Portfolio","scrollbars=no,top="+wint+",left="+winl+",width="+largura+",height="+altura);
}
function excPortfolio(id,usuario)
{
    if(navigator.appName == 'Microsoft Internet Explorer')
    {
        var largura = '388';
        var altura = '210';
    }
    else
    {
        var largura = '400';
        var altura = '230';
    }
    var winl = (screen.width - largura) / 2;
    var wint = (screen.height - altura) / 2;
    if(confirm(usuario+', CONFIRMA A GRAVAÇÃO DOS DADOS?'))
        window.open("classes/portfolio.php?excluir=sim&id="+id,"Portfolio","scrollbars=no,top="+wint+",left="+winl+",width="+largura+",height="+altura);
}
function mostrar()
{
    if(document.cadmusica.pasta.value == "IN")
        document.cadmusica.infantil.disabled = false;
    else
        document.cadmusica.infantil.disabled = true;
}
function barra(objeto)
{
    if (objeto.value.length == 2 || objeto.value.length == 5 )
    {
        objeto.value = objeto.value+"/";
    }
}