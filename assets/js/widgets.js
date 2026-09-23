(() => {
  const weatherRoot = document.querySelector("[data-weather]");
  const fxRoot = document.querySelector("[data-fx]");

  const formatRate = (value) => {
    const formatted = new Intl.NumberFormat("de-DE", {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    }).format(value);
    return `1 € = ${formatted} ฿`;
  };

  const loadWeather = async (city) => {
    if (!weatherRoot) return;
    const tempEl = weatherRoot.querySelector("[data-weather-temp]");
    const warnEl = weatherRoot.querySelector("[data-weather-warn]");
    const statusEl = weatherRoot.querySelector("[data-weather-status]");

    statusEl.textContent = "Wird geladen …";
    statusEl.hidden = false;
    warnEl.hidden = true;
    warnEl.textContent = "";

    try {
      const res = await fetch(`api/weather.php?city=${encodeURIComponent(city)}`, {
        headers: { Accept: "application/json" },
      });
      const data = await res.json();
      if (!data.ok) throw new Error(data.error || "Fehler");

      tempEl.textContent = `${data.temperature}${data.unit}`;
      statusEl.hidden = true;
      if (data.warning) {
        warnEl.textContent = data.warning;
        warnEl.hidden = false;
      }
    } catch (err) {
      tempEl.textContent = "—";
      statusEl.textContent = err.message || "Wetter derzeit nicht verfügbar.";
      statusEl.hidden = false;
    }
  };

  const loadFx = async () => {
    if (!fxRoot) return;
    const rateEl = fxRoot.querySelector("[data-fx-rate]");
    const statusEl = fxRoot.querySelector("[data-fx-status]");
    const metaEl = fxRoot.querySelector("[data-fx-meta]");

    statusEl.textContent = "Wird geladen …";
    statusEl.hidden = false;

    try {
      const res = await fetch("api/fx.php", { headers: { Accept: "application/json" } });
      const data = await res.json();
      if (!data.ok) throw new Error(data.error || "Fehler");

      rateEl.textContent = formatRate(data.rate);
      metaEl.textContent = "aktuell · live";
      statusEl.hidden = true;
    } catch (err) {
      rateEl.textContent = "1 € = — ฿";
      statusEl.textContent = err.message || "Kurs derzeit nicht verfügbar.";
      statusEl.hidden = false;
    }
  };

  const citySelect = document.querySelector("[data-weather-city]");
  citySelect?.addEventListener("change", () => loadWeather(citySelect.value));

  loadWeather(citySelect?.value || "pattaya");
  loadFx();
})();