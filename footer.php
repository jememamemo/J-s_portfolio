<footer class="site-footer">
    <time class="site-clock" id="site-clock" aria-label="Heure actuelle">--:--</time>
    <section class="music-player" aria-label="Lecteur de musique">
        <audio id="music-audio" preload="metadata"></audio>
        <div class="player-track-row">
            <div class="player-progress-row">
                <time id="player-current-time">0:00</time>
                <input class="player-seek" id="player-seek" type="range" min="0" max="1000" value="0" aria-label="Position dans le morceau" disabled>
                <time id="player-duration">0:00</time>
            </div>
        </div>
        <p class="player-status screen-reader-only" id="player-status" aria-live="polite">Lecteur prêt</p>
        <div class="player-toolbar">
            <div class="player-title-window" id="player-title-window">
                <span class="player-track-title" id="player-track-title">Aucun morceau dans song</span>
            </div>
            <div class="player-controls">
                <button class="player-control" id="player-previous" type="button" aria-label="Morceau précédent" disabled><span aria-hidden="true">|◀</span></button>
                <button class="player-control player-play" id="player-toggle" type="button" aria-label="Lire" disabled><span aria-hidden="true">▶</span></button>
                <button class="player-control" id="player-next" type="button" aria-label="Morceau suivant" disabled><span aria-hidden="true">▶|</span></button>
                <button class="player-control player-repeat" id="player-repeat" type="button" aria-label="Répétition désactivée" aria-pressed="false" disabled><span aria-hidden="true">↻</span></button>
            </div>
            <label class="player-volume-control" aria-label="Volume">
                <input class="player-volume" id="player-volume" type="range" min="0" max="1" step="0.01" value="0.75" aria-label="Volume" disabled>
            </label>
        </div>
    </section>
</footer>

<script>
    const clock = document.getElementById("site-clock");

    function updateClock() {
        clock.textContent = new Intl.DateTimeFormat("fr-FR", {
            hour: "2-digit",
            minute: "2-digit"
        }).format(new Date());
    }

    updateClock();
    window.setInterval(updateClock, 1000);
</script>