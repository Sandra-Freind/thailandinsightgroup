<?php

declare(strict_types=1);

require_once __DIR__ . '/cms.php';

$cms = $cms ?? cms_load();
$ebookSlug = $ebookSlug ?? basename($_SERVER['SCRIPT_NAME'] ?? '', '.php');
$pageName = $ebookSlug . '.php';
$book = null;
foreach ($cms['books'] as $row) {
    if ((string) ($row['page'] ?? '') === $pageName) {
        $book = $row;
        break;
    }
}

if ($book === null) {
    header('Location: ebooks.php');
    exit;
}

$pageTitle = (string) $book['title'];
$pageDescription = (string) ($book['description'] ?? 'E-Book von Thailand Insight.');
$extraCss = ['assets/css/ebook-detail.css?v=1'];
$activeNav = 'ebooks';
require __DIR__ . '/page-start.php';

$chapters = $book['chapters'] ?? [];
$story = trim((string) ($book['story'] ?? $book['description'] ?? ''));
$paras = preg_split("/\n{2,}/", $story) ?: [];
$pdf = (string) ($book['pdf'] ?? '');
$cover = (string) ($book['cover'] ?? '');
$kicker = (string) ($book['kicker'] ?? 'E-Book');
$meta = (string) ($book['meta'] ?? '');
?>
<article class="ebook-detail">
    <div class="ebook-thai-bg" aria-hidden="true"></div>
    <div class="ebook-detail-inner">
        <nav class="ebook-crumb">
            <a href="index.php">Home</a>
            <span>›</span>
            <a href="ebooks.php">E-Books</a>
            <span>›</span>
            <span><?= e((string) $book['title']) ?></span>
        </nav>

        <div class="ebook-detail-grid">
            <aside class="ebook-detail-cover">
                <div class="ebook-cover-frame">
                    <img src="<?= e($cover) ?>" alt="Cover: <?= e((string) $book['title']) ?>">
                </div>
                <?php if ($pdf !== ''): ?>
                    <a class="ebook-dl ebook-dl--gold" href="<?= e($pdf) ?>" download>E-Book herunterladen</a>
                <?php endif; ?>
                <a class="ebook-dl ebook-dl--ghost" href="ebooks.php">Zur Bibliothek</a>
            </aside>

            <div class="ebook-detail-copy">
                <p class="ebook-kicker"><?= e($kicker) ?></p>
                <h1><?= e((string) $book['title']) ?></h1>
                <?php if ($meta !== ''): ?>
                    <p class="ebook-detail-meta"><?= e($meta) ?></p>
                <?php endif; ?>
                <?php foreach ($paras as $para): ?>
                    <p><?= nl2br(e(trim((string) $para))) ?></p>
                <?php endforeach; ?>

                <?php if (is_array($chapters) && $chapters !== []): ?>
                    <h2>Was in diesem E-Book steht</h2>
                    <ol class="ebook-chapters">
                        <?php foreach ($chapters as $chapter): ?>
                            <li><?= e((string) $chapter) ?></li>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>

                <?php if ($pdf !== ''): ?>
                    <p class="ebook-detail-cta">
                        <a class="ebook-dl ebook-dl--gold" href="<?= e($pdf) ?>" download>Jetzt als PDF laden</a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>
<?php require __DIR__ . '/page-end.php'; ?>
