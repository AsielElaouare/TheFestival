<?php
include __DIR__ . '/../header.php';
?>
<div class="dance-page">

  <!-- Hero Section (background image is handled in style.css) -->
  <div class="hero-section">
    <div class="hero-overlay">
      <h1 class="impact-font hero-title">DANCE HAARLEM!</h1>
      <p class="hero-description">
        Get ready for an unforgettable weekend filled with electrifying beats, spectacular performances, and world-class DJs!
        Whether you’re here for the biggest names in electronic music or discovering new favorites, DANCE brings you three days
        of nonstop music and energy across stunning venues. Explore our lineup, check out the schedules, and prepare to immerse
        yourself in a celebration of sound, rhythm, and pure joy. Let’s make this a dance event to remember!
      </p>
    </div>
  </div>

  <!-- Featured Artists -->
  <section class="my-5 text-center" id="featured-artists">
    <h2 class="impact-font purple mb-4">Featured Artists</h2>
    <div class="row justify-content-center">
      <div class="col-md-3 text-center mb-4">
        <img src="/uploads/martingarrixfirst.jpg"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        <h5 class="pink">Martin Garrix</h5>
      </div>
      <div class="col-md-3 text-center mb-4">
        <img src="/uploads/hardwellfirst.jpg"
             class="img-fluid rounded-circle mb-2"
             style="width: 150px; height: 150px; object-fit: cover;">
        <h5 class="pink">Hardwell</h5>
      </div>
    </div>
  </section>

  <!-- Line-Up -->
  <section class="my-5" id="line-up">
    <h2 class="impact-font purple mb-4 text-center">Line-Up</h2>
    <div class="row">
      <!-- Example lineup cards -->
      <div class="col-md-4 col-lg-2 mb-4">
        <div class="card">
          <img src="/uploads/arminvanbuurennoback.png" class="card-img-top object-fit-cover">
          <div class="card-body text-center p-2">
            <h6 class="mb-0 pink">Armin van Buuren</h6>
          </div>
        </div>
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

<?php
include __DIR__ . '/../footer.php';
?>
