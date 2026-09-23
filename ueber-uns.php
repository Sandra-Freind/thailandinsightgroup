<?php $activeNav = 'about'; $pageTitle = 'Über uns'; require __DIR__.'/includes/page-start.php'; $a = $cms['about']; ?>
<section class="simple-page">
    <div class="eyebrow"><?= e($a['eyebrow']) ?></div>
    <h1><?= e($a['title']) ?></h1>
    <hr class="gold-line">
    <p><?= e($a['body']) ?></p>
</section>
<?php require __DIR__.'/includes/page-end.php'; ?>
