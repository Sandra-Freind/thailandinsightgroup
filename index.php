<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/nav.php';

$newsCards = [
    [
        'date' => '12. September 2026',
        'title' => 'Pattaya: Neue Strandpromenade nimmt Gestalt an',
        'image' => 'assets/img/news-home-1.jpg',
        'href' => 'news.php',
    ],
    [
        'date' => '10. September 2026',
        'title' => 'Die schönsten Ausflugsziele rund um Pattaya',
        'image' => 'assets/img/news-home-2.jpg',
        'href' => 'news.php',
    ],
    [
        'date' => '8. September 2026',
        'title' => 'Thailand erleichtert Visa-Regeln für Langzeitaufenthalte',
        'image' => 'assets/img/news-home-3.jpg',
        'href' => 'news.php',
    ],
];

$menuItems = site_menu('home');

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
        content="Thailand Insight – dein digitaler Begleiter für Thailand."
    >

    <title>Thailand Insight Group</title>

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
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Great+Vibes&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="assets/css/home.css?v=6"
    >
</head>

<body>
<div class="home-app">
    <?php require __DIR__ . '/includes/home-sidebar.php'; ?>

    <main class="home-main">
        <section
            class="hero-home"
            aria-label="Thailand Insight Hero"
        >
            <video
                id="heroVideo"
                class="hero-home-video"
                autoplay
                muted
                loop
                playsinline
                preload="auto"
                poster="assets/img/hero-poster.jpg"
            >
                <source
                    src="assets/video/hero.mp4"
                    type="video/mp4"
                >
            </video>

            <div
                class="hero-gradient"
                aria-hidden="true"
            ></div>

            <div class="hero-copy">
                <div class="hero-kicker">
                    Willkommen bei
                </div>

                <h1>Thailand Insight</h1>
            </div>

            <div
                class="hero-handwriting"
                aria-hidden="true"
            >
                <strong>Thailand</strong>
                <span>More than a destination</span>
                <span>A way of life</span>
                <i></i>
            </div>

            <div
                class="hero-audio"
                aria-label="Video-Lautstärke"
            >
                <button
                    class="sound-toggle"
                    id="soundToggle"
                    type="button"
                    aria-label="Ton einschalten"
                    title="Ton einschalten"
                >
                    <svg
                        class="sound-on"
                        viewBox="0 0 24 24"
                    >
                        <path d="M4 10v4h4l5 4V6l-5 4z"/>
                        <path d="M16 9a4 4 0 0 1 0 6M18.5 6.5a8 8 0 0 1 0 11"/>
                    </svg>

                    <svg
                        class="sound-off"
                        viewBox="0 0 24 24"
                    >
                        <path d="M4 10v4h4l5 4V6l-5 4z"/>
                        <path d="m17 10 4 4M21 10l-4 4"/>
                    </svg>
                </button>

                <input
                    id="heroVolume"
                    class="hero-volume"
                    type="range"
                    min="0"
                    max="1"
                    step="0.01"
                    value="1"
                    aria-label="Lautstärke"
                >
            </div>
        </section>

        <section
            class="content-zone"
            id="dashboard"
        >
            <span
                id="nuetzliche-links"
                hidden
            ></span>

            <div class="info-grid">
                <article
                    class="info-card weather-card"
                    id="wetter"
                    data-weather
                >
                    <h2>Pattaya</h2>

                    <div class="weather-body">
                        <div
                            class="sun-icon"
                            aria-hidden="true"
                        >
                            <span></span>
                        </div>

                        <div class="weather-main">
                            <div
                                class="weather-temp"
                                data-weather-temp
                            >
                                —°C
                            </div>

                            <div
                                class="weather-condition"
                                data-weather-condition
                            >
                                Wird geladen …
                            </div>
                        </div>

                        <div class="weather-range">
                            <div>
                                ↑
                                <span data-weather-high>—°</span>
                            </div>

                            <div>
                                ↓
                                <span data-weather-low>—°</span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="card-status"
                        data-weather-status
                    >
                        Wird geladen …
                    </div>

                    <a
                        class="gold-link"
                        href="klima.php"
                    >
                        Details ansehen
                        <span>→</span>
                    </a>
                </article>

                <article
                    class="info-card fx-card"
                    id="wechselkurs"
                    data-fx
                >
                    <h2>Wechselkurs</h2>

                    <div class="fx-list">
                        <div class="fx-row">
                            <span class="currency-flag eu">★</span>
                            <span>1 EUR</span>
                            <span>=</span>
                            <strong data-fx-eur>— THB</strong>
                        </div>

                        <div class="fx-row">
                            <span class="currency-flag us">★</span>
                            <span>1 USD</span>
                            <span>=</span>
                            <strong data-fx-usd>— THB</strong>
                        </div>

                        <div class="fx-row">
                            <span class="currency-flag ch">+</span>
                            <span>1 CHF</span>
                            <span>=</span>
                            <strong data-fx-chf>— THB</strong>
                        </div>
                    </div>

                    <div
                        class="card-status"
                        data-fx-status
                    >
                        Wird geladen …
                    </div>

                    <a
                        class="gold-link"
                        href="#wechselkurs"
                    >
                        Alle Kurse
                        <span>→</span>
                    </a>
                </article>

                <article class="info-card sandra-card">
                    <div class="sandra-copy">
                        <div class="sandra-title-line">
                            <h2>Sandra</h2>
                            <span class="new-badge">Neu</span>
                        </div>

                        <p class="sandra-lead">
                            Deine persönliche<br>
                            Begleiterin in Pattaya.
                        </p>

                        <p>
                            Fragen, Alltag, Sprache –<br>
                            einfach für dich da.
                        </p>

                        <a
                            class="gold-button"
                            href="sandra-app.php"
                        >
                            Zu Sandra
                            <span>→</span>
                        </a>
                    </div>

                    <img
                        src="assets/img/sandra-home.png"
                        alt="Sandra App auf einem Smartphone"
                    >
                </article>
            </div>

            <div class="section-heading">
                <h2>Aktuelle Neuigkeiten aus Thailand</h2>

                <a href="news.php">
                    Alle Beiträge
                    <span>→</span>
                </a>
            </div>

            <div class="news-grid">
                <?php foreach ($newsCards as $card): ?>
                    <a
                        class="news-card"
                        href="<?= e($card['href']) ?>"
                    >
                        <div class="news-image-wrap">
                            <img
                                src="<?= e($card['image']) ?>"
                                alt=""
                            >
                        </div>

                        <div class="news-meta">
                            <?= e($card['date']) ?>
                        </div>

                        <div class="news-card-bottom">
                            <h3><?= e($card['title']) ?></h3>
                            <span class="news-arrow">→</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!--
                Laufband ausschließlich auf der Startseite.

                Es befindet sich im selben Inhaltsbereich wie das
                Nachrichtenraster. Dadurch schließen die linke und
                rechte Kante exakt mit dem Bildbereich darüber ab.
            -->
            <div
                class="home-laufband"
                style="
                    display:block;
                    width:100%;
                    max-width:100%;
                    margin:24px 0 0;
                    padding:0;
                    overflow:hidden;
                    box-sizing:border-box;
                "
            >
                <?php require __DIR__ . '/includes/laufband.php'; ?>
            </div>
        </section>
    </main>
</div>

<script src="assets/js/home.js?v=4"></script>
</body>
</html>