(()=>{
const h=document.querySelector('[data-site-header]'),t=document.querySelector('[data-menu-toggle]'),n=document.querySelector('[data-site-nav]');
const sh=()=>h?.classList.toggle('is-scrolled',scrollY>24);sh();addEventListener('scroll',sh,{passive:true});
t?.addEventListener('click',()=>{const o=!n?.classList.contains('is-open');n?.classList.toggle('is-open',o);t.setAttribute('aria-expanded',String(o));});
document.querySelectorAll('[data-reveal]').forEach(el=>{if(!('IntersectionObserver'in window)){el.classList.add('is-visible');return}new IntersectionObserver(([e],o)=>{if(e.isIntersecting){e.target.classList.add('is-visible');o.disconnect()}},{threshold:.12}).observe(el)});
const v=document.querySelector('[data-hero-video]'),s=document.querySelector('[data-sound-toggle]');s?.addEventListener('click',()=>{if(!(v instanceof HTMLVideoElement))return;v.muted=!v.muted;s.classList.toggle('is-on',!v.muted);s.setAttribute('aria-label',v.muted?'Ton einschalten':'Ton ausschalten');v.play().catch(()=>{})});
})();
