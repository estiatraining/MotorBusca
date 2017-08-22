/*
    Arquivo index.js é o arquivo que contem os codigos javascript usados no sistema
    Autor: Cleison Ferreira de Melo
*/
function validar()
{
    if(document.frmCadastro.endereco.value == "")
    {
        alert("Digite o endereço(url) do site!");
        document.frmCadastro.endereco.focus();
    }
    else
    {
        document.frmCadastro.action = "#";
        document.frmCadastro.submit();
    }
}
function validarLogin()
{
    if(document.frmIndex.login.value == "")
    {
        alert("Digite o Login!");
        document.frmIndex.login.focus();
    }
    else if(document.frmIndex.senha.value == "")
    {
        alert("Digite o Senha!");
        document.frmIndex.senha.focus();
    }
    else
    {
        document.frmIndex.action = "#";
        document.frmIndex.submit();
    }
}

