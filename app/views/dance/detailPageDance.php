<?php
include __DIR__ . '/../header.php';
?>

<div class="dance-page">

  <!-- Hero Section -->
  <div class="hero-section">
    <div class="hero-overlay">
      <!-- Editable Artist Name (Text) -->
      <div class="contenteditable" data-title="martinHeroTitle">
  <?php
    $value = getContentByTitle($blocks, 'martinHeroTitle');
    echo 'Debug martinHeroTitle: ' . htmlspecialchars($value);
  ?>
</div>

    </div>
  </div>

  <!-- Purple Wave (Top) -->
  <img src="/uploads/header-purple-waves.svg" alt="Purple wave" class="wave-svg-top" />

  <!-- Highlight Section -->
  <div class="artist-highlight bg-yellow">
    <!-- Editable Hero Image (Image in a section) -->
    <section data-title="martinHeroImg" class="contenteditable">
      <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinHeroImg')) ?>" alt="Martin Garrix Hero" class="artist-highlight__image" />
    </section>
    <!-- Editable Hashtags / Hero Right Text (Text) -->
    <div class="contenteditable" data-title="martinHeroRightText">
      <?= html_entity_decode(getContentByTitle($blocks, 'martinHeroRightText')) ?>
    </div>
  </div>

  <!-- Purple Wave (Bottom) -->
  <img src="/uploads/bg_section1.svg" alt="Purple wave bottom" class="wave-svg-bottom" />

  <!-- Albums Section -->
  <div class="albums-section bg-yellow">
    <div class="album-block">
      <!-- Editable Album Title (Text) -->
      <div class="album-block__info">
        <div class="contenteditable" data-title="martinAlbumTitle">
          <?= html_entity_decode(getContentByTitle($blocks, 'martinAlbumTitle')) ?>
        </div>
      </div>
      <!-- Editable Album Cover (Image) -->
      <section data-title="martinAlbumImg" class="contenteditable">
        <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinAlbumImg')) ?>" alt="Album Cover" class="album-block__cover" />
      </section>
    </div>

    <!-- Editable Album Banner (Image) -->
    <section data-title="martinBannerPerf" class="contenteditable album-banner">
      <img src="<?= html_entity_decode(getContentByTitle($blocks, 'martinBannerPerf')) ?>" alt="Performance Banner" class="album-banner__image" />
    </section>
  </div>

  <!-- Tracks Section (Each track is individually editable) -->
  <div class="tracks-grid">
    <!-- Track 1 -->
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
    <!-- Track 2 -->
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
    <!-- Track 3 -->
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
    <!-- Track 4 -->
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
    <!-- Track 5 -->
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
    <!-- Track 6 -->
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
