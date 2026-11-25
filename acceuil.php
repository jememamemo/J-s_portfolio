<?php
$titre = "Portfolio";
$songFiles = glob(__DIR__ . '/song/*.mp3');

if ($songFiles === false) {
    throw new RuntimeException('Impossible de lire le dossier song.');
}

sort($songFiles, SORT_NATURAL | SORT_FLAG_CASE);
$songs = [];
foreach ($songFiles as $songFile) {
    $songs[] = [
        'src' => 'song/' . rawurlencode(basename($songFile)),
        'title' => pathinfo($songFile, PATHINFO_FILENAME)
    ];
}

$songsJson = json_encode($songs, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
if ($songsJson === false) {
    throw new RuntimeException('Impossible de préparer la liste des morceaux.');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titre, ENT_QUOTES, "UTF-8") ?></title>
    <link rel="stylesheet" href="acceuil.css?v=64">
r=</head>
<body>
    <video class="background-video" autoplay muted loop playsinline aria-hidden="true" tabindex="-1">
        <source src="video/reso.mp4" type="video/mp4">
    </video>
    <div class="video-overlay" aria-hidden="true"></div>

    <?php include __DIR__ . '/header.php'; ?>

    <nav class="category-wheel" id="category-wheel" aria-label="Catégories du portfolio" tabindex="0">
        <h1 class="screen-reader-only" id="category-title" aria-live="polite">Bienvenue</h1>
        <div class="category-reel" aria-hidden="true">
            <div class="category-reel-track" id="category-reel-track"></div>
        </div>
        <p class="category-hint">Défilez pour parcourir</p>
        <ol class="category-list screen-reader-only" id="category-list"></ol>
    </nav>

    <main class="portfolio-content" id="portfolio-content" aria-live="polite">
        <section class="portfolio-section" data-category="Bienvenue">
            <p class="section-eyebrow">Portfolio</p>
            <h2>Bonjour.</h2>
            <p>Bienvenue dans mon univers. Découvrez mes projets et ce que je peux créer.</p>
        </section>
        <section class="portfolio-section" data-category="Projets" hidden>
            <p class="section-eyebrow">Mes resultats</p>
            <h2>Mes projets</h2>
            <p>Découvrez les créations que j’ai réalisés.</p>
        </section>
        <section class="portfolio-section" data-category="Compétences" hidden>
            <p class="section-eyebrow">Savoir-faire</p>
            <h2>Mes compétences</h2>
            <p>J’apprends actuellement plusieurs langages et développe mes compétences créatives.</p>
        </section>
        <section class="portfolio-section" data-category="Contact" hidden>
            <p class="section-eyebrow">Entrons en contact</p>
            <h2>Me contacter&nbsp;?</h2>
            <p>Retrouvez ici mes différents moyens de contact.</p>
        </section>
    </main>

    <button class="see-button" id="open-portfolio-dialog" type="button" hidden aria-hidden="true" disabled>Voir</button>

    <dialog class="portfolio-dialog" id="portfolio-dialog" aria-labelledby="dialog-title">
        <div class="dialog-header">
            <h2 class="dialog-title" id="dialog-title">Bienvenue</h2>
            <button class="dialog-close" id="close-portfolio-dialog" type="button">Quitter</button>
        </div>
        <div class="dialog-content" id="dialog-content" aria-live="polite">
            <section class="dialog-section" data-category="Bienvenue" hidden>
                <p class="section-eyebrow">Portfolio</p>
                <h2>Bienvenue</h2>
                <p>Bienvenue dans mon univers. Cette page rassemble mes projets, mes apprentissages et mes créations.</p>
            </section>
            <section class="dialog-section" data-category="Projets" hidden>
                <p class="section-eyebrow">Réalisations</p>
                <h2>Mes projets pédagogique</h2>
                <p>Voici un aperçu d’un site que j’ai conçu.</p>
                <article class="project-card">
                    <div class="project-video-frame">
                        <video class="project-video" controls preload="metadata" playsinline aria-label="Vidéo de présentation du site RecetteDeFeu.com">
                            <source src="video/Projet%20vid%C3%A9o%202.mp4" type="video/mp4">
                            Votre navigateur ne prend pas en charge la lecture des vidéos.
                        </video>
                    </div>
                    <div class="project-details">
                        <h3>RecetteDeFeu.com</h3>
                        <p>Un projet réalisé lors d'un examen de PHP/Html.</p>
                        
                    </div>
                </article>
            </section>
            <section class="dialog-section" data-category="Compétences" hidden>
                <p class="section-eyebrow">En apprentissage et en création</p>
                <h2>Ce que j’explore</h2>
                <p>Je développe mes compétences à mon rythme, entre programmation et création. Voici les domaines que j’explore actuellement.</p>
                <div class="skill-groups">
                    <article class="skill-group">
                        <h3>Programmation</h3>
                        <ul class="skill-list">
                            <li>
                                <span class="skill-name">C</span>
                                <span class="skill-description">Découverte de la logique de programmation et des bases du langage grace a mes cours au sein de l'ESGI.</span>
                            </li>
                            <li>
                                <span class="skill-name">JavaScript</span>
                                <span class="skill-description">Apprentissage du language a travers la création d'un jeu et du devellopement Web.</span>
                            </li>
                            <li>
                                <span class="skill-name">Python</span>
                                <span class="skill-description">Exploration de la syntaxe et des possibilités du langage.</span>
                            </li>
                            <li>
                                <span class="skill-name">C#</span>
                                <span class="skill-description">Apprentissage du language a travers la création d'un jeu.</span>
                            </li>
                        </ul>
                    </article>
                    <article class="skill-group">
                        <h3>Création</h3>
                        <ul class="skill-list">
                            <li>
                                <span class="skill-name">Montage vidéo</span>
                                <span class="skill-description">Assemblage de séquences et travail du rythme pour raconter une histoire.</span>
                            </li>
                            <li>
                                <span class="skill-name">Création musicale</span>
                                <span class="skill-description">Expérimentation de la création musicale avec WAD.</span>
                            </li>
                            <li>
                                <span class="skill-name">Pratique musicale</span>
                                <span class="skill-description">Piano et batterie.</span>
                            </li>
                            <li>
                                <span class="skill-name">Modélisation 3D avec Blender</span>
                                <span class="skill-description">Découverte de la création et de la modélisation en 3D.</span>
                            </li>
                        </ul>
                    </article>
                </div>
            </section>
            <section class="dialog-section" data-category="Contact" hidden>
                <p class="section-eyebrow">Me retrouver</p>
                <h2>Mes coordonnées</h2>
                <p>N'hésitez pas a me contacter si mon profil vous intéresse.</p>
                <ul class="contact-list">
                    <li><span>Email</span><span class="contact-placeholder">cartenerjeremiahpro@gmail.com</span></li>
                    <li><span>Git</span><span class="contact-placeholder">https://github.com/jememamemo</span></li>
                    <li><span>Téléphone</span><span class="contact-placeholder">07 61 95 32 17</span></li>
                </ul>
            </section>
        </div>
    </dialog>

    <?php include __DIR__ . '/footer.php'; ?>
    <script>
        (() => {
            const categories = ["Bienvenue", "Projets", "Compétences", "Contact"];
            const wheel = document.getElementById("category-wheel");
            const title = document.getElementById("category-title");
            const reel = document.getElementById("category-reel-track");
            const dialog = document.getElementById("portfolio-dialog");
            const logoLayer = document.getElementById("site-logo-layer");
            const dialogTitle = document.getElementById("dialog-title");
            const openDialogButton = document.getElementById("open-portfolio-dialog");
            const closeDialogButton = document.getElementById("close-portfolio-dialog");
            const dialogContent = document.getElementById("dialog-content");
            const sections = document.querySelectorAll(".portfolio-section");
            const dialogSections = document.querySelectorAll(".dialog-section");
            const rows = [];
            const rowHeight = 38;
            let currentPosition = categories.length * 2;
            let targetPosition = currentPosition;
            let activePosition = currentPosition;
            let animationFrame = 0;
            let previousFrameTime = 0;
            let lastActiveIndex = -1;
            let activeCategory = categories[0];
            let buttonVisibilityTimer;

            logoLayer.showPopover();

            function setOpenButtonVisible(visible) {
                window.clearTimeout(buttonVisibilityTimer);
                if (visible) {
                    openDialogButton.hidden = false;
                    openDialogButton.disabled = false;
                    openDialogButton.setAttribute("aria-hidden", "false");
                    window.requestAnimationFrame(() => {
                        if (activeCategory !== "Bienvenue") openDialogButton.classList.add("is-visible");
                    });
                    return;
                }

                openDialogButton.classList.remove("is-visible");
                openDialogButton.disabled = true;
                openDialogButton.setAttribute("aria-hidden", "true");
                buttonVisibilityTimer = window.setTimeout(() => {
                    if (activeCategory === "Bienvenue") openDialogButton.hidden = true;
                }, 180);
            }

            function renderDialogContent() {
                const hasCategoryContent = Array.from(dialogSections).some((section) => section.dataset.category === activeCategory);
                if (!hasCategoryContent) throw new Error(`No dialog content for category "${activeCategory}"`);
                dialogSections.forEach((section) => {
                    section.hidden = section.dataset.category !== activeCategory;
                });
                dialogContent.scrollTop = 0;
            }

            function updateActiveCategory(position) {
                const nextPosition = Math.round(position);
                rows.forEach((row) => {
                    row.classList.toggle("is-active", Number(row.dataset.position) === nextPosition);
                });
                if (nextPosition === activePosition) return;

                activePosition = nextPosition;
                const nextIndex = ((nextPosition % categories.length) + categories.length) % categories.length;

                if (nextIndex === lastActiveIndex) return;
                lastActiveIndex = nextIndex;
                activeCategory = categories[nextIndex];
                title.textContent = activeCategory;
                dialogTitle.textContent = activeCategory;
                sections.forEach((section) => {
                    section.hidden = section.dataset.category !== activeCategory;
                    section.classList.remove("is-changing");
                });
                const activeSection = Array.from(sections).find((section) => section.dataset.category === activeCategory);
                activeSection.classList.add("is-changing");
                window.requestAnimationFrame(() => activeSection.classList.remove("is-changing"));
                setOpenButtonVisible(activeCategory !== "Bienvenue");
                if (dialog.open) {
                    renderDialogContent();
                }
            }

            openDialogButton.addEventListener("click", () => {
                renderDialogContent();
                dialog.showModal();
                logoLayer.hidePopover();
                logoLayer.showPopover();
            });
            closeDialogButton.addEventListener("click", () => dialog.close());
            dialog.addEventListener("close", () => {
                (activeCategory === "Bienvenue" ? wheel : openDialogButton).focus();
            });

            function animateWheel(timestamp) {
                const elapsed = previousFrameTime ? Math.min(timestamp - previousFrameTime, 50) : 16;
                previousFrameTime = timestamp;

                const difference = targetPosition - currentPosition;
                currentPosition += difference * (1 - Math.exp(-elapsed / 95));

                if (Math.abs(difference) < 0.001) {
                    currentPosition = targetPosition;
                    animationFrame = 0;
                } else {
                    animationFrame = window.requestAnimationFrame(animateWheel);
                }

                while (currentPosition >= categories.length * 3) {
                    currentPosition -= categories.length;
                    targetPosition -= categories.length;
                    activePosition -= categories.length;
                }
                while (currentPosition < categories.length) {
                    currentPosition += categories.length;
                    targetPosition += categories.length;
                    activePosition += categories.length;
                }

                reel.style.transform = `translate3d(0, ${-currentPosition * rowHeight}px, 0)`;
                updateActiveCategory(currentPosition);
            }

            function moveWheel(delta) {
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
                    targetPosition += Math.sign(delta);
                    currentPosition = targetPosition;
                    animateWheel(performance.now());
                    return;
                }

                targetPosition += delta;
                if (!animationFrame) {
                    previousFrameTime = 0;
                    animationFrame = window.requestAnimationFrame(animateWheel);
                }
            }

            for (let copy = 0; copy < 5; copy++) {
                categories.forEach((category, categoryIndex) => {
                    const row = document.createElement("div");
                    row.className = "category-reel-row";
                    row.dataset.categoryIndex = categoryIndex;
                    row.dataset.position = copy * categories.length + categoryIndex;
                    row.textContent = category;
                    reel.append(row);
                    rows.push(row);
                });
            }

            window.addEventListener("wheel", (event) => {
                if (dialog.open) return;
                event.preventDefault();
                if (event.deltaY === 0) return;

                let delta = event.deltaY;
                if (event.deltaMode === WheelEvent.DOM_DELTA_LINE) delta *= 16;
                if (event.deltaMode === WheelEvent.DOM_DELTA_PAGE) delta = Math.sign(delta) * 130;
                moveWheel(Math.max(-240, Math.min(240, delta)) / 130);
            }, { passive: false, capture: true });

            wheel.addEventListener("keydown", (event) => {
                if (event.key !== "ArrowDown" && event.key !== "ArrowUp") return;
                event.preventDefault();
                moveWheel(event.key === "ArrowDown" ? 1 : -1);
            });

            rows[activePosition].classList.add("is-active");
            lastActiveIndex = 0;
            sections.forEach((section) => {
                section.hidden = section.dataset.category !== categories[0];
            });
            reel.style.transform = `translate3d(0, ${-currentPosition * rowHeight}px, 0)`;
        })();
    </script>
    <script>
        (() => {
            const playlist = <?= $songsJson ?>;
            const audio = document.getElementById("music-audio");
            const logos = document.querySelectorAll(".site-logo");
            const titleWindow = document.getElementById("player-title-window");
            const trackTitle = document.getElementById("player-track-title");
            const currentTime = document.getElementById("player-current-time");
            const duration = document.getElementById("player-duration");
            const seek = document.getElementById("player-seek");
            const status = document.getElementById("player-status");
            const toggleButton = document.getElementById("player-toggle");
            const previousButton = document.getElementById("player-previous");
            const nextButton = document.getElementById("player-next");
            const repeatButton = document.getElementById("player-repeat");
            const volume = document.getElementById("player-volume");
            const controls = [toggleButton, previousButton, nextButton, repeatButton, seek, volume];
            let trackIndex = 0;
            let repeatMode = 0;

            function formatTime(seconds) {
                if (!Number.isFinite(seconds) || seconds < 0) return "0:00";
                const minutes = Math.floor(seconds / 60);
                const remainder = Math.floor(seconds % 60).toString().padStart(2, "0");
                return `${minutes}:${remainder}`;
            }

            function updateMarquee() {
                trackTitle.classList.remove("is-scrolling");
                titleWindow.style.removeProperty("--marquee-distance");
                window.requestAnimationFrame(() => {
                    const distance = trackTitle.scrollWidth - titleWindow.clientWidth;
                    if (distance <= 8) return;
                    titleWindow.style.setProperty("--marquee-distance", `${distance}px`);
                    titleWindow.style.setProperty("--marquee-duration", `${Math.max(7, distance / 22)}s`);
                    trackTitle.classList.add("is-scrolling");
                });
            }

            function updateTrack(index, autoplay) {
                trackIndex = (index + playlist.length) % playlist.length;
                const track = playlist[trackIndex];
                trackTitle.textContent = track.title;
                audio.src = track.src;
                audio.load();
                seek.value = "0";
                currentTime.textContent = "0:00";
                duration.textContent = "0:00";
                status.textContent = "MORCEAU CHARGÉ";
                updateMarquee();
                if (autoplay) {
                    audio.play().catch(() => {
                        status.textContent = "LECTURE IMPOSSIBLE";
                    });
                }
            }

            function updatePlayButton() {
                const playing = !audio.paused;
                logos.forEach((logo) => logo.classList.toggle("is-dancing", playing));
                toggleButton.setAttribute("aria-label", playing ? "Mettre en pause" : "Lire");
                toggleButton.innerHTML = playing
                    ? '<span class="player-pause-icon" aria-hidden="true"></span>'
                    : '<span aria-hidden="true">▶</span>';
                if (playing) status.textContent = "LECTURE";
                else if (audio.ended) status.textContent = "LECTURE TERMINÉE";
                else if (audio.currentTime > 0) status.textContent = "EN PAUSE";
            }

            function nextIndex() {
                return (trackIndex + 1) % playlist.length;
            }

            function playNext(autoplay) {
                updateTrack(nextIndex(), autoplay);
            }

            function playPrevious() {
                if (audio.currentTime > 3) {
                    audio.currentTime = 0;
                    return;
                }
                updateTrack((trackIndex - 1 + playlist.length) % playlist.length, true);
            }

            function updateRepeatButton() {
                const labels = ["Répétition désactivée", "Répéter la liste", "Répéter le morceau"];
                repeatButton.setAttribute("aria-label", labels[repeatMode]);
                repeatButton.setAttribute("aria-pressed", repeatMode === 0 ? "false" : "true");
                repeatButton.innerHTML = repeatMode === 2
                    ? '<span aria-hidden="true">↻<sup>1</sup></span>'
                    : '<span aria-hidden="true">↻</span>';
                repeatButton.classList.toggle("is-active", repeatMode !== 0);
            }

            if (playlist.length === 0) {
                controls.forEach((control) => {
                    control.disabled = true;
                });
                return;
            }

            controls.forEach((control) => {
                control.disabled = false;
            });
            audio.volume = Number(volume.value);
            updateTrack(0, false);

            toggleButton.addEventListener("click", () => {
                if (audio.paused) {
                    audio.play().catch(() => {
                        status.textContent = "LECTURE IMPOSSIBLE";
                    });
                } else {
                    audio.pause();
                }
            });
            previousButton.addEventListener("click", playPrevious);
            nextButton.addEventListener("click", () => playNext(true));
            repeatButton.addEventListener("click", () => {
                repeatMode = (repeatMode + 1) % 3;
                updateRepeatButton();
            });
            seek.addEventListener("input", () => {
                if (!Number.isFinite(audio.duration)) return;
                audio.currentTime = (Number(seek.value) / Number(seek.max)) * audio.duration;
            });
            volume.addEventListener("input", () => {
                audio.volume = Number(volume.value);
            });
            audio.addEventListener("loadedmetadata", () => {
                duration.textContent = formatTime(audio.duration);
            });
            audio.addEventListener("timeupdate", () => {
                currentTime.textContent = formatTime(audio.currentTime);
                if (Number.isFinite(audio.duration) && audio.duration > 0) {
                    seek.value = String(Math.round((audio.currentTime / audio.duration) * Number(seek.max)));
                }
            });
            audio.addEventListener("play", updatePlayButton);
            audio.addEventListener("pause", updatePlayButton);
            audio.addEventListener("error", () => {
                status.textContent = "ERREUR DE LECTURE";
            });
            audio.addEventListener("ended", () => {
                if (repeatMode === 2) {
                    updateTrack(trackIndex, true);
                } else if (repeatMode === 1 || trackIndex < playlist.length - 1) {
                    playNext(true);
                } else {
                    updatePlayButton();
                }
            });
            window.addEventListener("resize", updateMarquee);
            updateRepeatButton();
        })();
    </script>
</body>
</html>
