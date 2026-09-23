<?php

declare(strict_types=1);

require_once __DIR__ . '/functions.php';

if (!function_exists('http_get_raw') || !function_exists('http_get_json')) {
    return;
}

function band_now(): DateTimeImmutable
{
    return new DateTimeImmutable('now', new DateTimeZone('Asia/Bangkok'));
}

function band_clean(string $text): string
{
    $text = html_entity_decode(
        trim(strip_tags($text)),
        ENT_QUOTES | ENT_HTML5,
        'UTF-8'
    );

    $text = preg_replace('/\s+/u', ' ', $text) ?? $text;

    return strlen($text) > 110
        ? rtrim(substr($text, 0, 107)) . '…'
        : $text;
}

function band_when(
    DateTimeImmutable $now,
    DateTimeImmutable $day
): string {
    $days = (int) $now
        ->setTime(0, 0)
        ->diff($day->setTime(0, 0))
        ->format('%r%a');

    if ($days <= 0) {
        return 'Heute';
    }

    if ($days === 1) {
        return 'Morgen';
    }

    $months = [
        'Jan',
        'Feb',
        'Mär',
        'Apr',
        'Mai',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Okt',
        'Nov',
        'Dez',
    ];

    return $day->format('j.')
        . ' '
        . $months[(int) $day->format('n') - 1];
}

function band_item(
    string $kind,
    string $when,
    string $text,
    string $href = 'news.php'
): array {
    return [
        'kind' => $kind,
        'when' => $when,
        'text' => $text,
        'href' => $href,
    ];
}

$now = band_now();
$y = (int) $now->format('Y');
$items = [];

$cal = [
    [
        $y . '-09-26',
        'event',
        'Full Moon Party auf Koh Phangan – Vollmond über Haad Rin',
        'sueden-inseln.php',
    ],
    [
        $y . '-10-11',
        'event',
        'Phuket Vegetarian Festival startet – Tempel und Je-Küche',
        'sueden-inseln.php',
    ],
    [
        $y . '-10-13',
        'feiertag',
        'König-Bhumibol-Gedenktag – Banken und Behörden zu',
        'news.php',
    ],
    [
        $y . '-10-23',
        'feiertag',
        'Chulalongkorn-Tag – gesetzlicher Feiertag',
        'ueber-thailand.php',
    ],
    [
        $y . '-10-26',
        'event',
        'Ok Phansa – Bootprozession in Nakhon Phanom',
        'norden.php',
    ],
    [
        $y . '-11-24',
        'event',
        'Loy Krathong & Yi Peng – Laternen in Chiang Mai',
        'norden.php',
    ],
    [
        $y . '-11-28',
        'event',
        'Pattaya International Fireworks Festival',
        'insider-meetup-pattaya.php',
    ],
    [
        $y . '-12-05',
        'feiertag',
        'Vatertag in Thailand',
        'ueber-thailand.php',
    ],
    [
        $y . '-12-31',
        'event',
        'Silvester-Countdown in Bangkok, Pattaya und Phuket',
        'bangkok.php',
    ],
    [
        ($y + 1) . '-04-13',
        'event',
        'Songkran – thailändisches Neujahr, Wasserfest',
        'insider-songkran.php',
    ],
];

foreach ($cal as [$iso, $kind, $text, $href]) {
    $date = DateTimeImmutable::createFromFormat(
        'Y-m-d',
        $iso,
        $now->getTimezone()
    );

    if (!$date instanceof DateTimeImmutable) {
        continue;
    }

    $days = (int) $now
        ->setTime(0, 0)
        ->diff($date->setTime(0, 0))
        ->format('%r%a');

    if ($days >= -1 && $days <= 130) {
        $items[] = band_item(
            $kind,
            band_when($now, $date),
            $text,
            $href
        );
    }
}

$xml = http_get_raw(
    'https://thethaiger.com/tag/festival/feed',
    6,
    'application/rss+xml, application/xml, text/xml, */*'
);

