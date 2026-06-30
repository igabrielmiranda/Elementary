# Organization Done

Data da reorganizacao: 2026-06-29

## Segunda etapa concluida

A source foi separada de verdade para dentro de `Source/`, mantendo `Server/` e
`Cliente/` como runtimes.

## O que foi movido

- `1098znote.sql` -> `database/1098znote.sql`
- source/build do servidor -> `Source/Server/`
- source/build do client -> `Source/Cliente/`

## O que foi ajustado

- `Source/Cliente/vc16/settings.props` agora publica o client em `Cliente/`
- `Source/Cliente/vc16/otclient.vcxproj` foi ajustado para o novo caminho do `otclient_debug_lib.lib`
- `Server/restarter.bat` agora roda o executavel do runtime
- scripts em `Tools/Scripts/` foram atualizados para os novos caminhos

## O que foi mantido por seguranca

- `Server/data/`
- `Server/config.lua`
- `Server/key.pem`
- DLLs e executavel do runtime do servidor
- `Cliente/data/`
- `Cliente/modules/`
- `Cliente/mods/`
- `Cliente/layouts/`
- `Cliente/init.lua`
- DLLs e executavel do runtime do client
- `Server/SQLs/`
- `Server/CUSTOM_SCRIPTS/`

## O que nao foi feito

- nao houve mudanca em gameplay
- nao houve mudanca em spells, craft, mineracao, refino ou no sistema antigo de selecao elemental

Atualizacao posterior:

- o sistema antigo de selecao de elementos foi removido/desativado
- o projeto ficara livre para um redesenho futuro baseado em skills por arma equipada
- nao houve refatoracao de codigo de jogo
