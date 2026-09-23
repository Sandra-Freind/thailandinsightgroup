<?php

declare(strict_types=1);

const SITE_NAME = 'Thailandinsight Group';
const SITE_SLOGAN = 'INSPIRE · CONNECT · INFORM';
const SITE_URL = 'https://thailandinsightgroup.com';

const NAV_ITEMS = [
    [
        'id' => 'startseite',
        'label' => 'Startseite',
        'href' => 'index.php',
        'icon' => 'home',
    ],
    [
        'id' => 'ueber-thailand',
        'label' => 'Über Thailand',
        'href' => 'ueber-thailand.php',
        'icon' => 'info-doc',
    ],
    [
        'id' => 'ebooks',
        'label' => 'Ebooks',
        'href' => 'ebooks.php',
        'icon' => 'book',
    ],
    [
        'id' => 'sandra-app',
        'label' => 'Sandra App',
        'href' => 'sandra-app.php',
        'icon' => 'user',
    ],
    [
        'id' => 'kontakt',
        'label' => 'Kontakt',
        'href' => 'kontakt.php',
        'icon' => 'mail',
    ],
    [
        'id' => 'impressum',
        'label' => 'Impressum',
        'href' => 'impressum.php',
        'icon' => 'imprint',
    ],
];

const WEATHER_CITIES = [
    'pattaya' => [
        'label' => 'Pattaya',
        'lat' => 12.9236,
        'lon' => 100.8825,
    ],
    'bangkok' => [
        'label' => 'Bangkok',
        'lat' => 13.7563,
        'lon' => 100.5018,
    ],
    'phuket' => [
        'label' => 'Phuket',
        'lat' => 7.8804,
        'lon' => 98.3923,
    ],
    'chiang-mai' => [
        'label' => 'Chiang Mai',
        'lat' => 18.7883,
        'lon' => 98.9853,
    ],
    'koh-samui' => [
        'label' => 'Koh Samui',
        'lat' => 9.5120,
        'lon' => 100.0136,
    ],
];

const NEWS_ITEMS = [
    [
        'kicker' => 'Schlagzeile',
        'when' => 'Heute',
        'title' => 'Politische Krise in Bangkok eskaliert',
        'image' => 'assets/img/news-bangkok.jpg',
        'alt' => 'Nachthimmel über Bangkok',
    ],
    [
        'kicker' => 'Schlagzeile',
        'when' => 'Heute',
        'title' => 'Inseln im Norden wieder geöffnet',
        'image' => 'assets/img/news-islands.jpg',
        'alt' => 'Longtail-Boot vor einer thailändischen Insel',
    ],
    [
        'kicker' => 'Schlagzeile',
        'when' => 'Heute',
        'title' => 'Tourismus boomt auf Phuket',
        'image' => 'assets/img/news-phuket.jpg',
        'alt' => 'Strand und Felsen auf Phuket',
    ],
    [
        'kicker' => 'Neu',
        'when' => 'Heute',
        'title' => 'Neue Tempel-Regeln in Ayutthaya',
        'image' => null,
        'alt' => '',
    ],
    [
        'kicker' => 'Schlagzeile',
        'when' => 'Heute',
        'title' => 'Neuer Flughafen Bangkok Airways',
        'image' => 'assets/img/news-airport.jpg',
        'alt' => 'Flugzeug über den Wolken',
    ],
];