if (
    is_string($xml)
    && preg_match_all(
        '#<item>(.*?)</item>#si',
        $xml,
        $blocks
    )
) {
    $numberOfItems = 0;

    foreach ($blocks[1] as $block) {
        if (
            !preg_match(
                '#<title>(?:<!\[CDATA\[)?(.*?)(?:\]\]>)?</title>#si',
                $block,
                $titleMatches
            )
        ) {
            continue;
        }

        $title = band_clean($titleMatches[1]);

        if (
            strlen($title) < 18
            || preg_match('/^(festival articles|thaiger)/i', $title)
            || preg_match('/\b(kill|shot|dead|murder)\b/i', $title)
        ) {
            continue;
        }

        if (
            !preg_match(
                '/festival|fest\b|songkran|krathong|concert|parade|'
                . 'expo|fair|event|design week|things to do|tour\b|'
                . 'fireworks|vegetarian/i',
                $title
            )
        ) {
            continue;
        }

        $href = 'news.php';

        if (
            preg_match(
                '#<link>(?:<!\[CDATA\[)?(.*?)(?:\]\]>)?</link>#si',
                $block,
                $linkMatches
            )
        ) {
            $link = trim(
                html_entity_decode(
                    strip_tags($linkMatches[1]),
                    ENT_QUOTES | ENT_HTML5,
                    'UTF-8'
                )
            );

            if (str_starts_with($link, 'http')) {
                $href = $link;
            }
        }

        $when = 'Event';

        if (
            preg_match(
                '#<pubDate>(.*?)</pubDate>#si',
                $block,
                $dateMatches
            )
            && ($timestamp = strtotime($dateMatches[1]))
        ) {
            $publishedDate = (
                new DateTimeImmutable('@' . $timestamp)
            )->setTimezone($now->getTimezone());

            $when = band_when($now, $publishedDate);
        }

        $items[] = band_item(
            'event',
            $when,
            $title,
            $href
        );

        $numberOfItems++;

        if ($numberOfItems >= 6) {
            break;
        }
    }
}

$weatherLocations = [
    ['Pattaya', 12.9236, 100.8825],
    ['Bangkok', 13.7563, 100.5018],
];

foreach ($weatherLocations as [$label, $latitude, $longitude]) {
    $data = http_get_json(
        'https://api.open-meteo.com/v1/forecast?'
        . http_build_query([
            'latitude' => $latitude,
            'longitude' => $longitude,
            'current' => 'temperature_2m,weather_code',
            'timezone' => 'Asia/Bangkok',
        ]),
        4
    );

    $temperature = $data['current']['temperature_2m'] ?? null;

    if (is_numeric($temperature)) {
        $items[] = band_item(
            'wetter',
            $label,
            round((float) $temperature) . ' °C',
            'klima.php'
        );
    }
}

$exchangeRates = [];

foreach (['EUR', 'USD', 'CHF'] as $baseCurrency) {
    $json = http_get_json(
        'https://api.frankfurter.dev/v1/latest?from='
        . $baseCurrency
        . '&to=THB',
        3
    ) ?? http_get_json(
        'https://api.frankfurter.app/latest?from='
        . $baseCurrency
        . '&to=THB',
        3
    );

    $rate = $json['rates']['THB'] ?? null;

    if (is_numeric($rate)) {
        $exchangeRates[] = '1 '
            . $baseCurrency
            . ' = '
            . round((float) $rate, 2)
            . ' THB';
    }
}

if ($exchangeRates) {
    $items[] = band_item(
        'kurs',
        'Live',
        implode(' · ', $exchangeRates),
        'index.php#wechselkurs'
    );
}

$items[] = band_item(
    'visa',
    'Hinweis',
    'Viele EU-Pässe: 60 Tage visumfrei – Verlängerung vor Ort möglich',
    'reisevorbereitungen.php'
);

$seen = [];
$unique = [];

foreach ($items as $item) {
    $key = mb_strtolower((string) $item['text']);

    if ($key === '' || isset($seen[$key])) {
        continue;
    }

    $seen[$key] = true;
    $unique[] = $item;
}

$items = array_slice($unique, 0, 18);

if ($items === []) {
    return;
}

$labels = [
    'event' => 'Event',
    'feiertag' => 'Feiertag',
    'visa' => 'Visa',
    'wetter' => 'Wetter',
    'kurs' => 'Kurs',
    'news' => 'News',
    'tipp' => 'Tipp',
];

/*
 * Geschwindigkeit:
 * Ein höherer Wert bedeutet eine langsamere Bewegung.
 */
$seconds = 150;

