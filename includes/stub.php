<?php

declare(strict_types=1);

require_once __DIR__ . '/header.php';
?>
<section class="stub">
    <p class="stub-kicker">Thailandinsight Group</p>
    <h1><?= e($stubTitle) ?></h1>
    <p class="stub-lead"><?= e($stubLead) ?></p>
    <p>Hier kommen demnächst die ausführlichen Informationen. Die Verlinkung von der Seite Über Thailand ist bereits aktiv.</p>
    <p style="display:flex;gap:12px;flex-wrap:wrap;margin-top:24px">
        <a class="btn btn-gold" href="ueber-thailand.php">Zurück zu Über Thailand</a>
        <a class="btn btn-gold" href="index.php" style="background:transparent;color:var(--gold);border:1px solid var(--gold)">Zur Startseite</a>
    </p>
</section>
<?php require __DIR__ . '/footer.php'; ?>