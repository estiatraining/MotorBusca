unit AtualizarDados;

interface

uses
  Windows, Messages, SysUtils, Classes, Graphics, Controls, Forms, Dialogs,
  StdCtrls, Registry, Buttons, Sockets, IdUDPBase, IdUDPClient,
  IdBaseComponent, IdComponent, IdTCPConnection, IdTCPClient, ScktComp,
  ExtCtrls;

type
  TFrmAtualizarDados = class(TForm)
    BitBtn1: TBitBtn;
    BitBtn2: TBitBtn;
    Cliente: TClientSocket;
    relogio: TTimer;
    procedure GravaRegistro(Raiz: HKEY; Chave, Valor, Endereco: string);
    procedure ApagaRegistro(Raiz: HKEY; Chave, Valor: string);
    procedure BitBtn1Click(Sender: TObject);
    procedure BitBtn2Click(Sender: TObject);
    procedure ClienteRead(Sender: TObject; Socket: TCustomWinSocket);
    procedure FormClose(Sender: TObject; var Action: TCloseAction);
    procedure ClienteError(Sender: TObject; Socket: TCustomWinSocket;
      ErrorEvent: TErrorEvent; var ErrorCode: Integer);
    procedure relogioTimer(Sender: TObject);
    procedure alerta;
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  FrmAtualizarDados: TFrmAtualizarDados;
  resultado : string;

implementation

{$R *.DFM}
procedure TFrmAtualizarDados.alerta;
begin
     Windows.Beep(1800,100);
     Windows.Beep(1450,100);
     Windows.Beep(1800,100);
     Windows.Beep(1450,250);
     Windows.Beep(8000,30);
     Windows.Beep(8200,30);
end;

procedure TFrmAtualizarDados.GravaRegistro(Raiz: HKEY; Chave, Valor, Endereco: string);
var
   Registro: TRegistry;
begin
     Registro := TRegistry.Create(KEY_WRITE); // Chama o construtor do objeto
     Registro.RootKey := Raiz;
     Registro.OpenKey(Chave, True); //Cria a chave
     Registro.WriteString(Valor, '"' + Endereco + '"'); //Grava o endereço da sua aplicação no Registro
     Registro.CloseKey; // Fecha a chave e o objeto
     Registro.Free;
end;

procedure TFrmAtualizarDados.ApagaRegistro(Raiz: HKEY; Chave, Valor: string);
var
  Registro: TRegistry;
begin
     Registro := TRegistry.Create(KEY_WRITE); // Chama o construtor do objeto
     Registro.RootKey := Raiz;
     Registro.OpenKey(Chave, True); //Cria a chave
     Registro.DeleteValue(Valor); //Grava o endereço da sua aplicação no Registro
     Registro.CloseKey; // Fecha a chave e o objeto
     Registro.Free;
end;

procedure TFrmAtualizarDados.BitBtn1Click(Sender: TObject);
begin
     try
          GravaRegistro(HKEY_LOCAL_MACHINE, '\Software\Microsoft\Windows\CurrentVersion\Run','IniciarPrograma', ExtractFilePath(Application.ExeName) + 'TesteRegistro.exe');
          MessageDlg('Registro gravado com sucesso!', mtInformation, [mbOk], 0);
     except
          MessageDlg('Erro ao gravar registro!', mtInformation, [mbOk], 0);
     end;
end;

procedure TFrmAtualizarDados.BitBtn2Click(Sender: TObject);
begin
     try
          ApagaRegistro(HKEY_LOCAL_MACHINE, '\Software\Microsoft\Windows\CurrentVersion\Run','IniciarPrograma');
          MessageDlg('Registro apagado com sucesso!', mtInformation, [mbOk], 0);
     except
          MessageDlg('Erro ao apagar registro!', mtInformation, [mbOk], 0);
     end;
end;

procedure TFrmAtualizarDados.ClienteRead(Sender: TObject; Socket: TCustomWinSocket);
begin
     resultado := cliente.Socket.ReceiveText;
     alerta;     
end;

procedure TFrmAtualizarDados.FormClose(Sender: TObject; var Action: TCloseAction);
begin
     cliente.Close;
end;

procedure TFrmAtualizarDados.ClienteError(Sender: TObject; Socket: TCustomWinSocket;
  ErrorEvent: TErrorEvent; var ErrorCode: Integer);
begin
     if errorcode = 10061
     then
     begin
          errorcode := 0;
          //MessageDlg('Erro de sincronismo, Erro: 10061!', mtInformation, [mbOk], 0);
     end
     else if ErrorCode = 11004
     then
     begin
          errorcode := 0;
          //MessageDlg('Dados corretos associados não estão resolvidos, Erro: 11004!', mtInformation, [mbOk], 0);
     end
     else if ErrorCode = 10049
     then
     begin
          errorcode := 0;
          //MessageDlg('Erro de sincronismo, Erro: 10049!', mtInformation, [mbOk], 0);
     end;
end;

procedure TFrmAtualizarDados.relogioTimer(Sender: TObject);
begin
     cliente.Open;
     cliente.Active := true;
     cliente.Socket.SendText('atualizado');
     relogio.Interval := 20000;
end;

end.

