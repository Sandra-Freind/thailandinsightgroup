<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$activePage = $activePage ?? '';
$pageTitle = $pageTitle ?? 'Startseite';
$pageDescription = $pageDescription ?? 'Thailandinsight Group — Klar, elegant, deins. Tipps zu Auswandern, Leben und Urlaub in Thailand.';
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> · <?= e(SITE_NAME) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <link rel="icon" href="assets/img/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css?v=20">
</head>
<body>
    <div class="app">
        <?php require __DIR__ . '/sidebar.php'; ?>
        <div class="shell">
            <header class="mobile-bar">
                <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="sidebar" data-menu-toggle>
                    <span></span><span></span><span></span>
                    <span class="sr-only">Menü</span>
                </button>
                <a class="mobile-brand" href="index.php">Thailandinsight Group</a>
            </header>
            <main class="main">