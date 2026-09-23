<?php $activeNav = 'links'; $pageTitle = 'Nützliche Links'; require __DIR__.'/includes/page-start.php'; $l = $cms['links']; ?>
<section class="simple-page">
    <div class="eyebrow"><?= e($l['eyebrow']) ?></div>
    <h1><?= e($l['title']) ?></h1>
    <hr class="gold-line">
    <p><?= e($l['body']) ?></p>
    <h2><?= e($l['travel_heading']) ?></h2>
    <p class="links-list"><a href="<?= e($l['tat_url']) ?>" target="_blank" rel="noopener"><?= e($l['tat_label']) ?></a></p>
    <?php if (!empty($l['aa_url'])): ?>
        <p class="links-list"><a href="<?= e($l['aa_url']) ?>" target="_blank" rel="noopener"><?= e($l['aa_label']) ?></a></p>
    <?php endif; ?>
    <h2><?= e($l['weather_heading']) ?></h2>
    <p class="links-list"><a href="<?= e($l['tmd_url']) ?>" target="_blank" rel="noopener"><?= e($l['tmd_label']) ?></a></p>
</section>
<?php require __DIR__.'/includes/page-end.php'; ?>