?>
<style>
.thai-band {
    display: flex;
    align-items: stretch;
    min-height: 60px;
    height: 60px;
    background: #061015;
    border-bottom: 1px solid rgba(217, 170, 36, 0.28);
    color: #f4f3ee;
    font-family: "Outfit", Arial, sans-serif;
    overflow: hidden;
}

.thai-band-label {
    flex: 0 0 auto;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 0 14px;
    background: linear-gradient(90deg, #3a2a08, #1a1408);
    color: #f3c62f;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    white-space: nowrap;
    z-index: 2;
}

.thai-band-live {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #e23b3b;
    box-shadow: 0 0 0 0 rgba(226, 59, 59, 0.7);
    animation: thai-band-pulse 1.6s ease-out infinite;
}

.thai-band-viewport {
    flex: 1;
    height: 100%;
    overflow: hidden;
    mask-image: linear-gradient(
        90deg,
        transparent,
        #000 18px,
        #000 calc(100% - 18px),
        transparent
    );
}

.thai-band-track {
    display: flex;
    width: max-content;
    height: 100%;
    animation:
        thai-band-scroll <?= (int) $seconds ?>s linear infinite;
}

.thai-band:hover .thai-band-track {
    animation-play-state: paused;
}

.thai-band-copy {
    display: flex;
    align-items: center;
    gap: 28px;
    height: 100%;
    padding: 0 28px;
    white-space: nowrap;
}

.thai-band-item {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: #e8ebe8;
}

.thai-band-item a {
    color: #f4f3ee;
    text-decoration: none;
}

.thai-band-item a:hover {
    color: #f3c62f;
}

.thai-band-kind {
    padding: 2px 7px;
    border: 1px solid rgba(217, 170, 36, 0.45);
    border-radius: 999px;
    color: #f3c62f;
    font-size: 10px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}

.kind-event {
    border-color: #f3c62f;
    color: #ffe27a;
    background: rgba(243, 198, 47, 0.12);
}

.kind-wetter {
    border-color: #8ab4d4;
    color: #b7d4ee;
}

.kind-kurs {
    border-color: #d9aa24;
    color: #f3c62f;
}

.kind-visa {
    border-color: #7ec8c4;
    color: #9ee4df;
}

.kind-feiertag {
    border-color: #c9a227;
    color: #f3c62f;
}

.thai-band-when {
    color: #d9aa24;
    font-size: 12px;
    font-weight: 600;
}

@keyframes thai-band-scroll {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(-50%);
    }
}

@keyframes thai-band-pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(226, 59, 59, 0.55);
    }

    70% {
        box-shadow: 0 0 0 8px rgba(226, 59, 59, 0);
    }

    100% {
        box-shadow: 0 0 0 0 rgba(226, 59, 59, 0);
    }
}

@media (max-width: 700px) {
    .thai-band-label {
        padding: 0 10px;
        font-size: 10px;
        letter-spacing: 0.06em;
    }
}
</style>

<div
    class="thai-band"
    role="region"
    aria-label="Events · Thailand"
>
    <div class="thai-band-label">
        <span
            class="thai-band-live"
            aria-hidden="true"
        ></span>
        Events · Thailand
    </div>

    <div class="thai-band-viewport">
        <div class="thai-band-track">
            <?php for ($loop = 0; $loop < 2; $loop++): ?>
                <div
                    class="thai-band-copy"
                    <?= $loop === 1 ? 'aria-hidden="true"' : '' ?>
                >
                    <?php foreach ($items as $item): ?>
                        <?php
                        $kind = (string) $item['kind'];
                        $text = (string) $item['text'];
                        $when = (string) $item['when'];
                        $href = (string) $item['href'];
                        $label = $labels[$kind] ?? 'Info';
                        ?>

                        <span class="thai-band-item">
                            <span
                                class="thai-band-kind kind-<?= e($kind) ?>"
                            >
                                <?= e($label) ?>
                            </span>

                            <span class="thai-band-when">
                                <?= e($when) ?>
                            </span>

                            <a
                                href="<?= e($href) ?>"
                                <?= str_starts_with($href, 'http')
                                    ? 'target="_blank" rel="noopener"'
                                    : '' ?>
                            >
                                <?= e($text) ?>
                            </a>
                        </span>
                    <?php endforeach; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>