<?php

declare(strict_types=1);

$guides = $cms['guides'] ?? [];
$guideKeys = ['geografie', 'reisevorbereitungen', 'sicherheit', 'sprache'];
$currentGuide = $currentGuide ?? 'geografie';
if (!isset($guides[$currentGuide])) {
    $currentGuide = 'geografie';
}
$guide = $guides[$currentGuide];
$travel = $cms['travel'];
?>
<section class="travel-hero" aria-label="<?= e($travel['title']) ?>">
    <img class="hero-photo" src="<?= e($travel['hero_image']) ?>" alt="">
    <?php if (!empty($travel['tat_logo'])): ?>
        <img class="tat-badge" src="<?= e($travel['tat_logo']) ?>" alt="Tourism Authority of Thailand">
    <?php endif; ?>
    <div class="travel-hero-copy">
        <h1><?= e($travel['title']) ?></h1>
        <div class="gold-rule" aria-hidden="true"></div>
        <p><?= e($travel['intro']) ?></p>
    </div>
</section>

<section class="section-pad">
    <h2><?= e($travel['section_title']) ?></h2>
    <div class="travel-grid">
        <?php foreach ($cms['travel_cards'] as $card): ?>
            <a class="travel-card" href="<?= e($card['href']) ?>">
                <img src="<?= e($card['image']) ?>" alt="<?= e($card['title']) ?>">
                <div>
                    <h3><?= e($card['title']) ?></h3>
                    <p><?= e($card['subtitle']) ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<section class="info-banner">
    <img src="<?= e($travel['banner_image']) ?>" alt="">
    <div class="info-banner-copy">
        <h2><?= e($travel['info_title']) ?></h2>
        <p><?php
            $parts = preg_split('/\s*·\s*/u', (string) $travel['info_subtitle']);
            $out = [];
            foreach ($parts as $i => $part) {
                $out[] = $i === 1 ? '<span>' . e($part) . '</span>' : e($part);
            }
            echo implode(' · ', $out);
        ?></p>
    </div>
    <div class="amazing">
        <strong><?= e($travel['amazing_title']) ?></strong>
        <small><?= e($travel['amazing_line']) ?></small>
    </div>
</section>

<nav class="travel-tabs" aria-label="Reiseinformationen">
    <?php foreach ($guideKeys as $key): ?>
        <?php $item = $guides[$key] ?? null; if (!$item) continue; ?>
        <a class="<?= $currentGuide === $key ? 'is-active' : '' ?>" href="<?= e($key) ?>.php">
            <?= tab_icon((string) ($item['icon'] ?? 'pin')) ?>
            <?= e($item['label']) ?>
        </a>
    <?php endforeach; ?>
</nav>

<article class="article-block">
    <h2><?= e($guide['title']) ?></h2>
    <?php foreach (preg_split("/\n{2,}/", trim((string) $guide['text'])) as $para): ?>
        <p><?= nl2br(e($para)) ?></p>
    <?php endforeach; ?>
</article>

<?php if (!empty($travel['notice'])): ?>
    <div class="notice-box">
        <span>i</span>
        <p><?= e($travel['notice']) ?></p>
    </div>
<?php endif; ?>
