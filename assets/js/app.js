(() => {
  const toggle = document.querySelector("[data-menu-toggle]");
  const sidebar = document.getElementById("sidebar");
  const backdrop = document.querySelector("[data-menu-backdrop]");
  const video = document.querySelector(".hero-video");

  const setMenu = (open) => {
    document.body.classList.toggle("nav-open", open);
    toggle?.setAttribute("aria-expanded", open ? "true" : "false");
    if (backdrop) backdrop.hidden = !open;
  };

  toggle?.addEventListener("click", () => {
    setMenu(!document.body.classList.contains("nav-open"));
  });

  backdrop?.addEventListener("click", () => setMenu(false));

  sidebar?.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => setMenu(false));
  });

  if (video) {
    video.muted = false;
    video.volume = 1;
    const play = () => {
      video.muted = false;
      video.play().catch(() => {});
    };
    play();
    document.addEventListener("click", play, { once: true });
    document.addEventListener("touchstart", play, { once: true });
  }
})();