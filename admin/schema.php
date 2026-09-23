<?php

declare(strict_types=1);

return [
    'site' => ['label' => 'Kontaktdaten', 'description' => 'E-Mail und Telefon, wie sie auf der Kontaktseite erscheinen.'],
    'travel' => ['label' => 'Reiseziele – Hauptinhalt', 'description' => 'Hero, Überschriften und Hinweisbox. Das Layout bleibt geschützt.'],
    'travel_cards' => ['label' => 'Reiseziele – Karten', 'description' => 'Die vier Regionskarten mit Bild, Text und Link.', 'repeatable' => true, 'template' => ['title' => 'Neues Reiseziel', 'subtitle' => '', 'image' => 'assets/img/region-bangkok.jpg', 'href' => 'bangkok.php']],
    'guides' => ['label' => 'Reiseinformationen (Tabs)', 'description' => 'Texte hinter den Tabs Geografie, Reisevorbereitungen, Sicherheit und Sprache.'],
    'ebooks' => ['label' => 'E-Books – Hauptinhalt', 'description' => 'Hero, Überschriften und Insider-Radar-Beschriftungen.'],
    'books' => ['label' => 'E-Books verwalten', 'description' => 'Titel, Beschreibung, Cover, PDF, Buttons und Zielseite.', 'repeatable' => true, 'template' => ['title' => 'Neues E-Book', 'description' => '', 'meta' => '', 'cover' => '', 'page' => 'ebooks.php', 'pdf' => '', 'button' => 'Vormerken', 'button2' => '', 'button2_href' => '']],
    'radar' => ['label' => 'Insider-Radar', 'description' => 'Die drei Karten unterhalb der E-Books.', 'repeatable' => true, 'template' => ['title' => 'Neuer Insider-Tipp', 'text' => '', 'image' => '', 'href' => 'ebooks.php']],
    'news' => ['label' => 'Nachrichten – Hauptinhalt', 'description' => 'Titel, Einleitung und Ticker-Beschriftungen.'],
    'headlines' => ['label' => 'Nachrichtenbeiträge', 'description' => 'Große Schlagzeilen mit Bild, Datum und Quellenlink.', 'repeatable' => true, 'template' => ['title' => 'Neue Meldung', 'image' => '', 'tag' => 'Schlagzeile', 'date' => 'Heute', 'source_label' => 'Quelle', 'source_url' => '#']],
    'ticker' => ['label' => 'News-Ticker', 'description' => 'Kurze Meldungen unter „Weitere Meldungen“.', 'repeatable' => true, 'template' => ['text' => 'Neue Tickermeldung', 'source_label' => 'Quelle', 'source_url' => '#']],
    'sandra' => ['label' => 'Sandra', 'description' => 'Texte, Bild, Button und Link der Sandra-Seite.'],
    'contact' => ['label' => 'Kontaktseite', 'description' => 'Beschriftungen des Kontaktformulars.'],
    'about' => ['label' => 'Über uns', 'description' => 'Inhalt der Seite „Über uns“.'],
    'links' => ['label' => 'Nützliche Links', 'description' => 'Texte und Linkziele.'],
    'legal' => ['label' => 'Impressum, AGB und Datenschutz', 'description' => 'Rechtliche Texte und Adresse.'],
    'topics' => ['label' => 'Detail- und Themenseiten', 'description' => 'Texte und Bilder der Regionen-, Insider- und E-Book-Seiten.'],
];
