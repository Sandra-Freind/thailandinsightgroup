<?php

declare(strict_types=1);

function home_icon(string $name): string
{
    return match ($name) {
        'home' => '<svg viewBox="0 0 24 24"><path d="M3 11.2 12 3l9 8.2"/><path d="M5.2 10.2V21h5.1v-6h3.4v6h5.1V10.2"/></svg>',
        'grid' => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>',
        'book' => '<svg viewBox="0 0 24 24"><path d="M3.5 5.5c3.2-1.2 5.7-.7 8.5 1.4v12c-2.8-2.1-5.3-2.6-8.5-1.4z"/><path d="M20.5 5.5c-3.2-1.2-5.7-.7-8.5 1.4v12c2.8-2.1 5.3-2.6 8.5-1.4z"/></svg>',
        'news' => '<svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h6M7 12h10M7 16h10M16 8h1"/></svg>',
        'map' => '<svg viewBox="0 0 24 24"><path d="m3 5 6-2 6 2 6-2v16l-6 2-6-2-6 2z"/><path d="M9 3v16M15 5v16"/></svg>',
        'magazine' => '<svg viewBox="0 0 24 24"><path d="M4 4h7c2 0 3 1 3 3v13c-1.2-1.5-2.3-2-4.4-2H4z"/><path d="M20 4h-5.7C12.8 4 12 5 12 7v13c1.2-1.5 2.3-2 4.4-2H20z"/></svg>',
        'chat' => '<svg viewBox="0 0 24 24"><rect x="3" y="4" width="15" height="11" rx="2"/><path d="m8 15-3 4v-4M20 8v9a2 2 0 0 1-2 2h-6l-3 2v-2"/></svg>',
        'cloud' => '<svg viewBox="0 0 24 24"><path d="M6.5 18h10.8a4 4 0 0 0 .5-8A6 6 0 0 0 6.4 8.7 4.7 4.7 0 0 0 6.5 18z"/></svg>',
        'exchange' => '<svg viewBox="0 0 24 24"><path d="M4 7h14l-3-3M20 17H6l3 3"/><path d="m18 7-3 3M6 17l3-3"/></svg>',
        'link' => '<svg viewBox="0 0 24 24"><path d="m9 15-2 2a4 4 0 0 1-6-6l4-4a4 4 0 0 1 6 0"/><path d="m15 9 2-2a4 4 0 0 1 6 6l-4 4a4 4 0 0 1-6 0"/><path d="m8 16 8-8"/></svg>',
        'info' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 10v7M12 7h.01"/></svg>',
        'mail' => '<svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg>',
        default => '',
    };
}

function site_menu(string $activeId = ''): array
{
    $items = [
        ['id' => 'home', 'label' => 'Home', 'href' => 'index.php', 'icon' => 'home'],
        ['id' => 'travel', 'label' => 'Thailand', 'href' => 'ueber-thailand.php', 'icon' => 'map'],
        ['id' => 'destinations', 'label' => 'Reiseziele', 'href' => 'ueber-thailand.php#reiseziele', 'icon' => 'map'],
        ['id' => 'news', 'label' => 'News', 'href' => 'news.php', 'icon' => 'news'],
        ['id' => 'ebooks', 'label' => 'E-Books', 'href' => 'ebooks.php', 'icon' => 'book'],
        ['id' => 'sandra', 'label' => 'Sandra', 'href' => 'sandra-app.php', 'icon' => 'chat'],
        ['id' => 'about', 'label' => 'Über uns', 'href' => 'ueber-uns.php', 'icon' => 'info'],
        ['id' => 'contact', 'label' => 'Kontakt', 'href' => 'kontakt.php', 'icon' => 'mail'],
    ];

    foreach ($items as &$item) {
        $item['active'] = ($item['id'] === $activeId);
    }
    unset($item);

    return $items;
}

function tab_icon(string $name): string
{
    return match ($name) {
        'pin' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.4"/></svg>',
        'bag' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 8V7a5 5 0 0 1 10 0v1"/><rect x="4" y="8" width="16" height="12" rx="2"/></svg>',
        'shield' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.2 8.4 7 9.5 3.8-1.1 7-4.5 7-9.5V6z"/></svg>',
        'chat' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 6h14v9H8l-3 3z"/></svg>',
        default => '',
    };
}
