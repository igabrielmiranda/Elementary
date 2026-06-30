Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

$projectRoot = (Resolve-Path (Join-Path $PSScriptRoot '..\..')).Path
$runtimeDir = Join-Path $projectRoot 'Cliente'
$exePath = Join-Path $runtimeDir 'otclient_gl.exe'

if (-not (Test-Path $exePath)) {
    throw "Executavel do client nao encontrado em $exePath"
}

Push-Location $runtimeDir
try {
    & $exePath
}
finally {
    Pop-Location
}
