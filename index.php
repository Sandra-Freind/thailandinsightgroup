<?php
declare(strict_types=1);
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/functions.php';
require_once __DIR__.'/includes/nav.php';
$activeNav='home';
$pageTitle='Thailand beginnt dort, wo Reiseführer aufhören';
$pageDescription='Thailand Insight verbindet echte Erfahrungen, Reiseideen, digitale Guides und persönliche Orientierung für Thailand.';
require __DIR__.'/includes/page-start.php';
?>
<div class="home-reference">
<section class="reference-hero" aria-label="Thailand Insight">
  <div class="reference-hero__media"><video data-hero-video autoplay muted loop playsinline preload="metadata" poster="assets/img/hero-poster.jpg"><source src="assets/video/hero-felsen-klar-ohne-streifen.mp4" type="video/mp4"></video></div>
  <div class="reference-hero__copy"><p class="reference-kicker">Mehr als ein Reiseziel</p><h1>Thailand beginnt dort,<br>wo Reiseführer aufhören.</h1><p>Echte Einblicke. Persönliche Erfahrungen. Praktische Tipps.<br>Für alle, die Thailand nicht nur besuchen, sondern wirklich verstehen wollen.</p><div class="reference-actions"><a class="reference-button reference-button--gold" href="ueber-thailand.php">Thailand entdecken <span>→</span></a><a class="reference-button reference-button--outline" href="ebooks.php">Unsere E-Books <span>→</span></a></div></div>
  <button class="reference-video" type="button" data-sound-toggle aria-label="Hero-Video mit Ton abspielen"><i>▶</i><span>Video ansehen<small>Thailand spüren</small></span></button>
</section>
<section class="reference-middle">
  <article class="reference-experience"><div class="reference-experience__copy"><p class="reference-kicker reference-kicker--dark">Erfahrung statt Theorie</p><h2>Mehr als 20 Jahre<br>Thailand – gelebte Erfahrung.</h2><p>Wir teilen unser Wissen, unsere Erlebnisse und echte Einblicke in das Leben, Reisen und Auswandern in Thailand. Ehrlich, fundiert und aus erster Hand.</p><a class="reference-text-link" href="ueber-uns.php">Unsere Geschichte <span>→</span></a></div><img src="assets/img/ebook-hero-photo.jpg" alt="Gemeinsame Thailand-Erfahrung" loading="lazy"></article>
  <article class="reference-destinations"><div class="reference-heading"><div><p class="reference-kicker reference-kicker--dark">Vielfältig. Faszinierend. Einzigartig.</p><h2>Thailand entdecken</h2></div><a class="reference-text-link" href="ueber-thailand.php">Alle Reiseziele <span>→</span></a></div><div class="reference-destination-grid"><a href="bangkok.php"><img src="assets/img/hero-poster.jpg" alt="Bangkok"><span><b>Bangkok</b><small>Moderne Metropole mit Geschichte</small><i>→</i></span></a><a href="norden.php"><img src="assets/img/north-premium.jpg" alt="Nordthailand"><span><b>Nordthailand</b><small>Berge, Kultur und ursprüngliche Natur</small><i>→</i></span></a><a href="sueden-inseln.php"><img src="assets/img/south-premium.jpg" alt="Thailands Inseln"><span><b>Inseln</b><small>Traumstrände für jeden Reisetyp</small><i>→</i></span></a></div></article>
</section>
<section class="reference-bottom">
  <article class="reference-ebooks"><div><p class="reference-kicker">Praxiswissen aus erster Hand</p><h2>Unsere E-Books</h2><p>Geballtes Wissen in digitalen Reiseführern – praktisch, aktuell und mit persönlichen Tipps.</p><a class="reference-button reference-button--gold" href="ebooks.php">Alle E-Books entdecken <span>→</span></a></div><div class="reference-covers"><img src="assets/img/cover-ankommen.jpg" alt="Thailand E-Book"><img src="assets/img/cover-dach.jpg" alt="Nordthailand E-Book"><img src="assets/img/cover-farang.jpg" alt="Leben in Thailand E-Book"></div></article>
  <article class="reference-sandra"><img src="assets/img/sandra-hero-premium.jpg" alt="Sandra – persönliche Thailand-Begleiterin"><div><p class="reference-kicker">Dein persönlicher Thailand Guide</p><h2>Sandra</h2><p>Unsere digitale Begleiterin Sandra beantwortet deine Fragen rund um Thailand – persönlich, zuverlässig und aus echter Erfahrung.</p><a class="reference-button reference-button--gold" href="sandra-app.php">Jetzt Sandra fragen <span>→</span></a></div></article>
  <article class="reference-story"><div><p class="reference-kicker">Ein gemeinsamer Weg</p><h2>Unsere Geschichte</h2><p>Zwei Kulturen. Eine gemeinsame Leidenschaft. Unsere Geschichte über Reisen, Auswandern und ein neues Leben zwischen zwei Welten.</p><a class="reference-button reference-button--gold" href="ueber-uns.php">Unsere ganze Geschichte <span>→</span></a></div><img src="assets/img/ebook-hero-photo.jpg" alt="Unsere deutsch-thailändische Geschichte" loading="lazy"></article>
</section>
</div>
<?php require __DIR__.'/includes/page-end.php';?>
