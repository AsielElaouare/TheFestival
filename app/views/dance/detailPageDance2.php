<?php include __DIR__ . '/../header.php'; ?>

<div class="dance-page">

<!-- Hero Section -->
<div class="hero-section">
  <div class="hero-overlay">
    <img src="/uploads/DANCEHAARLEMwit.png" alt="Dance Haarlem Logo" class="dance-banner-logo" />
  </div>
</div>


<!-- Purple Wave (Top) -->
<img src="/uploads/header-purple-waves.svg" alt="Purple wave" class="wave-svg-top" />

<!-- Hardwell Title (below the wave) -->
<div class="artist-hero-name contenteditable" data-title="hardwellHeroTitle">
  <?= htmlspecialchars(getContentByTitle($blocks, 'hardwellHeroTitle')) ?>
</div>


  <!-- Highlight Section -->
  <div class="artist-highlight bg-yellow">
  <section data-title="hardwellHeroImg" class="contenteditable">
    <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellHeroImg')) ?>" alt="Hardwell Hero" class="artist-highlight__image" />
  </section>
  <div class="contenteditable" data-title="hardwellHeroRightText">
    <?= html_entity_decode(getContentByTitle($blocks, 'hardwellHeroRightText')) ?>
  </div>
</div>


  <section class="position-relative">
  <img src="/uploads/bg_section1.svg" class="wave-svg" alt="Wave Background">
  <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
    <h2 class="impact-font display-3 contenteditable" data-title="HardwellTrackTitle">
      KEY TRACKS AND ALBUMS
    </h2>
  </div>
</section>



  <!-- Albums Section -->
<div class="albums-section bg-yellow">

    <!-- Album 1 -->
    <div class="album-block">
      <div class="album-block__info">
        <div class="contenteditable" data-title="hardwellAlbumTitle1">
          <?= html_entity_decode(getContentByTitle($blocks, 'hardwellAlbumTitle1')) ?>
        </div>
      </div>
      <section data-title="hardwellAlbumImg1" class="contenteditable">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellAlbumImg1')) ?>" alt="Album Cover 1" class="album-block__cover" />
      </section>
    </div>

    <!-- Album 2 -->
    <div class="album-block">
      <div class="album-block__info">
        <div class="contenteditable" data-title="hardwellAlbumTitle2">
          <?= html_entity_decode(getContentByTitle($blocks, 'hardwellAlbumTitle2')) ?>
        </div>
      </div>
      <section data-title="hardwellAlbumImg2" class="contenteditable">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellAlbumImg2')) ?>" alt="Album Cover 2" class="album-block__cover" />
      </section>
    </div>

    <!-- Album 3 -->
    <div class="album-block">
      <div class="album-block__info">
        <div class="contenteditable" data-title="hardwellAlbumTitle3">
          <?= html_entity_decode(getContentByTitle($blocks, 'hardwellAlbumTitle3')) ?>
        </div>
      </div>
      <section data-title="hardwellAlbumImg3" class="contenteditable">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellAlbumImg3')) ?>" alt="Album Cover 3" class="album-block__cover" />
      </section>
    </div>
</div>


    <!-- Performance Banner -->
    <div class="section-wrapper">
    <section data-title="hardwellBannerPerf" class="contenteditable album-banner mt-5">
    <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellBannerPerf')) ?>" alt="Performance Banner" class="album-banner__image" />
    </section>
    </div>

  <!-- Tracks Section -->
  <div class="tracks-grid">
    <div class="track-card">
      <section data-title="hardwellTrack1Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack1Img')) ?>" alt="Track 1 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="hardwellTrack1Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack1Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify.png" alt="Spotify" class="track-card__spotify" />
          </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="hardwellTrack2Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack2Img')) ?>" alt="Track 2 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="hardwellTrack2Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack2Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify.png" alt="Spotify" class="track-card__spotify" />
          </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="hardwellTrack3Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack3Img')) ?>" alt="Track 3 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="hardwellTrack3Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack3Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify.png" alt="Spotify" class="track-card__spotify" />
          </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="hardwellTrack4Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack4Img')) ?>" alt="Track 4 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="hardwellTrack4Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack4Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify.png" alt="Spotify" class="track-card__spotify" />
          </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="hardwellTrack5Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack5Img')) ?>" alt="Track 5 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="hardwellTrack5Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack5Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify.png" alt="Spotify" class="track-card__spotify" />
          </div>
      </div>
    </div>

    <div class="track-card">
      <section data-title="hardwellTrack6Img" class="contenteditable track-card__img">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack6Img')) ?>" alt="Track 6 Cover" class="track-card__cover" />
      </section>
      <div class="track-card__info">
        <div class="contenteditable" data-title="hardwellTrack6Txt">
          <?= html_entity_decode(getContentByTitle($blocks, 'hardwellTrack6Txt')) ?>
        </div>
        <div class="track-card__buttons">
          <button class="track-card__play"></button>
          <img src="/uploads/spotify.png" alt="Spotify" class="track-card__spotify" />
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Purple Wave Title -->
<section class="position-relative">
<img src="/uploads/bg_section1.svg" class="wave-svg" alt="Wave Background">
  <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
    <h2 class="impact-font display-3">SCHEDULE FOR HAARLEM</h2>
  </div>
</section>

<!-- Schedule Section for Hardwell -->
<section class="schedule-section bg-purple text-center text-white py-5">
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
    <p class="no-schedule-message">No shows found for Hardwell.</p>
  <?php endif; ?>
</section>

<div class="text-center my-5">
  <a href="/tickets" class="btn primary-button mx-auto">Buy your tickets</a>
  </div>

</div>


<script src="/js/cms.js?v=65"></script>
<div class="bg-yellow">
  <?php include __DIR__ . '/../footer.php'; ?>
</div>
