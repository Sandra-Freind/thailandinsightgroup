<?php

declare(strict_types=1);

function cms_file(): string
{
    return __DIR__ . '/../data/content.json';
}

function cms_defaults(): array
{
    return [
        'site' => [
            'contact_email' => 'info@thailand-insight.com',
            'contact_phone' => '+66 2 123 4567',
        ],
        'travel' => [
            'title' => 'Reiseziele',
            'intro' => 'Entdecken Sie die Vielfalt Thailands – von pulsierenden Städten über atemberaubende Natur bis hin zu tropischen Inseln.',
            'hero_image' => 'assets/img/travel-hero-bangkok.jpg',
            'tat_logo' => 'assets/img/tat-logo.png',
            'section_title' => 'Beliebte Reiseziele',
            'info_title' => 'Reiseinformationen',
            'info_subtitle' => 'Geografie · Klima · Vorbereitung',
            'amazing_title' => 'Amazing Thailand',
            'amazing_line' => 'Always Amazes You',
            'banner_image' => 'assets/img/info-banner.jpg',
            'notice' => 'Aktuelle Einreise- und Sicherheitshinweise erhalten Sie auf den Websites des Auswärtigen Amts und Ihrer Reiseversicherung.',
        ],
        'travel_cards' => [
            ['title' => 'Bangkok', 'subtitle' => 'Zentralthailand', 'image' => 'assets/img/region-bangkok.jpg', 'href' => 'bangkok.php'],
            ['title' => 'Zentralthailand', 'subtitle' => 'Geschichte & Kultur', 'image' => 'assets/img/region-central.jpg', 'href' => 'zentralthailand.php'],
            ['title' => 'Norden', 'subtitle' => 'Natur & Abenteuer', 'image' => 'assets/img/region-north.jpg', 'href' => 'norden.php'],
            ['title' => 'Süden & Inseln', 'subtitle' => 'Strände & Meer', 'image' => 'assets/img/region-south.jpg', 'href' => 'sueden-inseln.php'],
        ],
        'guides' => [
            'geografie' => [
                'label' => 'Geografie',
                'icon' => 'pin',
                'title' => 'Geografie',
                'text' => "Thailand liegt in Südostasien und erstreckt sich über eine Fläche von etwa 513.120 km². Das Land grenzt im Norden an Myanmar und Laos, im Osten an Laos und Kambodscha, im Süden an Malaysia und im Westen an Myanmar. Die langgestreckte Landeszunge reicht vom Hochland des Nordens bis zu den tropischen Inseln des Südens.\n\nDie Geografie Thailands ist vielfältig: Bergige Regionen im Norden, fruchtbare Ebenen im zentralen Tiefland, das Mekong-Plateau im Nordosten sowie traumhafte Küsten und Inseln im Golf von Thailand und der Andamanensee.\n\nDas Klima ist tropisch-monsunal geprägt mit drei Jahreszeiten: einer kühlen Saison (November – Februar), einer heißen Saison (März – Mai) und einer Regenzeit (Juni – Oktober).\nDie beste Reisezeit ist in der kühleren und trockenen Periode.",
            ],
            'reisevorbereitungen' => [
                'label' => 'Reisevorbereitungen',
                'icon' => 'bag',
                'title' => 'Reisevorbereitungen',
                'text' => "Vor der Abreise nach Thailand lohnen sich ein gültiger Reisepass (mindestens sechs Monate über das Einreisedatum hinaus), eine Reisekrankenversicherung und eine erste Unterkunft für die Ankunftstage.\n\nNützlich sind außerdem: digitale Kopien wichtiger Dokumente, eine Kredit- oder Debitkarte, etwas Bargeld in THB für die ersten Stunden, ein Adapter (Typ A/B/C) und eine lokale SIM- oder eSIM-Karte.\n\nVisa-Regeln ändern sich. Prüfe vor der Reise die aktuellen Einreisebestimmungen der Royal Thai Embassy und plane Pufferzeit für Ankunft, Transfer und Erholung nach dem Flug.",
            ],
            'sicherheit' => [
                'label' => 'Sicherheit',
                'icon' => 'shield',
                'title' => 'Sicherheit',
                'text' => "Thailand ist für Reisende in den touristischen Zentren grundsätzlich gut bereisbar. Trotzdem gelten die üblichen Regeln: Wertsachen nicht unbeaufsichtigt lassen, offizielle Taxis oder bekannte Apps nutzen und in der Nacht besonders in unbekannten Gegenden achtsam bleiben.\n\nAchte auf Wetterwarnungen in der Regenzeit, auf Strömungen an manchen Stränden und auf aktuelle Hinweise zu Demonstrationen in Bangkok.\n\nNotrufnummern: 191 Polizei, 1669 medizinischer Notfall, 1155 Tourist Police.",
            ],
            'sprache' => [
                'label' => 'Sprache',
                'icon' => 'chat',
                'title' => 'Sprache',
                'text' => "In Touristenorten wird oft Englisch verstanden. Ein paar thailändische Worte öffnen trotzdem Türen: Sawadee (Hallo), Khob khun (Danke), Aroy (lecker) und Chai / Mai (Ja / Nein).\n\nEine Übersetzungs-App und die thailändische Schrift auf Hausnummern, Speisekarten und Schildern erleichtern den Alltag. Sandra hilft dir zusätzlich bei einfachen Alltagsfragen vor Ort.",
            ],
        ],
        'ebooks' => [
            'breadcrumb' => 'Home  >  Ebooks',
            'title' => 'Ebooks & digitale Guides',
            'intro' => 'Praktisches Wissen. Insider-Tipps. Für deinen Thailand-Alltag. Digital, aktuell und sofort nutzbar.',
            'hero_image' => 'assets/img/ebook-hero-bg.jpg',
            'hero_books' => 'assets/img/ebooks-hero-books.png',
            'section_title' => 'Unsere Ebooks',
            'price_note' => 'Alle Preise inkl. MwSt. · Sofort-Download als PDF & ePub.',
            'radar_title' => 'Insider-Radar',
            'radar_subtitle' => 'Diese Woche in Thailand',
            'more_label' => 'Mehr entdecken',
            'more_href' => 'ueber-thailand.php',
        ],
        'books' => [
            [
                'title' => 'Ankommen in Thailand',
                'description' => 'Dein kompletter Startguide für einen entspannten Neubeginn in Thailand. Visum, Anreise, Unterkünfte, SIM-Karte, Bankkonto und erste Schritte.',
                'meta' => '64 Seiten · PDF & ePub · 9,90 €',
                'cover' => 'assets/img/cover-ankommen.jpg',
                'page' => 'ebook-ankommen.php',
                'pdf' => 'assets/ebooks/ankommen-in-thailand.pdf',
                'button' => 'Vormerken',
                'button2' => '',
                'button2_href' => '',
            ],
            [
                'title' => 'DACH Thailand',
                'description' => 'Alles rund um Visa, Steuern, Banken, Krankenversicherung und Alltag in Thailand – speziell für DACH-Auswanderer.',
                'meta' => '78 Seiten · PDF & ePub · 12,90 €',
                'cover' => 'assets/img/cover-dach.jpg',
                'page' => 'ebook-dach.php',
                'pdf' => 'assets/ebooks/dach-thailand.pdf',
                'button' => 'Vormerken',
                'button2' => '',
                'button2_href' => '',
            ],
            [
                'title' => 'Leben als Farang',
                'description' => 'Kultur verstehen, Beziehungen aufbauen, Alltag meistern und typische Fehler vermeiden – für ein echtes Thailand-Leben.',
                'meta' => '58 Seiten · PDF & ePub · 9,90 €',
                'cover' => 'assets/img/cover-farang.jpg',
                'page' => 'ebook-farang.php',
                'pdf' => 'assets/ebooks/leben-als-farang.pdf',
                'button' => 'Vormerken',
                'button2' => '',
                'button2_href' => '',
            ],
            [
                'title' => 'Mit Sandra unterwegs',
                'description' => 'Sandras persönlicher Guide für digitale Nomaden, Reisende und Langzeitaufenthalter. Mit Routen, Tipps und Lessons learned.',
                'meta' => '72 Seiten · PDF & ePub · 11,90 €',
                'cover' => 'assets/img/cover-sandra.jpg',
                'page' => 'sandra-app.php',
                'pdf' => 'assets/ebooks/mit-sandra-unterwegs.pdf',
                'button' => 'Vormerken',
                'button2' => 'Zu Sandra →',
                'button2_href' => 'sandra-app.php',
            ],
        ],
        'radar' => [
            ['title' => 'Nachtmarkt Bangkok', 'text' => 'Erlebe die lebhaften Garküchen und Lichter der Stadt.', 'image' => 'assets/img/radar-nachtmarkt.jpg', 'href' => 'insider-nachtmarkt.php'],
            ['title' => 'Songkran Preview', 'text' => 'Vorbereitungen für das größte Wasserspektakel.', 'image' => 'assets/img/radar-songkran.jpg', 'href' => 'insider-songkran.php'],
            ['title' => 'Farang Meetup Pattaya', 'text' => 'Netzwerken und Tipps am Strand.', 'image' => 'assets/img/radar-meetup.jpg', 'href' => 'insider-meetup-pattaya.php'],
        ],
        'news' => [
            'title' => 'Nachrichten aus Thailand',
            'intro' => 'Aktuelle Meldungen, Schlagzeilen und Breaking News täglich aktualisiert.',
            'hero_image' => 'assets/img/news-hero-bg.jpg',
            'live_label' => 'LIVE NEWS',
            'more_title' => 'Weitere Meldungen',
            'ticker_title' => 'Sandra News Ticker',
        ],
        'headlines' => [
            [
                'title' => 'Politische Krise in Bangkok eskaliert',
                'image' => 'assets/img/news-card-1.jpg',
                'tag' => 'Schlagzeile',
                'date' => 'Heute',
                'source_label' => 'Quelle',
                'source_url' => 'https://thethaiger.com/',
            ],
            [
                'title' => 'Tourismus boomt auf Phuket',
                'image' => 'assets/img/news-card-2.jpg',
                'tag' => 'Schlagzeile',
                'date' => 'Heute',
                'source_label' => 'Quelle',
                'source_url' => 'https://www.pattayamail.com/',
            ],
            [
                'title' => 'Taifun nähert sich der Küste',
                'image' => 'assets/img/news-card-3.jpg',
                'tag' => 'Schlagzeile',
                'date' => 'Heute',
                'source_label' => 'Quelle',
                'source_url' => 'https://www.bangkokpost.com/',
            ],
        ],
        'ticker' => [
            ['text' => '14:30 Uhr – Neue Tempel-Regeln in Ayutthaya', 'source_label' => 'Quelle: The Thaiger', 'source_url' => 'https://thethaiger.com/'],
            ['text' => '13:15 Uhr – Pattaya App Updates', 'source_label' => 'Quelle: Pattaya Mail', 'source_url' => 'https://www.pattayamail.com/'],
            ['text' => '11:45 Uhr – Farang Tipps für den Sommer', 'source_label' => 'Quelle: Bangkok Post', 'source_url' => 'https://www.bangkokpost.com/'],
        ],
        'sandra' => [
            'eyebrow' => 'Deine Begleiterin in Thailand',
            'title' => 'Sandra',
            'intro' => 'Deine persönliche Begleiterin in Thailand. Praktische Hilfe, lokale Orientierung und einfache Unterstützung für deinen Alltag und deine Reise.',
            'hero_image' => 'assets/img/sandra-home.png',
            'button' => 'Sandra entdecken →',
            'button_href' => '#sandra-info',
            'heading' => 'Mit Sandra unterwegs',
            'body' => 'Sandra ist als praktische digitale Begleiterin für Thailand gedacht: lokale Orientierung, verständliche Hilfe im Alltag, Hinweise zu Orten und Dienstleistungen sowie eine einfache Verbindung zu wichtigen Informationen.',
            'h2_1' => 'Lokale Hilfe',
            'p_1' => 'Finde passende Anlaufstellen, Restaurants, Dienstleistungen und praktische Ziele in deiner Umgebung.',
            'h2_2' => 'Sprache & Orientierung',
            'p_2' => 'Einfach verständliche Unterstützung für Situationen, in denen Sprache oder lokale Abläufe sonst kompliziert werden.',
            'h2_3' => 'Flexibel erweiterbar',
            'p_3' => 'Texte, Bilder, Buttons und Links dieser Seite kannst du später im Admin-Panel anpassen. Das Grunddesign bleibt dabei gesperrt.',
        ],
        'contact' => [
            'title' => 'Kontakt',
            'subtitle' => 'Schreiben Sie uns',
            'name_label' => 'Name',
            'email_label' => 'Email',
            'message_label' => 'Nachricht',
            'button' => 'Senden',
            'success' => 'Vielen Dank. Deine Nachricht wurde gespeichert.',
        ],
        'about' => [
            'eyebrow' => 'Thailand Insight Group',
            'title' => 'Über uns',
            'body' => 'Thailand Insight Group verbindet fundierte Thailand-Informationen, praktische Reisehilfen und digitale Guides. Unser Ziel ist eine klare, elegante und verlässliche Orientierung für Reisende und Menschen, die in Thailand leben oder leben möchten.',
        ],
        'links' => [
            'eyebrow' => 'Service',
            'title' => 'Nützliche Links',
            'body' => 'Wichtige Anlaufstellen und praktische Verbindungen für deinen Aufenthalt in Thailand.',
            'travel_heading' => 'Reise & Aufenthalt',
            'tat_label' => 'Tourism Authority of Thailand',
            'tat_url' => 'https://www.tourismthailand.org/',
            'weather_heading' => 'Wetter',
            'tmd_label' => 'Thai Meteorological Department',
            'tmd_url' => 'https://www.tmd.go.th/',
            'aa_label' => 'Auswärtiges Amt – Thailand',
            'aa_url' => 'https://www.auswaertiges-amt.de/de/service/laender/thailand-node',
        ],
        'legal' => [
            'eyebrow' => 'Rechtliches',
            'title' => 'Impressum AGB Datenschutz',
            'toc' => "1. Impressum\n2. AGB\n3. Datenschutz",
            'imprint_title' => 'Impressum',
            'imprint_body' => 'Angaben gemäß den jeweils anwendbaren gesetzlichen Vorschriften. Die endgültigen Unternehmens-, Vertretungs- und Registrierungsdaten kannst du im Admin-Panel pflegen.',
            'company' => 'Thailand Insight Group Co., Ltd.',
            'address' => "123 Sukhumvit Road\nBangkok 10110\nThailand",
            'terms_title' => 'Allgemeine Geschäftsbedingungen',
            'terms_body' => 'Diese Website stellt Informationen und digitale Inhalte rund um Thailand bereit. Für kostenpflichtige E-Books und digitale Guides gelten die beim jeweiligen Produkt angegebenen Preise und Nutzungsbedingungen. Digitale Inhalte werden nach dem Kauf zum Download bereitgestellt. Ein Widerruf kann nach Beginn des Downloads digitaler Inhalte ausgeschlossen sein, sofern darauf vor dem Kauf hingewiesen wurde. Die endgültigen AGB sollten vor dem Live-Betrieb rechtlich geprüft und an das konkrete Unternehmen angepasst werden.',
            'privacy_title' => 'Datenschutz',
            'privacy_body' => 'Personenbezogene Daten werden nur verarbeitet, soweit dies für den Betrieb der Website, die Bearbeitung von Kontaktanfragen oder die Bereitstellung gebuchter Leistungen erforderlich ist. Kontaktformular-Nachrichten werden auf dem Hosting-Server gespeichert und sind nur im geschützten Admin-Bereich einsehbar. Es kommen Session-Cookies für den Admin-Login zum Einsatz. Die endgültige Datenschutzerklärung muss an Hosting, E-Mail, Zahlungs- und Analysedienste angepasst werden.',
        ],
        'topics' => [
            'bangkok' => ['title' => 'Bangkok', 'image' => 'assets/img/region-bangkok.jpg', 'text' => 'Bangkok verbindet Tempel, Märkte, moderne Stadtviertel und das Leben am Chao Phraya. Wat Arun, der Große Palast, Chinatown und die Skyline am Fluss gehören zu den ersten Stationen – ebenso wie Streetfood, Rooftop-Bars und der Alltag zwischen BTS, Booten und Tuk-Tuks.'],
            'zentralthailand' => ['title' => 'Zentralthailand', 'image' => 'assets/img/region-central.jpg', 'text' => 'Historische Städte, Tempelanlagen und fruchtbare Ebenen prägen das Zentrum Thailands. Ayutthaya und Lopburi erzählen von Königreichen, der Chao Phraya versorgt das Tiefland, und von Bangkok aus sind viele dieser Orte gut erreichbar.'],
            'norden' => ['title' => 'Norden', 'image' => 'assets/img/region-north.jpg', 'text' => 'Berge, Natur, Kultur und traditionsreiche Städte machen den Norden zu einer besonderen Thailand-Region. Chiang Mai, Chiang Rai und die Berglandschaften eignen sich für Tempel, Märkte, Trekking und ein kühleres Klima in den Wintermonaten.'],
            'sueden-inseln' => ['title' => 'Süden & Inseln', 'image' => 'assets/img/region-south.jpg', 'text' => 'Tropische Inseln, Strände und die Küsten am Golf von Thailand und an der Andamanensee. Phuket, Koh Samui, Krabi und die kleineren Inseln stehen für Meer, Felsen, Schnorcheln und lange Abende am Strand.'],
            'klima' => ['title' => 'Klima', 'image' => 'assets/img/info-banner.jpg', 'text' => 'Thailand hat ein tropisches, monsunal geprägtes Klima. Die beste Reisezeit hängt stark von Region und Jahreszeit ab: Der kühle Zeitraum von November bis Februar gilt in vielen Landesteilen als angenehmste Reisezeit, während Regen und Hitze regional sehr unterschiedlich ausfallen.'],
            'ebook-ankommen' => ['title' => 'Ankommen in Thailand', 'image' => 'assets/img/cover-ankommen.jpg', 'text' => 'Der praktische Startguide für die ersten Schritte in Thailand: Visum, Anreise, Unterkunft, SIM-Karte, Bankkonto und Orientierung in den ersten Wochen.'],
            'ebook-dach' => ['title' => 'DACH Thailand', 'image' => 'assets/img/cover-dach.jpg', 'text' => 'Orientierung für Menschen aus Deutschland, Österreich und der Schweiz: Visa, Steuern, Banken, Krankenversicherung und Alltag.'],
            'ebook-farang' => ['title' => 'Leben als Farang', 'image' => 'assets/img/cover-farang.jpg', 'text' => 'Alltag, Kultur und Orientierung für ein Leben in Thailand – mit Hinweisen zu typischen Missverständnissen und einem respektvollen Miteinander.'],
            'insider-nachtmarkt' => ['title' => 'Nachtmarkt Bangkok', 'image' => 'assets/img/radar-nachtmarkt.jpg', 'text' => 'Garküchen, Lichter und das besondere Nachtleben der Stadt. Ein guter Einstieg in Streetfood, Souvenirs und das Abendleben Bangkoks.'],
            'insider-songkran' => ['title' => 'Songkran Preview', 'image' => 'assets/img/radar-songkran.jpg', 'text' => 'Vorbereitung und Tipps rund um das thailändische Neujahrsfest: Wasser, Tempelbesuche, Reisen in der Hochsaison und was du vor Ort erwarten kannst.'],
            'insider-meetup-pattaya' => ['title' => 'Farang Meetup Pattaya', 'image' => 'assets/img/radar-meetup.jpg', 'text' => 'Austausch, Kontakte und praktische Tipps in Pattaya – für Neuankömmlinge, Langzeitgäste und alle, die lokale Orientierung suchen.'],
        ],
    ];
}

