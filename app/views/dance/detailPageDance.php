<?php include __DIR__ . '/../header.php'; ?>

<div class="dance-page">

  <!-- Hero Section -->
  <div class="hero-section">
    <div class="hero-overlay"></div>
  </div>

  <!-- Purple Wave (Top) -->
  <img src="/uploads/header-purple-waves.svg" alt="Purple wave" class="wave-svg-top" />

  <!-- Title in a box below wave -->
<div class="artist-hero-name-wrapper">
  <div class="artist-hero-name-box">
    <div class="contenteditable" data-title="martinHeroTitle">
      <?= htmlspecialchars(getContentByTitle($blocks, 'martinHeroTitle')) ?>
    </div>
  </div>
</div>

<!-- Highlight Section -->
<div class="artist-highlight bg-yellow d-flex align-items-center justify-content-center flex-wrap gap-5 p-5">
  <section data-title="martinHeroImg" class="contenteditable">
    <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinHeroImg')) ?>" alt="Martin Garrix Hero" class="artist-highlight__image" style="max-width: 300px; border-radius: 25px;" />
  </section>
  <div class="contenteditable" data-title="martinHeroRightText" style="max-width: 500px;">
    <?= html_entity_decode(getContentByTitle($blocks, 'martinHeroRightText')) ?>
  </div>
</div>


  <!-- Purple Wave Title -->
  <section class="position-relative">
    <img src="/uploads/bg_section1.svg" class="wave-svg" alt="Wave Background">
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
      <h2 class="impact-font display-3 contenteditable" data-title="MartinTrackTitle">
        KEY TRACKS AND ALBUMS
      </h2>
    </div>
  </section>

  <!-- Albums + Banner -->
  <div class="albums-section bg-yellow">
    <div class="album-block">
      <div class="album-block__info">
        <div class="contenteditable" data-title="martinAlbumTitle">
          <?= html_entity_decode(getContentByTitle($blocks, 'martinAlbumTitle')) ?>
        </div>
      </div>
      <section data-title="martinAlbumImg" class="contenteditable">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinAlbumImg')) ?>" alt="Album Cover" class="album-block__cover" />
      </section>
    </div>

    <!-- Performance Banner -->
    <section data-title="martinBannerPerf" class="contenteditable album-banner mt-5">
      <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinBannerPerf')) ?>" alt="Performance Banner" class="album-banner__image" />
    </section>
  </div>

  <!-- Tracks Section (NO LOOP) -->
  <div class="tracks-grid">
    <div class="track-card">
      <section data-title="martinTrack1Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinTrack1Img')) ?>" alt="Track 1 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="martinTrack1Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'martinTrack1Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify_icon.svg" alt="Spotify" class="track-card__spotify" />
        </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="martinTrack2Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinTrack2Img')) ?>" alt="Track 2 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="martinTrack2Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'martinTrack2Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify_icon.svg" alt="Spotify" class="track-card__spotify" />
        </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="martinTrack3Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinTrack3Img')) ?>" alt="Track 3 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="martinTrack3Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'martinTrack3Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify_icon.svg" alt="Spotify" class="track-card__spotify" />
        </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="martinTrack4Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinTrack4Img')) ?>" alt="Track 4 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="martinTrack4Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'martinTrack4Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify_icon.svg" alt="Spotify" class="track-card__spotify" />
        </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="martinTrack5Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinTrack5Img')) ?>" alt="Track 5 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="martinTrack5Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'martinTrack5Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify_icon.svg" alt="Spotify" class="track-card__spotify" />
        </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="martinTrack6Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinTrack6Img')) ?>" alt="Track 6 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="martinTrack6Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'martinTrack6Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify_icon.svg" alt="Spotify" class="track-card__spotify" />
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Schedule Section for Martin Garrix -->
<section class="schedule-section">
  <div class="schedule-header">
    <h1 class="impact-font">Schedule</h1>
  </div>

  <?php if (!empty($orderedSchedule)): ?>
    <?php foreach ($orderedSchedule as $day => $shows): ?>
      <div class="schedule-day">
        <h2 class="schedule-day-title"><?= htmlspecialchars($day) ?></h2>
        <?php foreach ($shows as $show): ?>
          <div class="schedule-show">
            <span class="schedule-show-time"><?= date('H:i', strtotime($show['start_date'])) ?></span>
            <span class="schedule-show-artist"><?= htmlspecialchars($show['artist_name'] ?? 'Unknown Artist') ?></span>
            <span class="schedule-show-venue"><?= htmlspecialchars($show['venue_name'] ?? 'Unknown Venue') ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="no-schedule-message">No shows found for Martin Garrix.</p>
  <?php endif; ?>
</section>

<script src="/js/cms.js?v=65"></script>
<div class="bg-yellow">
  <?php include __DIR__ . '/../footer.php'; ?>
</div>
