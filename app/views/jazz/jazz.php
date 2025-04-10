<?php
include __DIR__. '/../header.php';
?>
 
 
<section class="bg-yellow p-0 mt-5">
<section data-title="JazzHeaderImg" class="contenteditable">
          <img  src="<?= html_entity_decode(getContentByTitle($blocks, 'JazzHeaderImg')) ?>" class="card-img-top p-3 w-50">
        </section>
<div class="text-center d-flex justify-content-center align-items-center">
    <h6 class="fs-1 w-50 purple contenteditable" data-title="FirstJazzSection">
      <?= html_entity_decode(getContentByTitle($blocks, 'FirstJazzSection')) ?>
    </h6>
</div>
<div class="text-center">
  <i class="fa-solid fa-circle-down icon-size purple"></i>
</div>


<div class="d-flex justify-content-evenly">
<div class="card card40 bg-pink">
<section data-title="ArtistCard1Intro" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtistCard1Intro')) ?>" class="card-img-top p-3" >
  </section>
  <div class="card-body">
    <h2 class="card-title text-center yellow contenteditable" data-title="ArtistCard1IntroText">          
      <?= html_entity_decode(getContentByTitle($blocks, 'ArtistCard1IntroText')) ?>
    </h2>
    <a href="/jazz/artistView?id=3" class="btn btn-primary">Check Artist</a>
  </div>
</div>

<div class="card card40 bg-pink">
<section data-title="ArtistCard2Intro" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtistCard2Intro')) ?>" class="card-img-top p-3" alt="Wicked Jazz">
  </section>
  <div class="card-body"> 
  <h2 class="card-title text-center yellow contenteditable" data-title="ArtistCard2IntroText">          
      <?= html_entity_decode(getContentByTitle($blocks, 'ArtistCard2IntroText')) ?>
    </h2>
    <a href="/jazz/artistView?id=4" class="btn btn-primary">Check Artist</a>
  </div>
</div>
</div>

<section class="bg-yellow pt-5">
    <div class="position-relative">
        <img src="uploads/bg_section1.svg" class="w-100" alt="">
        <div class="position-absolute top-50 d-flex start-50  text-center translate-middle text-white">
            
        <div>
                <h1 class="impact-font contenteditable yellow" style="font-size: 4rem;" data-title="SecondJazzSection">  <?= html_entity_decode(getContentByTitle($blocks, 'SecondJazzSection')) ?>
                </h1>
              </div>
    </div>
</section>

<div class="d-flex align-items-center justify-content-evenly purple">
  <div>
    <img src="/uploads/jazz_pictures/trumpet_vector.svg" class="w-75" alt="Haarlem Jazz">
  </div>
  <div class="fs-1 w-50">
    <h1>Haarlem Jazz!</h1>
    <p>
    <h6 class="impact-font contenteditable" data-title="ThirdJazzSection">  
      <?= html_entity_decode(getContentByTitle($blocks, 'ThirdJazzSection')) ?>
    </h6>
  </div>
</div>
<div class="container mt-5 purple impact-font">
  <div class="row justify-content-center text-center">
    <!-- Thursday Section -->
    <div class="col-md-6 mb-5">
      <h2>Thursday</h2>
      <div class="card h-100 bg-coral">
        <section data-title="ArtsNr1CardJazzImg" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr1CardJazzImg')) ?>" class="card-img-top p-3" alt="Wicked Jazz">
        </section>
        <div class="card-body d-flex flex-column justify-content-center">
          <p data-title="ArtsNr1JazzCardBody" class="card-text purple impact-font fs-2 contenteditable"><?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr1JazzCardBody')) ?></p>
        </div>
      </div>
    </div>

    <!-- Friday Section -->
    <div class="col-md-6 mb-5">
      <h2 class="">Friday</h2>
      <div class="card h-100 bg-coral">
        <section data-title="ArtsNr2CardJazzImg" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr2CardJazzImg')) ?>" class="card-img-top p-3" alt="Wicked Jazz">
        </section>
        <div class="card-body d-flex flex-column justify-content-center">
          <p data-title="ArtsNr2JazzCardBody" class="card-text purple impact-font fs-2 contenteditable"><?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr2JazzCardBody')) ?></p>
        </div>
      </div>
    </div>

    <!-- Saturday Section -->
    <div class="col-md-6 mb-5">
      <h2 class="mt-5">Saturday</h2>
      <div class="card h-100 bg-coral">
        <section class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr3CardJazzImg')) ?>" class="card-img-top p-3 rounded" alt="Wicked Jazz">
        </section>
        <div class="card-body d-flex flex-column justify-content-center">
          <p data-title="ArtsNr3JazzCardBody" class="card-text purple impact-font fs-2 contenteditable"><?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr3JazzCardBody')) ?></p>
        </div>
      </div>
    </div>

    <!-- Sunday Section -->
    <div class="col-md-6 mb-5">
      <h2 class="mt-5">Sunday</h2>
      <div class="card h-100 bg-coral">
        <section data-title="ArtsNr4CardJazzImg" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr4CardJazzImg')) ?>" class="card-img-top p-3 rounded" alt="Wicked Jazz">
        </section>
        <div class="card-body d-flex flex-column justify-content-center">
          <p data-title="ArtsNr4JazzCardBody" class="card-text purple impact-font fs-2 contenteditable"><?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr4JazzCardBody')) ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<section class="bg-yellow">
<h1 style="margin-top: 160px; font-size: 4rem;" class="purple text-center impact-font">Schedule</h1>
<div class="schedule-container text-center mt-5">
    <?php foreach ($groupedShows as $day => $shows): ?>
      <div class="d-flex justify-content-center">
      <div class="day-section d-flex w-75 justify-content-center">
            <div class="day-label pink"><?= strtoupper($day) ?></div>
            <div class="schedule w-50 ">
              <?php foreach ($shows as $show): ?>
                    <div class="event">
                        <div class="time bg-purple"><?= $show->startDate->format('H:i') ?></div>
                        <div class="artist bg-purple"><?= htmlspecialchars($show->getArtistName()) ?></div>
                        <div class="location bg-purple"><?= htmlspecialchars($show->location->getVenueName()) ?></div>
                    </div>
                <?php endforeach; ?>
              </div>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="buy-tickets">
        <a href="/tickets" class="btn primary-button">Buy your tickets</a>
    </div>
</div>
</section>

<div class="bg-yellow">
  <?php
  include __DIR__. '/../footer.php';
  ?>
</div>


