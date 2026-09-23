<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/functions.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: public, max-age=180');

$slug = strtolower((string) ($_GET['city'] ?? 'pattaya'));

if (!isset(WEATHER_CITIES[$slug])) {
    http_response_code(400);

    echo json_encode(
        [
            'ok' => false,
            'error' => 'Unbekannte Stadt.',
        ],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

$city = WEATHER_CITIES[$slug];

$query = http_build_query([
    'latitude' => $city['lat'],
    'longitude' => $city['lon'],
    'current' => 'temperature_2m,precipitation,weather_code,rain,showers',
    'daily' => 'temperature_2m_max,temperature_2m_min',
    'timezone' => 'Asia/Bangkok',
    'forecast_days' => 1,
]);

$data = http_get_json(
    'https://api.open-meteo.com/v1/forecast?' . $query
);

$current = is_array($data['current'] ?? null)
    ? $data['current']
    : null;

$daily = is_array($data['daily'] ?? null)
    ? $data['daily']
    : null;

if ($current === null || !isset($current['temperature_2m'])) {
    http_response_code(502);

    echo json_encode(
        [
            'ok' => false,
            'error' => 'Wetter derzeit nicht verfügbar.',
        ],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

$code = isset($current['weather_code'])
    ? (int) $current['weather_code']
    : null;

$conditions = [
    0 => 'Klarer Himmel',
    1 => 'Überwiegend klar',
    2 => 'Teilweise bewölkt',
    3 => 'Bewölkt',
    45 => 'Nebel',
    48 => 'Nebel',
    51 => 'Leichter Nieselregen',
    53 => 'Nieselregen',
    55 => 'Starker Nieselregen',
    61 => 'Leichter Regen',
    63 => 'Regen',
    65 => 'Starker Regen',
    80 => 'Regenschauer',
    81 => 'Regenschauer',
    82 => 'Starke Regenschauer',
    95 => 'Gewitter',
    96 => 'Gewitter',
    99 => 'Starkes Gewitter',
];

$condition = $conditions[$code]
    ?? (($code !== null && $code >= 51)
        ? 'Regen möglich'
        : 'Aktuelles Wetter');

$high = isset($daily['temperature_2m_max'][0])
    ? round((float) $daily['temperature_2m_max'][0])
    : round((float) $current['temperature_2m']);

$low = isset($daily['temperature_2m_min'][0])
    ? round((float) $daily['temperature_2m_min'][0])
    : round((float) $current['temperature_2m']);

$precipitation = (float) ($current['precipitation'] ?? 0);
$rain = (float) ($current['rain'] ?? 0);
$showers = (float) ($current['showers'] ?? 0);

echo json_encode(
    [
        'ok' => true,
        'city' => $slug,
        'label' => $city['label'],
        'temperature' => round((float) $current['temperature_2m']),
        'high' => $high,
        'low' => $low,
        'condition' => $condition,
        'weatherCode' => $code,
        'warning' => weather_warning(
            $code,
            $precipitation,
            $rain,
            $showers
        ),
        'time' => $current['time'] ?? null,
    ],
    JSON_UNESCAPED_UNICODE
);