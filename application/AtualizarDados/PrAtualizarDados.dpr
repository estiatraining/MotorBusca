program PrAtualizarDados;

uses
  Forms,
  AtualizarDados in 'AtualizarDados.pas' {FrmAtualizarDados};

{$R *.RES}

begin
  Application.Initialize;
  Application.CreateForm(TFrmAtualizarDados, FrmAtualizarDados);
  Application.Run;
end.
