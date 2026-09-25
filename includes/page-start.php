<?php
declare(strict_types=1);
require_once __DIR__.'/config.php';
require_once __DIR__.'/functions.php';
require_once __DIR__.'/nav.php';
require_once __DIR__.'/cms.php';
$cms=cms_load();
$activeNav=$activeNav??'';
$pageTitle=$pageTitle??SITE_NAME;
$pageDescription=$pageDescription??'Thailand Insight – echte Erfahrungen, Reiseideen und Orientierung für Thailand.';
$menuItems=site_menu($activeNav);
?><!doctype html>
<html lang="de"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#071b1d"><meta name="description" content="<?=e($pageDescription)?>">
<meta property="og:title" content="<?=e($pageTitle)?> · Thailand Insight"><meta property="og:description" content="<?=e($pageDescription)?>"><meta property="og:type" content="website"><meta property="og:image" content="<?=e(SITE_URL)?>/assets/img/hero-poster.jpg">
<link rel="canonical" href="<?=e(SITE_URL)?>/<?=e(basename($_SERVER['SCRIPT_NAME']??'index.php'))?>">
<title><?=e($pageTitle)?> · Thailand Insight</title>
<link rel="icon" href="assets/img/favicon.png" type="image/png">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/premium.css?v=5">
</head><body class="site-body">
<a class="skip-link" href="#main-content">Zum Inhalt springen</a>
<header class="site-header" data-site-header>
<a class="site-brand" href="index.php" aria-label="Thailand Insight Startseite"><img src="assets/img/logo-sidebar.png" alt="" width="64" height="56"><span><strong>THAILAND</strong><small>INSIGHT</small></span></a>
<button class="menu-toggle" type="button" aria-label="Menü öffnen" aria-expanded="false" data-menu-toggle><span></span><span></span><span></span></button>
<nav class="site-nav" aria-label="Hauptnavigation" data-site-nav>
<?php foreach($menuItems as $item):?><a class="<?=$item['active']?'is-active':''?>" href="<?=e($item['href'])?>" <?=$item['active']?'aria-current="page"':''?>><?=e($item['label'])?></a><?php endforeach;?>
</nav><a class="header-search" href="nuetzliche-links.php" aria-label="Service und nützliche Links"><span></span></a>
</header><main id="main-content" class="site-main">
