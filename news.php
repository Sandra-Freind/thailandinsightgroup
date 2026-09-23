<?php
$activeNav = 'news';
$pageTitle = 'Nachrichten aus Thailand';
$pageDescription = 'Aktuelle Nachrichten, Schlagzeilen und Ticker aus Thailand.';
require __DIR__ . '/includes/page-start.php';
$news = $cms['news'];
?>
<section class="news-hero">
    <img class="hero-photo" src="<?= e($news['hero_image']) ?>" alt="">
    <div class="news-hero-copy">
        <h1><?= e($news['title']) ?></h1>
    </div>
</section>

<div class="news-lead">
    <p><?= e($news['intro']) ?></p>
    <span class="live-pill"><?= e($news['live_label']) ?></span>
</div>

<div class="news-stack">
    <?php foreach ($cms['headlines'] as $h): ?>
        <article class="headline">
            <img src="<?= e($h['image']) ?>" alt="">
            <span class="tag"><?= e($h['tag']) ?></span>
            <div class="txt">
                <span class="date"><?= e($h['date']) ?></span>
                <h3><?= e($h['title']) ?></h3>
                <a class="quelle" href="<?= e($h['source_url']) ?>" <?= str_starts_with((string) $h['source_url'], 'http') ? 'target="_blank" rel="noopener"' : '' ?>>▣ <?= e($h['source_label']) ?></a>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<section class="ticker">
    <h2><?= e($news['more_title']) ?></h2>
    <h3><?= e($news['ticker_title']) ?></h3>
    <?php foreach ($cms['ticker'] as $t): ?>
        <div class="tick">
            <span><?= e($t['text']) ?></span>
            <a href="<?= e($t['source_url']) ?>" <?= str_starts_with((string) $t['source_url'], 'http') ? 'target="_blank" rel="noopener"' : '' ?>><?= e($t['source_label']) ?></a>
        </div>
    <?php endforeach; ?>
</section>
<?php require __DIR__ . '/includes/page-end.php'; ?>
