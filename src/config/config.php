<?php
function getBaseUrl()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];

    // Mendapatkan nama folder proyek secara dinamis
    $projectFolder = basename(dirname($script));

    // Menghilangkan nama skrip dan folder proyek dari URL untuk mendapatkan base URL
    $baseUrl = $protocol . '://' . $host . '/' . $projectFolder;

    return $baseUrl;
}


$base_url = getBaseUrl();
