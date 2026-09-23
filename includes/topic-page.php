<?php
declare(strict_types=1);
require_once __DIR__ . '/cms.php';
require_once __DIR__ . '/nav.php';

$topicKey = $topicKey ?? basename($_SERVER['SCRIPT_NAME'] ?? '', '.php');
$cms = $cms ?? cms_load();
$topic = $cms['topics'][$topicKey] ?? [
    'title' => 'Thailand Insight',
    'image' => 'assets/img/region-south.jpg',
    'text' => 'Weitere Inhalte zu Thailand.',
];
$pageTitle = $topic['title'];
$activeNav = $activeNav ?? '';
require __DIR__ . '/page-start.php';
?>
<section class="topic-hero">
    <img class="hero-photo" src="<?= e($topic['image']) ?>" alt="">
    <div class="topic-hero-copy">
        <h1><?= e($topic['title']) ?></h1>
        <div class="gold-rule" aria-hidden="true"></div>
    </div>
</section>
<section class="topic-body">
    <?php foreach (preg_split("/\n{2,}/", trim((string) $topic['text'])) as $para): ?>
        <p><?= nl2br(e($para)) ?></p>
    <?php endforeach; ?>
    <p class="btn-row">
        <a class="gold-btn" href="ueber-thailand.php">Zum Reiseführer</a>
        <a class="pink-btn" href="index.php">Zur Startseite</a>
    </p>
</section>
<?php require __DIR__ . '/page-end.php'; ?>