function cms_load(): array
{
    $defaults = cms_defaults();
    $file = cms_file();
    if (is_file($file)) {
        $json = json_decode((string) file_get_contents($file), true);
        if (is_array($json)) {
            $defaults = array_replace_recursive($defaults, $json);
        }
    }
    return $defaults;
}

function cms_save(array $data): bool
{
    $dir = dirname(cms_file());
    if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
        return false;
    }
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    return file_put_contents(cms_file(), $json, LOCK_EX) !== false;
}

function cms_set_path(array &$data, string $path, string $value): void
{
    $parts = explode('.', $path);
    $ref = &$data;
    foreach ($parts as $part) {
        if (!isset($ref[$part]) || !is_array($ref[$part])) {
            $ref[$part] = [];
        }
        $ref = &$ref[$part];
    }
    $ref = $value;
}

function cms_get_path(array $data, string $path, mixed $fallback = null): mixed
{
    $ref = $data;
    foreach (explode('.', $path) as $part) {
        if (!is_array($ref) || !array_key_exists($part, $ref)) {
            return $fallback;
        }
        $ref = $ref[$part];
    }
    return $ref;
}

function cms_remove_path(array &$data, string $path): void
{
    $parts = explode('.', $path);
    $last = array_pop($parts);
    $ref = &$data;
    foreach ($parts as $part) {
        if (!isset($ref[$part]) || !is_array($ref[$part])) {
            return;
        }
        $ref = &$ref[$part];
    }
    if ($last !== null) {
        unset($ref[$last]);
    }
}

function cms_normalize_lists(array &$data): void
{
    foreach (['travel_cards', 'books', 'headlines', 'ticker', 'radar'] as $key) {
        if (isset($data[$key]) && is_array($data[$key])) {
            $data[$key] = array_values($data[$key]);
        }
    }
}
