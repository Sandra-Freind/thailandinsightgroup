<?php

declare(strict_types=1);

$menuItems = $menuItems ?? site_menu($activeNav ?? '');
?>
    <aside class="home-sidebar" id="homeSidebar" aria-label="Hauptnavigation">
        <div class="sidebar-overlay" aria-hidden="true"></div>
        <div class="sidebar-content">
            <a class="home-brand" href="index.php" aria-label="Thailand Insight Group Startseite">
                <img src="assets/img/logo-sidebar.png" alt="Thailand Insight Group">
            </a>

            <nav class="home-nav">
                <?php foreach ($menuItems as $item): ?>
                    <a class="home-nav-link<?= !empty($item['active']) ? ' is-active' : '' ?>" href="<?= e($item['href']) ?>">
                        <span class="home-nav-icon"><?= home_icon($item['icon']) ?></span>
                        <span><?= e($item['label']) ?></span>
                    </a>
                <?php endforeach; ?>
            </nav>

            <a href="admin/login.php" aria-label="Admin Login" style="position:absolute;right:10px;bottom:8px;font-size:10px;opacity:.28;color:#fff;text-decoration:none">Admin</a>

            <div class="sidebar-vibes" aria-label="Good Vibes Good Life">
                <div class="vibes-script">Good Vibes<br>Good Life <span>☼</span></div>
                <div class="vibes-small">PATTAYA · THAILAND · ALWAYS<br>A GOOD IDEA</div>
            </div>
        </div>
    </aside>
