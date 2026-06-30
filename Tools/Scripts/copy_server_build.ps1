Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

$projectRoot = (Resolve-Path (Join-Path $PSScriptRoot '..\..')).Path
$sourceDir = Join-Path $projectRoot 'Source\Server\vc17\x64\Release'
$runtimeDir = Join-Path $projectRoot 'Server'
$buildsDir = Join-Path $projectRoot 'Builds\Server'
$latestDir = Join-Path $projectRoot 'Builds\Latest'
$mainExe = 'Hellgrave_Exodus-x64.exe'

$filesToCopy = @(
    'Hellgrave_Exodus-x64.exe',
    'boost_filesystem-vc143-mt-x64-1_79.dll',
    'boost_filesystem-vc145-mt-x64-1_91.dll',
    'boost_iostreams-vc143-mt-x64-1_79.dll',
    'boost_iostreams-vc145-mt-x64-1_91.dll',
    'bz2.dll',
    'fmt.dll',
    'liblzma.dll',
    'libmariadb.dll',
    'lua51.dll',
    'pugixml.dll',
    'z.dll',
    'zlib1.dll',
    'zstd.dll'
)

foreach ($dir in @($runtimeDir, $buildsDir, $latestDir)) {
    New-Item -ItemType Directory -Force -Path $dir | Out-Null
}

$mainExePath = Join-Path $sourceDir $mainExe
if (-not (Test-Path $mainExePath)) {
    throw "Build do servidor nao encontrada em $mainExePath"
}

foreach ($file in $filesToCopy) {
    $sourcePath = Join-Path $sourceDir $file
    if (Test-Path $sourcePath) {
        Copy-Item -LiteralPath $sourcePath -Destination (Join-Path $runtimeDir $file) -Force
        Copy-Item -LiteralPath $sourcePath -Destination (Join-Path $buildsDir $file) -Force
    }
}

Copy-Item -LiteralPath $mainExePath -Destination (Join-Path $latestDir $mainExe) -Force

Write-Host "Servidor copiado para $runtimeDir"
Write-Host "Build do servidor copiada para $buildsDir"
Write-Host "Executavel principal atualizado em $latestDir"
