<?php

declare(strict_types=1);

$useSunsetSidebar =
    isset($sidebarSunset)
    && $sidebarSunset === true;
?>

<aside
    class="sidebar<?= $useSunsetSidebar ? ' sidebar--sunset' : '' ?>"
    id="sidebar"
>
    <?php if ($useSunsetSidebar): ?>
        <div
            class="sidebar-sunset-overlay"
            aria-hidden="true"
        ></div>
    <?php endif; ?>

    <div class="sidebar-inner">

        <div class="brand-block">
            <a
                class="brand"
                href="index.php"
                aria-label="<?= e(SITE_NAME) ?>"
            >
                <img
                    class="brand-logo"
                    src="assets/img/logo-sidebar.png?v=5"
                    alt="<?= e(SITE_NAME) ?>"
                    width="115"
                    height="115"
                >
            </a>
        </div>

        <nav
            class="nav"
            aria-label="Hauptnavigation"
        >
            <?php foreach (NAV_ITEMS as $item): ?>
                <?php
                $isActive =
                    ($activePage === $item['id']);
                ?>

                <a
                    class="nav-link<?= $isActive ? ' is-active' : '' ?>"
                    href="<?= e($item['href']) ?>"
                    <?= $isActive ? 'aria-current="page"' : '' ?>
                >
                    <span class="nav-icon">
                        <?= nav_icon($item['icon']) ?>
                    </span>

                    <span class="nav-label">
                        <?= e($item['label']) ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </nav>

        <?php if ($useSunsetSidebar): ?>
            <div
                class="sidebar-vibes sidebar-vibes--sunset"
                aria-label="Good Vibes Good Life"
            >
                <div class="sidebar-vibes-script">
                    Good Vibes<br>
                    Good Life <span>☼</span>
                </div>

                <div class="sidebar-vibes-small">
                    PATTAYA · THAILAND · ALWAYS<br>
                    A GOOD IDEA
                </div>
            </div>
        <?php endif; ?>

    </div>
</aside>

<div
    class="nav-backdrop"
    data-menu-backdrop
    hidden
></div>