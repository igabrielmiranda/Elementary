# Project Structure

Estado atual do projeto em `C:\Elementary`.

## Runtime

- `Server/`: servidor pronto para rodar com `config.lua`, `data/`, DLLs, executavel e `restarter.bat`
- `Cliente/`: client pronto para rodar com `otclient_gl.exe`, `init.lua`, `data/`, `modules/`, `mods/` e `layouts/`
- `www/`: site/AAC mantido separado

## Source e build

- `Source/Server/`: source/build do servidor
- `Source/Cliente/`: source/build do client
- `Builds/`: copias locais de builds compiladas
- `Tools/`: scripts e ferramentas auxiliares
- `Docs/`: documentacao do projeto
- `database/`: SQL solto e futuros dumps

## O que foi movido para Source

### Servidor

- `Server/src` -> `Source/Server/src`
- `Server/vc17` -> `Source/Server/vc17`
- `Server/cmake` -> `Source/Server/cmake`
- `Server/CMakeLists.txt` e arquivos de desenvolvimento relacionados

### Client

- `Cliente/src` -> `Source/Cliente/src`
- `Cliente/vc16` -> `Source/Cliente/vc16`
- `Cliente/android` -> `Source/Cliente/android`
- `Cliente/tests` -> `Source/Cliente/tests`
- `Cliente/tools` -> `Source/Cliente/tools`
- `Cliente/CMakeLists.txt` e arquivos de desenvolvimento relacionados

## Mantido no runtime por seguranca

- `Server/data/`
- `Server/config.lua`
- `Server/key.pem`
- `Server/restarter.bat`
- DLLs e executavel de runtime do servidor
- `Cliente/data/`
- `Cliente/modules/`
- `Cliente/mods/`
- `Cliente/layouts/`
- `Cliente/init.lua`
- DLLs e executavel de runtime do client
- `Server/SQLs/`
- `Server/CUSTOM_SCRIPTS/`

## Observacoes

- O servidor continua usando `Server/` como working directory
- O client continua usando `Cliente/` como working directory
- A build do client continua publicando em `Cliente/` por configuracao do `OutDir`
- A build do servidor continua sendo gerada em `Source/Server/vc17/x64/Release`
- O sistema antigo de selecao de elementos foi removido/desativado. O projeto sera redesenhado para um sistema de skills baseado em arma equipada.
