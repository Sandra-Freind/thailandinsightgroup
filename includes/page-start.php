<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/nav.php';
require_once __DIR__ . '/cms.php';

$cms = cms_load();
$activeNav = $activeNav ?? '';
$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription
    ?? 'Thailand Insight – dein digitaler Begleiter für Thailand.';
$extraCss = $extraCss ?? [];
$menuItems = site_menu($activeNav);

?><!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="theme-color"
        content="#071318"
    >

    <meta
        name="description"
        content="<?= e($pageDescription) ?>"
    >

    <title>
        <?= e($pageTitle) ?> · Thailand Insight Group
    </title>

    <link
        rel="icon"
        href="assets/img/favicon.png"
        type="image/png"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Great+Vibes&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="assets/css/home.css?v=6"
    >

    <link
        rel="stylesheet"
        href="assets/css/pages.css?v=2"
    >

    <?php foreach ($extraCss as $href): ?>
        <link
            rel="stylesheet"
            href="<?= e($href) ?>"
        >
    <?php endforeach; ?>
</head>

<body>
<div class="home-app">
    <?php require __DIR__ . '/home-sidebar.php'; ?>

    <main class="home-main page-main">