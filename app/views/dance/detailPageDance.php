<?php
include __DIR__ . '/../header.php';
?>

<div class="dance-page">
  <!-- Hero Section -->
  <div class="hero-section">
    <div class="hero-overlay">
      <h1 class="hero-title">DANCE HAARLEM!</h1>
    </div>
  </div>

  <!-- Purple Wave -->
  <img src="/uploads/header-purple-waves.svg" alt="Purple wave" class="wave-svg-top" />

  <!-- Artist Name -->
  <div class="artist-header bg-purple text-center">
    <h2 class="artist-header__name">Martin Garrix</h2>
  </div>

  <!-- Yellow Background with Image & Hashtags -->
  <div class="artist-highlight bg-yellow">
    <div class="artist-highlight__image-container">
      <img src="/uploads/martingarrixtrophy.jpg" alt="Martin Garrix" class="artist-highlight__image" />
    </div>
    <div class="artist-highlight__hashtags">
      <p><span class="hashtag-title">#YOUNGESTNO1DJ</span><br><span class="hashtag-desc">CROWNED THE YOUNGEST DJ...</span></p>
      <p><span class="hashtag-title">#STMPDRCRDS</span><br><span class="hashtag-desc">FOUNDED HIS OWN RECORD LABEL...</span></p>
      <p><span class="hashtag-title">#FESTIVALHEADLINER</span><br><span class="hashtag-desc">HEADLINED THE WORLD'S BIGGEST...</span></p>
      <p><span class="hashtag-title">#ICONICCOLLABS</span><br><span class="hashtag-desc">PARTNERED WITH GLOBAL STARS...</span></p>
    </div>
  </div>

  <!-- Purple Wave (bottom) -->
  <img src="/uploads/bg_section1.svg" alt="Purple wave bottom" class="wave-svg-bottom" />

  <!-- Albums Section -->
  <div class="albums-section bg-yellow">
    <div class="album-block">
      <img src="/uploads/placeholder_album.jpg" alt="Sentio Cover" class="album-block__cover" />
      <div class="album-block__info">
        <h3 class="album-block__title">Sentio Martin Garrix The Album</h3>
        <p class="album-block__description">"Sentio" is Martin Garrix’s debut...</p>
      </div>
    </div>

    <div class="album-banner">
      <img src="/uploads/placeholder_banner.jpg" alt="Martin Garrix Crowd" class="album-banner__image" />
    </div>

    <div class="tracks-grid">
      <?php
      $tracks = [
        ["Animals", "placeholder_track1.jpg", "gradient-animals"],
        ["Forever", "placeholder_track2.jpg", "gradient-forever"],
        ["In The Name of Love", "placeholder_track3.jpg", "gradient-nameoflove"],
        ["Sun Is Never Going Down", "placeholder_track4.jpg", "gradient-sun"],
        ["Scared To Be Lonely", "placeholder_track5.jpg", "gradient-scared"],
        ["Forbidden Voices", "placeholder_track6.jpg", "gradient-forbidden"]
      ];

      foreach ($tracks as [$title, $image, $gradient]):
      ?>
        <div class="track-card">
          <img src="/uploads/<?= $image ?>" class="track-card__cover" alt="<?= $title ?> Cover" />
          <div class="track-card__info <?= $gradient ?>">
            <span class="track-card__title"><?= $title ?></span>
            <div class="track-card__buttons">
              <button class="track-card__play"></button>
              <a href="#"><img src="/uploads/spotify_icon.svg" alt="Spotify" class="track-card__spotify" /></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <script src="/js/cms.js?v=65"></script>
<div class="bg-yellow">
    <?php include __DIR__ . '/../footer.php'; ?>
</div>
