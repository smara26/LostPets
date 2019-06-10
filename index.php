<?php
$url =substr($_SERVER["REQUEST_URI"],1,-4);
// var_dump($url);
$url = explode("?",$url);

echo $url[0];
switch ($url[0]) {
    case 'ad.php':
        require 'Front/ads_module/ad/ad.php';
        break;
    case 'statistics':
        require 'Front/statistics/statistics.php';
        break;
    case 'all-ads':
        require 'Front/page/page.php';
        break;
    case 'home':
        require 'Front/home/home.html';
        break;
    case 'login':
        require 'Front/login/login.html';
        break;
    case 'register':
        require 'Front/register/register.html';
        break;
    case 'logout':
        require 'Back/logout.php';
        break;
    case 'add':
        require 'Front/ads_module/add/add.php';
        break;
    case 'edit':
        require 'Front/ads_module/edit/edit.php';
        break;
    case 'personal-ads':
        require 'Front/personal_ads/personal-ads.php';
        break;
}