<?php
include __DIR__ . '/../header.php';

?>
<section class="flex bg-yellow">
    <img class="w-50" src="/uploads/jazz_pictures/haarlemJazz_vector.svg" >
    <h1 class="fs-1 purple contenteditable text-center impact-font" data-title="FirstSection">
        <?= getContentByTitle($blocks, 'FirstSection') ?>
    </h1>
</section>

<section class="bg-yellow pt-5">
    <div >
        <div class=" d-flex justify-content-center text-white">
            <div class="d-flex flex-row justify-content-center">
                <section class="contenteditable" data-title="imgBlock" >
                    <img src="<?= getContentByTitle($blocks, 'imgBlock') ?: '' ?>" width="500rem" height="auto" alt="artist image">
                </section>
                <p  class="h2 ms-4 w-50 contenteditable purple align-self-center ms-3" data-title="SecondSection">
                    <?= getContentByTitle($blocks, 'SecondSection') ?>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="bg-yellow pt-5">
    <div class="position-relative">
        <img src="/uploads/bg_section1.svg" class="w-100" alt="">
        <div class="position-absolute  top-50 d-flex start-50 text-center translate-middle text-white">
            <div class="d-flex flex-row">
                <h1 style="font-size: 5rem;" class="yellow impact-font">Keytracks</h1>
            </div>
        </div>
    </div>
</section>
<section class="bg-yellow pt-5">
        <div class="text-center d-flex justify-content-center align-items-center">
            <img src="/uploads/trumpet.png" class="w-25" alt="">
            <p class=" contenteditable purple w-50 ms-5 w-50" style="font-size: 2rem;" data-title="ThirdSection">
                <?= getContentByTitle($blocks, 'ThirdSection') ?>
            </p>
        </div>
</section> 

<section class="bg-yellow">
<div class="container mt-5 purple impact-font">
  <div class="row align-items-center justify-content-center text-center">
    <!-- Thursday Section -->
    <div class="col-md-6 mb-4 d-flex justify-content-center">
      <div class="card h-100 bg-coral w-50">
        <section data-title="ArtsCardJazzImgTrack1" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsCardJazzImgTrack1')) ?>" class="card-img-top p-3" alt="">
        </section>
      </div>
    </div>

    <!-- Friday Section -->
    <div class="col-md-6 mb-4 d-flex justify-content-center">
      <div class="card h-100 bg-coral w-50">
      <section data-title="ArtsCardJazzImgTrack2" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsCardJazzImgTrack2')) ?>" class="card-img-top p-3" alt="">
        </section>
      </div>
    </div>

    <!-- Saturday Section -->
    <div class="col-md-6 mb-4 d-flex justify-content-center">
      <div class="card h-100 bg-coral w-50">
      <section data-title="ArtsCardJazzImgTrack3" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsCardJazzImgTrack3')) ?>" class="card-img-top p-3" alt="">
        </section>
      </div>
    </div>

    <!-- Sunday Section -->
    <div class="col-md-6 mb-4 d-flex justify-content-center">
      <div class="card h-100 bg-coral w-50">
      <section data-title="ArtsCardJazzImgTrack4" class="contenteditable">
          <img src="<?= html_entity_decode(getContentByTitle($blocks, 'ArtsCardJazzImgTrack4')) ?>" class="card-img-top p-3 " alt="">
        </section>
      </div>
    </div>
  </div>
</div>
</section>

<script src="/js/cms.js?v=65"></script>
<div class="bg-yellow">
    <?php include __DIR__ . '/../footer.php'; ?>
</div>
