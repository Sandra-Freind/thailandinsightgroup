<?php
$activeNav = '';
$pageTitle = 'Impressum AGB Datenschutz';
$pageDescription = 'Impressum, AGB und Datenschutzerklärung der Thailand Insight Group.';
require __DIR__ . '/includes/page-start.php';
$l = $cms['legal'];
?>
<section class="legal-page">
    <div class="eyebrow"><?= e($l['eyebrow']) ?></div>
    <h1><?= e($l['title']) ?></h1>
    <hr class="gold-line">
    <p class="toc"><?= nl2br(e($l['toc'])) ?></p>

    <h2 id="impressum"><?= e($l['imprint_title']) ?></h2>
    <p><?= e($l['imprint_body']) ?></p>
    <div class="address-box">
        <div class="eyebrow">Address</div>
        <p><strong><?= e($l['company']) ?></strong><br><?= nl2br(e($l['address'])) ?></p>
    </div>

    <h2 id="agb"><?= e($l['terms_title']) ?></h2>
    <p><?= e($l['terms_body']) ?></p>

    <h2 id="datenschutz"><?= e($l['privacy_title']) ?></h2>
    <p><?= e($l['privacy_body']) ?></p>
</section>
<?php require __DIR__ . '/includes/page-end.php'; ?>
