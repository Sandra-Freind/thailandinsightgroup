<?php

declare(strict_types=1);

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function nav_icon(string $name): string
{
    return match ($name) {
        'home' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4.5 10.5 12 4l7.5 6.5V20a1 1 0 0 1-1 1h-5v-6h-3v6h-5a1 1 0 0 1-1-1z"/></svg>',
        'info-doc' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3.5h7.2L19 8.2V20a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4.5a1 1 0 0 1 1-1zm7 1.2V8h3.6"/><path d="M9 12h6M9 15.5h6"/></svg>',
        'book' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 4.5h6.2A3.3 3.3 0 0 1 14.5 7.8V20L12 18.2 9.5 20V7.8A3.3 3.3 0 0 1 12.8 4.5H19"/><path d="M12 7.5v10"/></svg>',
        'user' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="3.2"/><path d="M5.8 19.2c.8-3.2 3.2-4.8 6.2-4.8s5.4 1.6 6.2 4.8"/></svg>',
        'mail' => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="6" width="17" height="12" rx="1.6"/><path d="m4.2 7.2 7.8 6.2 7.8-6.2"/></svg>',
        'imprint' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.2"/><path d="M12 10.6V17M12 7.4h.01"/></svg>',
        default => '',
    };
}

function http_get_json(string $url, int $timeout = 8): ?array
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CONNECTTIMEOUT => $timeout,
        CURLOPT_TIMEOUT => $timeout,
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'User-Agent: ThailandinsightGroup/1.0',
        ],
    ]);
    $body = curl_exec($ch);
    $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($body === false || $status >= 400) {
        return null;
    }

    $data = json_decode($body, true);
    return is_array($data) ? $data : null;
}

function http_get_raw(string $url, int $timeout = 8, string $accept = '*/*'): ?string
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CONNECTTIMEOUT => $timeout,
        CURLOPT_TIMEOUT => $timeout,
        CURLOPT_HTTPHEADER => [
            'Accept: ' . $accept,
            'User-Agent: ThailandinsightGroup/1.0',
        ],
    ]);
    $body = curl_exec($ch);
    $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($body === false || $status >= 400) {
        return null;
    }
    return (string) $body;
}

function weather_warning(?int $code, float $precipitation, float $rain, float $showers): ?string
{
    $storm = $code !== null && $code >= 95 && $code <= 99;
    $wetCode = $code !== null && (
        ($code >= 51 && $code <= 67) ||
        ($code >= 80 && $code <= 82) ||
        $storm
    );
    $wet = $wetCode || $precipitation > 0.05 || $rain > 0.05 || $showers > 0.05;

    if ($storm) {
        return 'Gewitter möglich';
    }
    if ($wet) {
        return 'Regen / Gewitter möglich';
    }

    return null;
}