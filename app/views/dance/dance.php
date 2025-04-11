<?php include __DIR__ . '/../header.php'; ?>
<link rel="stylesheet" href="/style/style.css">

<div class="dance-page">

  <!-- Hero Section -->
<div class="hero-section">
  <div class="hero-overlay">
  <img src="/uploads/DANCEHAARLEM.png" alt="Dance Haarlem Logo" class="dance-logo-img" />
  </div>
</div>

<section class="bg-yellow py-5">
<div class="container text-center">
      <p class="hero-description ">
        Get ready for an unforgettable weekend filled with electrifying beats, spectacular performances, and world-class DJs!
        Whether you’re here for the biggest names in electronic music or discovering new favorites, DANCE brings you three days
        of nonstop music and energy across stunning venues. Explore our lineup, check out the schedules, and prepare to immerse
        yourself in a celebration of sound, rhythm, and pure joy. Let’s make this a dance event to remember!
      </p>
    </div>
</section>

  <!-- Purple Wave + Featured Title -->
<section class="position-relative wave-section">
  <img src="/uploads/bg_section1.svg" class="wave-svg" alt="Wave">
  <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
    <h2 class="impact-font display-3 contenteditable" data-title="FeaturedArtistText">
      <?= getContentByTitle($blocks, 'FeaturedArtistText') ?>
    </h2>
  </div>
</section>

<!-- Yellow Background Starts Here INCLUDING artists -->
<div class="bg-yellow py-5">

  <!-- Featured Artists Section -->
  <section class="my-5" id="featured-artists">
    <div class="container">
      <div class="row justify-content-center text-center">

        <!-- Martin Garrix -->
        <div class="col-md-4 d-flex flex-column align-items-center mb-4">
          <section class="contenteditable" data-title="headerDanceContent">
            <img src="<?= getContentByTitle($blocks, 'headerDanceContent') ?>" class="featured-artist-img" />
          </section>
          <a href="/dance/artistView?id=6" class="btn artist-name-btn impact-font mt-2">
            <?= getContentByTitle($blocks, 'ArtsNr1CardDanceName') ?>
          </a>
        </div>

        <!-- Hardwell -->
        <div class="col-md-4 d-flex flex-column align-items-center mb-4">
          <section class="contenteditable" data-title="headerDanceContent2">
            <img src="<?= getContentByTitle($blocks, 'headerDanceContent2') ?>" class="featured-artist-img" />
          </section>
          <a href="/dance/artistView?id=7" class="btn artist-name-btn impact-font mt-2">
            <?= getContentByTitle($blocks, 'ArtsNr2CardDanceName') ?>
          </a>
        </div>

      </div>
    </div>
  </section>

</div>


<!--  Line-Up Title with SVG Background -->
<section class="position-relative wave-lineup-section">
    <img src="/uploads/bg_section1.svg" class="lineup-wave-svg" alt="Line-Up Wave Background">
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
      <h2 class="impact-font display-3 contenteditable" data-title="LineUpTextDance">
        <?= getContentByTitle($blocks, 'LineUpTextDance') ?>
      </h2>
    </div>
</section>

<!-- Line-Up Section -->
<section class="my-5" id="line-up">
  <div class="row justify-content-center">
    
    <!-- Artist 1 -->
    <div class="col-md-4 col-lg-2 mb-4">
      <div class="card text-center">
        <section class="contenteditable" data-title="LineUpArt1Pic">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt1Pic')) ?>"
               class="card-img-top artist-img lineup-img">
        </section>
        <div class="card-body p-2">
          <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt1">
            <?= getContentByTitle($blocks, 'LineUpTextDanceArt1') ?>
          </h6>
        </div>
      </div>
    </div>

    <!-- Artist 2 -->
    <div class="col-md-4 col-lg-2 mb-4">
      <div class="card text-center">
        <section class="contenteditable" data-title="LineUpArt2Pic">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt2Pic')) ?>"
               class="card-img-top artist-img lineup-img">
        </section>
        <div class="card-body p-2">
          <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt2">
            <?= getContentByTitle($blocks, 'LineUpTextDanceArt2') ?>
          </h6>
        </div>
      </div>
    </div>

    <!-- Artist 3 -->
    <div class="col-md-4 col-lg-2 mb-4">
      <div class="card text-center">
        <section class="contenteditable" data-title="LineUpArt3Pic">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt3Pic')) ?>"
               class="card-img-top artist-img lineup-img">
        </section>
        <div class="card-body p-2">
          <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt3">
            <?= getContentByTitle($blocks, 'LineUpTextDanceArt3') ?>
          </h6>
        </div>
      </div>
    </div>

    <!-- Artist 4 -->
    <div class="col-md-4 col-lg-2 mb-4">
      <div class="card text-center">
        <section class="contenteditable" data-title="LineUpArt4Pic">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt4Pic')) ?>"
               class="card-img-top artist-img lineup-img">
        </section>
        <div class="card-body p-2">
          <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt4">
            <?= getContentByTitle($blocks, 'LineUpTextDanceArt4') ?>
          </h6>
        </div>
      </div>
    </div>

    <!-- Artist 5 -->
    <div class="col-md-4 col-lg-2 mb-4">
      <div class="card text-center">
        <section class="contenteditable" data-title="LineUpArt5Pic">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt5Pic')) ?>"
               class="card-img-top artist-img lineup-img">
        </section>
        <div class="card-body p-2">
          <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt5">
            <?= getContentByTitle($blocks, 'LineUpTextDanceArt5') ?>
          </h6>
        </div>
      </div>
    </div>

    <!-- Artist 6 -->
    <div class="col-md-4 col-lg-2 mb-4">
      <div class="card text-center">
        <section class="contenteditable" data-title="LineUpArt6Pic">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt6Pic')) ?>"
               class="card-img-top artist-img lineup-img">
        </section>
        <div class="card-body p-2">
          <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt6">
            <?= getContentByTitle($blocks, 'LineUpTextDanceArt6') ?>
          </h6>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Schedule Section -->
    <section class="schedule-section bg-purple text-center text-white py-5">
    <div class="schedule-header">
      <h1 class="impact-font">Schedule</h1>
    </div>    
    
    <div class="container d-flex flex-column align-items-center">
      <?php foreach ($schedule as $day => $dayShows): ?>
        <!-- Block for each day -->
        <div class="schedule-day ">
          <h2 class="impact-font schedule-day-title">
            <?= htmlspecialchars($day) ?>
          </h2>
          <?php foreach ($dayShows as $show): ?>
            <div class="schedule-show">
              <strong><?= date('H:i', strtotime($show['start_date'])) ?></strong>
              – <?= htmlspecialchars($show['artist_name'] ?? 'Unknown Artist') ?>
              – <?= htmlspecialchars($show['venue_name'] ?? 'Unknown Venue') ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>



  <div class="text-center my-5">
  <a href="/tickets" class="btn primary-button mx-auto">Buy your tickets</a>
  </div>

</div>

<script src="/js/cms.js?v=65"></script>
<div class="bg-yellow">
<?php include __DIR__ . '/../footer.php'; ?>
</div>

