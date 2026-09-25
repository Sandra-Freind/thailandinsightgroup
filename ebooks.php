<?php declare(strict_types=1);$activeNav='ebooks';$pageTitle='E-Books & digitale Guides';$pageDescription='Persönlich geschriebene Thailand-Guides für Reise, Ankommen und Alltag.';require __DIR__.'/includes/page-start.php';?>
<style>
.ebook-grid .ebook-card{grid-template-columns:292px minmax(0,1fr)}
.ebook-card>a.ebook-cover{position:relative;display:block;align-self:stretch;min-height:184px;overflow:hidden;background:#183e4a}
.ebook-card>a.ebook-cover img{position:absolute;inset:0;display:block;width:100%;height:100%;object-fit:cover;filter:none}
.ebook-card>a.ebook-cover::after{content:"";position:absolute;inset:30% 0 0;background:linear-gradient(transparent,rgba(2,21,25,.87))}
.ebook-cover__caption{position:absolute;z-index:1;left:16px;right:16px;bottom:15px;color:#fff;text-shadow:0 1px 4px rgba(0,0,0,.8);font-family:Arial,sans-serif}
.ebook-cover__caption strong{display:block;font-size:22px;line-height:1.13;letter-spacing:-.3px}
.ebook-cover__caption small{display:block;margin-top:7px;font-size:11px;line-height:1.3;font-weight:600}
@media(max-width:720px){.ebook-grid .ebook-card{grid-template-columns:minmax(140px,38%) minmax(0,1fr)}.ebook-cover__caption{left:10px;right:10px;bottom:10px}.ebook-cover__caption strong{font-size:clamp(14px,3vw,20px)}.ebook-cover__caption small{font-size:10px}}
</style>
<section class="page-hero page-hero--ebooks-bright"><img src="assets/img/ebook-hero-thailand-hell.jpg" alt="Thailand E-Books und digitale Guides"><div class="page-hero-copy"><p class="eyebrow">Die Thailand Insight Bibliothek</p><h1>Wissen, das mitreist.</h1><p>Keine austauschbaren Checklisten, sondern klare Orientierung aus gelebter Erfahrung – für die ersten Tage, längere Aufenthalte und ein Leben zwischen zwei Welten.</p></div></section>
<section class="section section--paper"><div class="section-head"><div><p class="eyebrow">Sieben Perspektiven</p><h2>Unsere E-Books</h2></div><p>Die vorhandenen Dateien sind derzeit als Leseproben angelegt. Die vollständigen Buchausgaben werden schrittweise ergänzt.</p></div><div class="ebook-grid"><?php foreach($cms['books'] as $book):?><article class="ebook-card" data-reveal><a class="ebook-cover" aria-disabled="true"><img src="<?=e($book['cover'])?>" alt="" loading="lazy"><span class="ebook-cover__caption"><strong><?=e($book['title'])?></strong><small><?=e($book['kicker']??'Digitaler Guide')?></small></span></a><div><p class="eyebrow"><?=e($book['kicker']??'Digitaler Guide')?></p><h2><?=e($book['title'])?></h2><p><?=e($book['description'])?></p><a class="text-link" aria-disabled="true">Zum E-Book →</a></div></article><?php endforeach;?></div></section>
<?php require __DIR__.'/includes/page-end.php';?>
