(() => {
    'use strict';

    const video = document.getElementById('heroVideo');
    const soundToggle = document.getElementById('soundToggle');
    const volumeSlider = document.getElementById('heroVolume');

    if (video) {
        video.muted = true;
        video.volume = 1;
        video.loop = true;

        const startPlayback = () => {
            const playPromise = video.play();

            if (playPromise && typeof playPromise.catch === 'function') {
                playPromise.catch(() => {});
            }
        };

        startPlayback();

        const updateSoundButton = () => {
            if (!soundToggle) {
                return;
            }

            const soundIsOn = !video.muted && video.volume > 0;

            soundToggle.classList.toggle('is-on', soundIsOn);
            soundToggle.setAttribute(
                'aria-label',
                soundIsOn ? 'Ton ausschalten' : 'Ton einschalten'
            );
            soundToggle.setAttribute(
                'title',
                soundIsOn ? 'Ton ausschalten' : 'Ton einschalten'
            );
        };

        if (soundToggle) {
            soundToggle.addEventListener('click', () => {
                if (video.muted || video.volume === 0) {
                    video.muted = false;

                    if (video.volume === 0) {
                        video.volume = 1;

                        if (volumeSlider) {
                            volumeSlider.value = '1';
                        }
                    }
                } else {
                    video.muted = true;
                }

                startPlayback();
                updateSoundButton();
            });
        }

        if (volumeSlider) {
            volumeSlider.addEventListener('input', () => {
                const volume = Number(volumeSlider.value);

                video.volume = volume;
                video.muted = volume === 0;

                startPlayback();
                updateSoundButton();
            });
        }

        updateSoundButton();

        const retryPlayback = () => {
            startPlayback();
        };

        document.addEventListener('click', retryPlayback, { once: true });
        document.addEventListener('touchstart', retryPlayback, { once: true });

        const heroCopy = document.querySelector('.hero-copy');

        if (heroCopy) {
            const sandraStart = 24;

            const updateHeroCopyVisibility = () => {
                if (video.currentTime >= sandraStart) {
                    heroCopy.style.opacity = '0';
                    heroCopy.style.pointerEvents = 'none';
                } else {
                    heroCopy.style.opacity = '1';
                    heroCopy.style.pointerEvents = '';
                }
            };

            video.addEventListener('timeupdate', updateHeroCopyVisibility);
            video.addEventListener('seeked', updateHeroCopyVisibility);
            video.addEventListener('playing', updateHeroCopyVisibility);
            video.addEventListener('loadedmetadata', updateHeroCopyVisibility);
        }
    }

    const weatherRoot = document.querySelector('[data-weather]');

    if (weatherRoot) {
        const temp = weatherRoot.querySelector('[data-weather-temp]');
        const condition = weatherRoot.querySelector('[data-weather-condition]');
        const high = weatherRoot.querySelector('[data-weather-high]');
        const low = weatherRoot.querySelector('[data-weather-low]');
        const status = weatherRoot.querySelector('[data-weather-status]');

        fetch('api/weather.php?city=pattaya', {
            headers: {
                'Accept': 'application/json'
            }
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Weather request failed');
                }

                return response.json();
            })
            .then((data) => {
                if (temp && Number.isFinite(Number(data.temperature))) {
                    temp.textContent = `${Math.round(Number(data.temperature))}°C`;
                }

                if (high && Number.isFinite(Number(data.high))) {
                    high.textContent = `${Math.round(Number(data.high))}°`;
                }

                if (low && Number.isFinite(Number(data.low))) {
                    low.textContent = `${Math.round(Number(data.low))}°`;
                }

                if (condition) {
                    condition.textContent =
                        data.warning ||
                        data.condition ||
                        'Aktuelle Wetterdaten';
                }

                if (status) {
                    status.textContent = '';
                }
            })
            .catch(() => {
                if (condition) {
                    condition.textContent = 'Wetter derzeit nicht verfügbar';
                }

                if (status) {
                    status.textContent = '';
                }
            });
    }

    const fxRoot = document.querySelector('[data-fx]');

    if (fxRoot) {
        const eur = fxRoot.querySelector('[data-fx-eur]');
        const usd = fxRoot.querySelector('[data-fx-usd]');
        const chf = fxRoot.querySelector('[data-fx-chf]');
        const status = fxRoot.querySelector('[data-fx-status]');

        fetch('api/fx.php', {
            headers: {
                'Accept': 'application/json'
            }
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('FX request failed');
                }

                return response.json();
            })
            .then((data) => {
                const formatRate = (value) => {
                    const number = Number(value);

                    if (!Number.isFinite(number)) {
                        return '— THB';
                    }

                    return `${number.toFixed(2)} THB`;
                };

                if (eur) {
                    eur.textContent = formatRate(data.EUR);
                }

                if (usd) {
                    usd.textContent = formatRate(data.USD);
                }

                if (chf) {
                    chf.textContent = formatRate(data.CHF);
                }

                if (status) {
                    status.textContent = '';
                }
            })
            .catch(() => {
                if (status) {
                    status.textContent = '';
                }
            });
    }
})();