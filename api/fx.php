<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/functions.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: public, max-age=300');

function fetch_thb_rate(string $base): ?array
{
    $sources = [
        'https://api.frankfurter.dev/v1/latest?from=' . rawurlencode($base) . '&to=THB',
        'https://api.frankfurter.app/latest?from=' . rawurlencode($base) . '&to=THB',
        'https://open.er-api.com/v6/latest/' . rawurlencode($base),
    ];

    foreach ($sources as $url) {
        $json = http_get_json($url);
        if ($json === null) continue;
        $rate = $json['rates']['THB'] ?? null;
        if (!is_numeric($rate)) continue;
        $asOf = (string)($json['date'] ?? $json['time_last_update_utc'] ?? '');
        return [(float)$rate, $asOf];
    }
    return null;
}

$rates = [];
$asOf = '';
foreach (['EUR', 'USD', 'CHF'] as $currency) {
    $result = fetch_thb_rate($currency);
    if ($result === null) {
        http_response_code(502);
        echo json_encode(['ok' => false, 'error' => 'Kurs derzeit nicht verfügbar.'], JSON_UNESCAPED_UNICODE);
        exit;
    }
    [$rate, $date] = $result;
    $rates[$currency] = round($rate, 2);
    if ($asOf === '') $asOf = $date;
}

echo json_encode([
    'ok' => true,
    'quote' => 'THB',
    'rates' => $rates,
    'EUR' => $rates['EUR'] ?? null,
    'USD' => $rates['USD'] ?? null,
    'CHF' => $rates['CHF'] ?? null,
    'asOf' => $asOf,
], JSON_UNESCAPED_UNICODE);