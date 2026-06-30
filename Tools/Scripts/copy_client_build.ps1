Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

$projectRoot = (Resolve-Path (Join-Path $PSScriptRoot '..\..')).Path
$sourceDir = Join-Path $projectRoot 'Cliente'
$runtimeDir = Join-Path $projectRoot 'Cliente'
$buildsDir = Join-Path $projectRoot 'Builds\Cliente'
$latestDir = Join-Path $projectRoot 'Builds\Latest'
$mainExe = 'otclient_gl.exe'

$filesToCopy = @(
    'otclient_gl.exe',
    'libEGL.dll',
    'libGLESv2.dll'
)

foreach ($dir in @($runtimeDir, $buildsDir, $latestDir)) {
    New-Item -ItemType Directory -Force -Path $dir | Out-Null
}

$mainExePath = Join-Path $sourceDir $mainExe
if (-not (Test-Path $mainExePath)) {
    throw "Build do client nao encontrada em $mainExePath"
}

foreach ($file in $filesToCopy) {
    $sourcePath = Join-Path $sourceDir $file
    if (Test-Path $sourcePath) {
        if ($sourceDir -ne $runtimeDir) {
            Copy-Item -LiteralPath $sourcePath -Destination (Join-Path $runtimeDir $file) -Force
        }
        Copy-Item -LiteralPath $sourcePath -Destination (Join-Path $buildsDir $file) -Force
    }
}

Copy-Item -LiteralPath $mainExePath -Destination (Join-Path $latestDir $mainExe) -Force

Write-Host "Client pronto em $runtimeDir"
Write-Host "Build do client copiada para $buildsDir"
Write-Host "Executavel principal atualizado em $latestDir"
