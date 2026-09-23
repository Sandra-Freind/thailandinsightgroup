<?php
$activeNav = 'ebooks';
$pageTitle = 'Ebooks & digitale Guides';
$pageDescription = 'Digitale Thailand-Guides und E-Books von Thailand Insight.';
$extraCss = ['assets/css/ebooks-page.css?v=5'];
require __DIR__ . '/includes/page-start.php';
$ebooks = $cms['ebooks'];
?>
<div class="ebooks-page">
    <section class="ebooks-hero">
        <div class="ebooks-hero-overlay"></div>
        <div class="ebooks-hero-content">
            <div class="ebooks-breadcrumb">
                <a href="index.php">Home</a>
                <span>&gt;</span>
                <span>Ebooks</span>
            </div>
            <h1><?= e($ebooks['title']) ?></h1>
            <p><?= e($ebooks['intro']) ?></p>
        </div>
        <div class="ebooks-hero-books">
            <img src="<?= e($ebooks['hero_books']) ?>" alt="Thailand E-Books">
        </div>
    </section>

    <section class="ebooks-library">
        <div class="ebooks-section-heading">
            <h2><?= e($ebooks['section_title']) ?></h2>
            <p><?= e($ebooks['price_note']) ?></p>
        </div>

        <?php foreach ($cms['books'] as $book): ?>
            <article class="ebook-row">
                <a class="ebook-cover" href="<?= e($book['page']) ?>">
                    <img src="<?= e($book['cover']) ?>" alt="<?= e($book['title']) ?>">
                </a>
                <div class="ebook-information">
                    <?php if (!empty($book['kicker'])): ?>
                        <p class="ebook-row-kicker"><?= e($book['kicker']) ?></p>
                    <?php endif; ?>
                    <h3><a href="<?= e($book['page']) ?>"><?= e($book['title']) ?></a></h3>
                    <p><?= e($book['description']) ?></p>
                    <div class="ebook-meta"><span>▣</span> <?= e($book['meta']) ?></div>
                </div>
                <div class="ebook-actions">
                    <a class="ebook-button ebook-button--gold" href="<?= e($book['page']) ?>">Zum E-Book</a>
                    <?php if (!empty($book['pdf'])): ?>
                        <a class="ebook-button ebook-button--red" href="<?= e($book['pdf']) ?>" download>Download</a>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </section>

    <section class="ebooks-insider">
        <div class="ebooks-section-heading ebooks-section-heading--left">
            <h2><?= e($ebooks['radar_title']) ?></h2>
            <p><?= e($ebooks['radar_subtitle']) ?></p>
        </div>
        <div class="ebooks-insider-grid">
            <?php foreach ($cms['radar'] as $item): ?>
                <a class="insider-card" href="<?= e($item['href']) ?>">
                    <img src="<?= e($item['image']) ?>" alt="<?= e($item['title']) ?>">
                    <div class="insider-card-overlay"></div>
                    <div class="insider-card-content">
                        <h3><?= e($item['title']) ?></h3>
                        <p><?= e($item['text']) ?></p>
                        <span></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <a class="ebooks-more-button" href="<?= e($ebooks['more_href']) ?>"><?= e($ebooks['more_label']) ?></a>
    </section>
</div>
<?php require __DIR__ . '/includes/page-end.php'; ?>
