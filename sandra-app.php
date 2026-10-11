<?php declare(strict_types=1);$activeNav='sandra';$pageTitle='Sandra – deine persönliche Begleiterin';$pageDescription='Sandra hilft Reisenden und Residenten in Pattaya mit wenigen passenden Vorschlägen und einem Audio-Dolmetscher.';require __DIR__.'/includes/page-start.php';?>
<style>
/* The campaign artwork supplies all hero copy; show it uncropped. */
body:has(.sandra-campaign-hero) .site-header{position:relative;background:#03181c}
.sandra-campaign-hero{position:relative;width:100%;background:#062c54}
.sandra-campaign-hero__link{display:block}
.sandra-campaign-hero__image{display:block;width:100%;height:auto}
.sandra-campaign-hero__logo{position:absolute;top:2%;right:2%;width:clamp(42px,5vw,84px);height:auto;filter:drop-shadow(0 2px 5px rgba(0,0,0,.65));pointer-events:none}

/* Full-width Sandra explanation, same panoramic height as the hero. */
#funktionen.sandra-experience{container-type:inline-size;display:grid;grid-template-columns:56% 44%;aspect-ratio:1983/793;padding:0;gap:0;align-items:stretch;background:linear-gradient(90deg,rgba(2,31,53,.52) 0%,rgba(2,31,53,.6) 52%,transparent 68%),#043354 url("assets/img/sandra-experience.webp") center/cover no-repeat;color:#fff}
.sandra-experience__copy{padding:2.2cqw 0 2cqw 5.8cqw;align-self:center}
.sandra-experience__eyebrow{margin:0 0 .6cqw;color:#35e1ec;font-size:.72cqw;line-height:1.3;font-weight:700;letter-spacing:.2em;text-transform:uppercase}
#funktionen .sandra-experience__copy h2{margin:0;font:600 2.65cqw/1.06 "Segoe UI",Arial,sans-serif;letter-spacing:-.025em}
.sandra-experience__copy h2 span{color:#35e1ec}
.sandra-experience__lead{margin:.75cqw 0 .6cqw;font-size:1.3cqw;line-height:1.25}
.sandra-experience__intro{margin:0 0 .8cqw;max-width:47cqw;font-size:.9cqw;line-height:1.5}
.sandra-experience__features article{display:flex;gap:1.5cqw;padding:.75cqw 0;border-bottom:1px solid rgba(167,229,240,.4);max-width:45cqw}
.sandra-experience__features article:last-child{border-bottom:0}
.sandra-experience__features svg{flex:0 0 2.3cqw;width:2.3cqw;height:2.3cqw;margin-top:.25cqw;stroke:#35e1ec;fill:none;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round}
#funktionen .sandra-experience__features h3{margin:0 0 .25cqw;font:600 1.1cqw/1.3 "Segoe UI",Arial,sans-serif}
.sandra-experience__features p{margin:0;font-size:.88cqw;line-height:1.45;color:#f2f8ff}
.sandra-experience__action{display:flex;align-items:center;gap:1.5cqw;margin-top:.9cqw}
.sandra-experience__action a{display:inline-flex;gap:1.8cqw;align-items:center;background:#ff665b;color:#fff;border-radius:99px;padding:.65cqw 1.6cqw;font-size:1cqw;font-weight:600}
.sandra-experience__action a:hover{background:#ed5048}
.sandra-experience__action p{margin:0;padding-left:1.5cqw;border-left:1px solid rgba(255,255,255,.4);font-size:.8cqw;line-height:1.4}
.sandra-experience__video{margin:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:.7cqw;padding:1.8cqw 9cqw 1.8cqw 2cqw;min-height:0}
.sandra-experience__video video{height:32cqw;width:auto;max-width:100%;aspect-ratio:464/688;object-fit:contain;background:#071b29;border:2px solid rgba(255,255,255,.9);border-radius:.8cqw;box-shadow:0 16px 40px rgba(0,20,35,.35)}
.sandra-experience__video figcaption{text-align:center;font-size:1.1cqw;font-weight:600;text-shadow:0 1px 5px #002e49!important}
@media(max-width:760px){
#funktionen.sandra-experience{aspect-ratio:auto;grid-template-columns:1fr;background-position:65% center}
.sandra-experience__copy{padding:30px 24px;background:rgba(1,32,57,.9)}
.sandra-experience__eyebrow{font-size:10px;margin-bottom:10px}
#funktionen .sandra-experience__copy h2{font-size:32px}
.sandra-experience__lead{font-size:18px;margin:14px 0 10px}
.sandra-experience__intro{font-size:14px;max-width:none;margin-bottom:14px}
.sandra-experience__features article{max-width:none;gap:14px;padding:14px 0}
.sandra-experience__features svg{flex-basis:28px;width:28px;height:28px}
#funktionen .sandra-experience__features h3{font-size:16px;margin-bottom:6px}
.sandra-experience__features p{font-size:14px}
.sandra-experience__action{gap:15px;margin-top:18px;flex-wrap:wrap}
.sandra-experience__action a{font-size:14px;padding:12px 20px;gap:20px}
.sandra-experience__action p{font-size:12px;padding-left:14px}
.sandra-experience__video{padding:28px 24px;gap:12px}
.sandra-experience__video video{width:min(100%,280px);height:auto;border-radius:12px}
.sandra-experience__video figcaption{font-size:16px}
}

.sandra-regions-art{position:relative;width:100%;aspect-ratio:1983/793;background:#032238;overflow:hidden}
.sandra-regions-art>img{display:block;width:100%;height:auto}
.sandra-regions-art__cta{position:absolute;left:70.8%;top:84.6%;width:19%;height:8.5%;border-radius:99px}
.sandra-regions-art__cta:hover{background:rgba(255,255,255,.12)}
.sandra-regions-art__cta:focus-visible{outline:3px solid #fff;outline-offset:3px}
.sandra-nightmarket{position:relative;width:100%;aspect-ratio:1983/793;background:#052343;overflow:hidden}
.sandra-nightmarket>img{display:block;width:100%;height:auto}
.sandra-nightmarket__cta{position:absolute;left:55.2%;top:51.6%;width:21.4%;height:6.8%;border-radius:99px}
.sandra-nightmarket__cta:hover{background:rgba(255,255,255,.12)}
.sandra-nightmarket__cta:focus-visible{outline:3px solid #fff;outline-offset:3px}
</style>
<section class="sandra-campaign-hero" aria-label="Sandra – deine persönliche Begleiterin für Urlaub und Alltag in Thailand">
<a class="sandra-campaign-hero__link" href="#funktionen" aria-label="Sandra entdecken: Orte finden, Deutsch und Thai mit Stimme übersetzen und Hilfe im Alltag erhalten">
<img class="sandra-campaign-hero__image" src="assets/img/sandra-hero-refined.webp" width="1983" height="793" fetchpriority="high" alt="Sandra. Mehr Thailand. Deine Sandra. Deine persönliche Begleiterin für Urlaub und Alltag. Orte finden, die zu dir passen. Deutsch und Thai mit Spracheingabe und Sprachausgabe. Hilfe und Tipps für deinen Alltag. Du fragst. Sandra hilft.">
</a>
<img class="sandra-campaign-hero__logo" src="assets/img/logo-sidebar.png" alt="Thailand Insight Group">
</section>
<section id="funktionen" class="sandra-experience" aria-labelledby="sandra-experience-title">
<div class="sandra-experience__copy">
<p class="sandra-experience__eyebrow">Dein Thailand. Deine Begleiterin.</p>
<h2 id="sandra-experience-title">Weniger suchen.<br><span>Mehr verstehen.</span></h2>
<p class="sandra-experience__lead">Sandra hilft dir, dich in Thailand zurechtzufinden.</p>
<p class="sandra-experience__intro">Ob im Urlaub oder im Alltag: Frag Sandra per Text oder Sprache. Sie hilft dir, passende Orte zu finden, dich zu verständigen und den nächsten Schritt zu planen.</p>
<div class="sandra-experience__features">
<article><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg><div><h3>Finde, was du wirklich brauchst.</h3><p>Ärzte, Restaurants, Dienstleistungen oder Ausflüge: Sandra fragt nach deinem Anliegen und deinem Standort und nennt dir bis zu drei passende Vorschläge.</p></div></article>
<article><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3h15v12H8l-5 4V3Zm6 16h9l4 3V9h-1"/></svg><div><h3>Verständige dich auf Deutsch und Thai.</h3><p>Sprich in deiner Sprache und höre die Übersetzung. Der Dolmetscher funktioniert in beide Richtungen – mit Spracheingabe und Sprachausgabe.</p></div></article>
<article><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="7" r="4"/><path d="M4 22v-3a8 8 0 0 1 16 0v3H4Z"/></svg><div><h3>Bekomme Hilfe, die zu dir passt.</h3><p>Sandra fragt nach, berücksichtigt deine Situation und gibt dir praktische Tipps für deinen Aufenthalt. Wie eine gute Freundin, die mitdenkt.</p></div></article>
</div>
<div class="sandra-experience__action"><a href="kontakt.php">Lerne Sandra kennen <span aria-hidden="true">→</span></a><p>Für Urlauber und Menschen,<br>die hier leben.</p></div>
</div>
<figure class="sandra-experience__video">
<video controls playsinline preload="metadata" poster="assets/video/sandra-comic-szene-fertig-poster.jpg" aria-label="Sandra im Alltag – Erklärvideo"><source src="assets/video/sandra-comic-szene-fertig.mp4" type="video/mp4"></video>
<figcaption>Sieh dir an, wie Sandra hilft.</figcaption>
</figure>
</section>
<section id="pattaya-gebiete" class="sandra-regions-art" aria-label="Wo du bist, macht den Unterschied – Sandra in Pattaya">
<img src="assets/img/sandra-pattaya-regions.webp" width="1983" height="793" loading="lazy" alt="Stilisierte Pattaya-Übersicht mit Naklua, Wongamat, Central Pattaya, Pratumnak, Jomtien und Darkside / East Pattaya. Wo du bist, macht den Unterschied. Sandra berücksichtigt dein Gebiet und fragt nach, was dir wichtig ist. Gesprächsbeispiel: Du suchst ein Restaurant am Meer; Sandra fragt nach deinem Gebiet, zum Beispiel Jomtien oder Wongamat. Du antwortest: In Jomtien, möglichst ruhig. So bekommst du bis zu drei passende Vorschläge für deine Umgebung.">
<a class="sandra-regions-art__cta" href="kontakt.php" aria-label="Entdecke deine Sandra"></a>
</section>
<section id="sandra-dolmetscher" class="sandra-nightmarket" aria-label="Mit Sandra auf Deutsch und Thai verständigen">
<img src="assets/img/sandra-nightmarket-translator.webp" width="1983" height="793" loading="lazy" alt="Ein Paar bestellt am leuchtenden thailändischen Nachtmarkt. Deutsch und Thai. Bestell dein Lieblingsessen. Auch ohne Thai. Du möchtest nach Zutaten fragen oder ohne Chili bestellen? Sprich deine Frage auf Deutsch – Sandra übersetzt ins Thai und liest sie vor. Deutsch ins Thai. Thai ins Deutsche.">
<a class="sandra-nightmarket__cta" href="kontakt.php" aria-label="Über den Start informiert werden"></a>
</section>
<?php require __DIR__.'/includes/page-end.php';?>
