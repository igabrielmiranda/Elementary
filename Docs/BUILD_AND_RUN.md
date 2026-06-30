# Build And Run

## Runtime atual

### Servidor

Use `Server/` como working directory.

Comandos comuns:

```powershell
cd C:\Elementary\Server
.\Hellgrave_Exodus-x64.exe
```

Ou:

```powershell
cd C:\Elementary\Server
.\restarter.bat
```

### Client

Use `Cliente/` como working directory.

```powershell
cd C:\Elementary\Cliente
.\otclient_gl.exe
```

## Como compilar agora

### Servidor

Solution:

- `C:\Elementary\Source\Server\vc17\Hellgrave_Exodus.sln`

Exemplo:

```powershell
msbuild C:\Elementary\Source\Server\vc17\Hellgrave_Exodus.sln /p:Configuration=Release /p:Platform=x64
```

Saida esperada:

- `Source\Server\vc17\x64\Release\Hellgrave_Exodus-x64.exe`

### Client

Solution:

- `C:\Elementary\Source\Cliente\vc16\otclient.sln`

Exemplo:

```powershell
msbuild C:\Elementary\Source\Cliente\vc16\otclient.sln /p:Configuration=OpenGL /p:Platform=Win32
```

Saida esperada:

- `Cliente\otclient_gl.exe`

## Copiar builds para runtime e Builds

Scripts locais:

- `Tools\Scripts\copy_server_build.ps1`
- `Tools\Scripts\copy_client_build.ps1`
- `Tools\Scripts\run_server.ps1`
- `Tools\Scripts\run_client.ps1`

Exemplos:

```powershell
powershell -ExecutionPolicy Bypass -File C:\Elementary\Tools\Scripts\copy_server_build.ps1
powershell -ExecutionPolicy Bypass -File C:\Elementary\Tools\Scripts\copy_client_build.ps1
```

Comportamento:

- `copy_server_build.ps1` copia de `Source\Server\vc17\x64\Release\` para `Server\`, `Builds\Server\` e `Builds\Latest\`
- `copy_client_build.ps1` copia de `Cliente\` para `Builds\Cliente\` e `Builds\Latest\`
- copia o executavel principal mais recente para `Builds\Latest\`
- nao apaga nada

## Rodar por script

```powershell
powershell -ExecutionPolicy Bypass -File C:\Elementary\Tools\Scripts\run_server.ps1
powershell -ExecutionPolicy Bypass -File C:\Elementary\Tools\Scripts\run_client.ps1
```

## Observacoes

- `run_server.ps1` roda com working directory em `Server\`
- `run_client.ps1` roda com working directory em `Cliente\`
- o `restarter.bat` do servidor agora usa o executavel do runtime em `Server\`
