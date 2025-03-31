<?php
include __DIR__ . '/../header.php';
?>
<div class="dance-page bg-yellow">

  <!-- Hero Section (background image is handled in style.css) -->
  <div class="hero-section">
    <div class="hero-overlay">
      <h1 class="impact-font hero-title contenteditable" >DANCE HAARLEM!</h1>
      <p class="hero-description contenteditable" >
        Get ready for an unforgettable weekend filled with electrifying beats, spectacular performances, and world-class DJs!
        Whether you’re here for the biggest names in electronic music or discovering new favorites, DANCE brings you three days
        of nonstop music and energy across stunning venues. Explore our lineup, check out the schedules, and prepare to immerse
        yourself in a celebration of sound, rhythm, and pure joy. Let’s make this a dance event to remember!
      </p>
    </div>
  </div>

  <!-- Featured Artists -->
  <section class="my-5 text-center" id="featured-artists">
  <h2 class="impact-font contenteditable" data-title="FeaturedArtistText">
          <?= getContentByTitle($blocks, 'FeaturedArtistText') ?>
        </h2> 

            <div class="row justify-content-center">
      <div class="col-md-3 text-center mb-4">

        <section class="contenteditable">
        <img  src="<?= getContentByTitle($blocks, 'headerDanceContent') ?>" class="card-img-top p-3 w-50"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        </section>
       
        <a href="/dance/artistView?id=5" class="btn artist-name-btn impact-font">
          <?= getContentByTitle($blocks, 'ArtsNr1CardDanceName') ?>
        </a>
      </div>
      <div class="col-md-3 text-center mb-4">
      <section class="contenteditable">
        <img  src="<?= html_entity_decode(getContentByTitle($blocks, 'headerDanceContent2')) ?>" class="card-img-top p-3 w-50"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        </section>
        <h5 class="impact-font contenteditable" data-title="ArtsNr2CardDanceName">
          <?= getContentByTitle($blocks, 'ArtsNr2CardDanceName') ?>
        </h5>        
      </div>
    </div>
  </section>

  <!-- Line-Up -->
  <section class="my-5" id="line-up">
  <h2 class="impact-font contenteditable" data-title="LineUpTextDance">
          <?= getContentByTitle($blocks, 'LineUpTextDance') ?>
        </h2>     <div class="row">
      <!-- Example lineup cards -->
      <section class="contenteditable">
      <div class="col-md-4 col-lg-2 mb-4">
        <div class="card">
        <img  src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt1Pic')) ?>" class="card-img-top p-3 w-50"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        </section>          
        <div class="card-body text-center p-2">
        <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt1">
          <?= getContentByTitle($blocks, 'LineUpTextDanceArt1') ?>
        </h6>  
                </div>
        </div>
      </div>
      <section class="contenteditable">
      <div class="col-md-4 col-lg-2 mb-4">
        <div class="card">
        <img  src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt2Pic')) ?>" class="card-img-top p-3 w-50"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        </section>  
        <div class="card-body text-center p-2">
        <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt2">
          <?= getContentByTitle($blocks, 'LineUpTextDanceArt2') ?>
        </h6> 
                </div>

        <section class="contenteditable">
      <div class="col-md-4 col-lg-2 mb-4">
        <div class="card">
        <img  src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt3Pic')) ?>" class="card-img-top p-3 w-50"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        </section>  
        <div class="card-body text-center p-2">
        <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt3">
          <?= getContentByTitle($blocks, 'LineUpTextDanceArt3') ?>
        </h6> 
                </div>

        <section class="contenteditable">
      <div class="col-md-4 col-lg-2 mb-4">
        <div class="card">
        <img  src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt4Pic')) ?>" class="card-img-top p-3 w-50"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        </section> 
        <div class="card-body text-center p-2">
        <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt4">
          <?= getContentByTitle($blocks, 'LineUpTextDanceArt4') ?>
        </h6> 
                </div> 

        <section class="contenteditable">
      <div class="col-md-4 col-lg-2 mb-4">
        <div class="card">
        <img  src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt5Pic')) ?>" class="card-img-top p-3 w-50"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        </section> 
        <div class="card-body text-center p-2">
        <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt5">
          <?= getContentByTitle($blocks, 'LineUpTextDanceArt5') ?>
        </h6> 
                </div> 

        <section class="contenteditable">
      <div class="col-md-4 col-lg-2 mb-4">
        <div class="card">
        <img  src="<?= html_entity_decode(getContentByTitle($blocks, 'LineUpArt6Pic')) ?>" class="card-img-top p-3 w-50"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        </section> 
        <div class="card-body text-center p-2">
        <h6 class="impact-font contenteditable" data-title="LineUpTextDanceArt6">
          <?= getContentByTitle($blocks, 'LineUpTextDanceArt6') ?>
        </h6> 
                </div> 
      <!-- Add more lineup cards as needed... -->
    </div>
  </section>

  <!-- Schedule Section (yellow background) -->
  <section class="my-5" id="schedule">
    <h2 class="impact-font purple mb-4 text-center">Schedule</h2>
    <p class="font-weight-bold pink text-center">Dance Event</p>
    <div class="row">
      <!-- Friday Column -->
      <div class="col-md-4">
        <div class="schedule-day bg-pink rounded text-center mb-2">
          <h4 class="purple py-2">FRIDAY</h4>
        </div>
        <div class="schedule-item d-flex align-items-center justify-content-between bg-yellow rounded p-2 mb-2">
          <span class="time pink fw-bold">20:00</span>
          <span class="event">Nicky Romero / Afrojack</span>
          <span class="venue text-muted">Lichtfabriek</span>
          <button class="btn btn-sm btn-primary">Buy Tickets</button>
        </div>
        <!-- More time slots... -->
      </div>
      <!-- Saturday Column -->
      <div class="col-md-4">
        <div class="schedule-day bg-pink rounded text-center mb-2">
          <h4 class="purple py-2">SATURDAY</h4>
        </div>
        <div class="schedule-item d-flex align-items-center justify-content-between bg-yellow rounded p-2 mb-2">
          <span class="time pink fw-bold">14:00</span>
          <span class="event">Armin van Buuren</span>
          <span class="venue text-muted">Caprera</span>
          <button class="btn btn-sm btn-primary">Buy Tickets</button>
        </div>
        <!-- More time slots... -->
      </div>
      <!-- Sunday Column -->
      <div class="col-md-4">
        <div class="schedule-day bg-pink rounded text-center mb-2">
          <h4 class="purple py-2">SUNDAY</h4>
        </div>
        <div class="schedule-item d-flex align-items-center justify-content-between bg-yellow rounded p-2 mb-2">
          <span class="time pink fw-bold">14:00</span>
          <span class="event">Afrojack</span>
          <span class="venue text-muted">Caprera</span>
          <button class="btn btn-sm btn-primary">Buy Tickets</button>
        </div>
        <!-- More time slots... -->
      </div>
    </div>
  </section>

  <div class="text-center my-5">
    <button class="primary-button impact-font icon-size">View Full Line-Up</button>
  </div>
</div>
<script src="/js/cms.js?v=65"></script>

<?php
include __DIR__ . '/../footer.php';
?>
