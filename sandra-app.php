<?php $activeNav = 'sandra'; $pageTitle = 'Sandra'; $pageDescription = 'Sandra – deine Begleiterin in Thailand.'; require __DIR__.'/includes/page-start.php'; $s = $cms['sandra']; ?>
<section class="sandra-hero">
    <img class="hero-photo" src="<?= e($s['hero_image']) ?>" alt="Sandra">
    <div class="sandra-hero-copy">
        <div class="eyebrow"><?= e($s['eyebrow']) ?></div>
        <h1><?= e($s['title']) ?></h1>
        <p><?= e($s['intro']) ?></p>
        <p class="btn-row"><a class="gold-btn" href="<?= e($s['button_href']) ?>"><?= e($s['button']) ?></a></p>
    </div>
</section>
<section class="sandra-body" id="sandra-info">
    <h1><?= e($s['heading']) ?></h1>
    <p><?= e($s['body']) ?></p>
    <h2><?= e($s['h2_1']) ?></h2>
    <p><?= e($s['p_1']) ?></p>
    <h2><?= e($s['h2_2']) ?></h2>
    <p><?= e($s['p_2']) ?></p>
    <h2><?= e($s['h2_3']) ?></h2>
    <p><?= e($s['p_3']) ?></p>
</section>
<?php require __DIR__.'/includes/page-end.php'; ?>
