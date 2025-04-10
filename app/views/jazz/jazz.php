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
  <img src="/uploads/jazz_pictures/wouterhamel1.svg" class="card-img-top p-4" alt="Wouter Hamel">
  <div class="card-body">
    <h2 class="card-title text-center yellow">Wouter Hamel</h2>
    <a href="/jazz/artistView?id=3" class="btn btn-primary">Check Artist</a>
  </div>
</div>

<div class="card card40 bg-pink">
  <img src="/uploads/jazz_pictures/ntjamrosie1.svg" class="card-img-top p-3" alt="Ntjam Rosie">
  <div class="card-body"> 
  <h2 class="card-title text-center yellow">Natjam</h2>
    <a href="/jazz/artistView?id=4" class="btn btn-primary">Check Artist</a>
  </div>
</div>
</div>

<section class="bg-yellow pt-5">
    <div class="position-relative">
        <img src="uploads/bg_section1.svg" class="w-100" alt="">
        <div class="position-absolute top-50 d-flex start-50  text-center translate-middle text-white">
            
        <div>
                <h1 class="impact-font contenteditable" data-title="SecondJazzSection">  <?= html_entity_decode(getContentByTitle($blocks, 'SecondJazzSection')) ?>
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
    <div class="col-md-5 mb-4">
      <h2>Thursday</h2>
      <div class="card">
        <section data-title="ArtsNr1CardJazzImg" class="contenteditable">
          <img  src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr1CardJazzImg')) ?>" class="card-img-top p-3" alt="Wicked Jazz">
        </section>
        <div class="card-body ">
          <p data-title="ArtsNr1JazzCardBody " class="card-text purple impact-font fs-2 contenteditable"><?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr1JazzCardBody')) ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Saturday, Sunday, and Friday Section (3 Columns) -->
  <div class="row justify-content-center text-center mt-4">
    <!-- Saturday Card -->
    <div class="col-md-4 mb-4">
      <h2>Friday</h2>
      <div class="card">
        <section data-title="ArtsNr2CardJazzImg" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr2CardJazzImg')) ?>" class="card-img-top p-3" alt="Wicked Jazz">
        </section>
        <div class="card-body">
          <p data-title="ArtsNr2JazzCardBody" class="card-text purple impact-font fs-2 contenteditable"><?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr2JazzCardBody')) ?></p>
        </div>
      </div>
    </div>

    <!-- Sunday Card -->
    <div class="col-md-4 mb-4">
      <h2>Saturday</h2>
      <div class="card">
        <section class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr3CardJazzImg')) ?>" class="card-img-top p-3" alt="Wicked Jazz">
        </section>
        <div class="card-body">
          <p data-title="ArtsNr3JazzCardBody" class="card-text purple impact-font fs-2 contenteditable"><?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr3JazzCardBody')) ?></p>
        </div>
      </div>
    </div>

    <!-- Friday Card -->
    <div class="col-md-4 mb-4">
      <h2>Sunday</h2>
      <div class="card">
        <section data-title="ArtsNr4CardJazzImg" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr4CardJazzImg')) ?>" class="card-img-top p-3" alt="Wicked Jazz">
        </section>
        <div class="card-body">
          <p data-title="ArtsNr4JazzCardBody" class="card-text purple impact-font fs-2 contenteditable"><?= html_entity_decode(getContentByTitle($blocks, 'ArtsNr4JazzCardBody')) ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<section class="bg-yellow">
<div class="container mt-5 bg-yellow mb-5">
    <h2 class="impact-font text-center purple">Available Tickets</h2>
    <table class="table table-striped table-bordered ">
        <thead class="table-dark">
            <tr>
                <th>Artist</th>
                <th>Event Name</th>
                <th>Start Date</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($jazzShows as $show): ?>
                <tr>
                    <td><?= htmlspecialchars($show->getArtistName()) ?></td>
                    <td><?= htmlspecialchars($show->name) ?></td>
                    <td><?= $show->startDate->format('Y-m-d H:i') ?></td>
                    <td>
                        <?= htmlspecialchars($show->location->getVenueName()) ?><br>
                        <?= htmlspecialchars($show->location->getStreetName()) ?>, <?= htmlspecialchars($show->location->getPostalCode()) ?><br>
                        <?= htmlspecialchars($show->location->getCity()) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="">
    <a href="/tickets" class="btn primary-button mx-auto">Buy your tickets</a>
  </div>
</div>
</section>
<div class="bg-yellow">
  <?php
  include __DIR__. '/../footer.php';
  ?>
</div>


