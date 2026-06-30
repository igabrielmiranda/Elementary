Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

$projectRoot = (Resolve-Path (Join-Path $PSScriptRoot '..\..')).Path
$runtimeDir = Join-Path $projectRoot 'Server'
$exePath = Join-Path $runtimeDir 'Hellgrave_Exodus-x64.exe'

if (-not (Test-Path $exePath)) {
    throw "Executavel do servidor nao encontrado em $exePath"
}

Push-Location $runtimeDir
try {
    & $exePath
}
finally {
    Pop-Location
}
