<?php
include __DIR__. '/../header.php';
?>
 
 
 <section class="bg-yellow p-0">
<img src="/uploads/haarlemJazz_vector.svg" alt="haarlem jazz logo"> 

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
  <img src="/uploads/jazz_plaatjes/wouterhamel1.svg" class="card-img-top p-4" alt="Wouter Hamel">
  <div class="card-body">
    <h2 class="card-title text-center">Wouter Hamel</h2>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="card card40 bg-pink">
  <img src="/uploads/jazz_plaatjes/ntjamrosie1.svg" class="card-img-top p-3" alt="Ntjam Rosie">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
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
    <img src="/uploads/jazz_plaatjes/trumpet_vector.svg" class="img-fluid" alt="Haarlem Jazz">
  </div>
  <div class="fs-1 w-50">
    <h1>Haarlem Jazz!</h1>
    <p>
    <h1 class="impact-font contenteditable" data-title="ThirdJazzSection">  <?= html_entity_decode(getContentByTitle($blocks, 'ThirdJazzSection')) ?>

    </p>
    <p>
      Explore the schedule, enjoy the atmosphere, and let Haarlem Jazz ignite your passion for music. 
      Let’s make this a festival to remember-see you on the streets of Haarlem!
    </p>
  </div>
</div>
<div class="container mt-5 purple impact-font">

 
  <div class="row justify-content-center text-center">
    <div class="col-md-5">
      <h2>Thursday</h2>
      <div class="card">
        <img src="/uploads/jazz_plaatjes/wickedjazz.svg" class="card-img-top p-3" alt="Wicked Jazz">
        <div class="card-body">
          <p class="card-text purple impact-font fs-2">Wicked Jazz</p>
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <h2>Friday</h2>
      <div class="card">
        <img src="/uploads/jazz_plaatjes/karsu.svg" class="card-img-top p-3" alt="Karsu">
        <div class="card-body">
          <p class="card-text purple impact-font fs-2">Karsu</p>
        </div>
      </div>
    </div>
  </div>

  
  <div class="row justify-content-center text-center mt-4">
    <div class="col-md-5">
      <h2>Saturday</h2>
      <div class="card">
        <img src="uploads/jazz_plaatjes/garedunord.svg" class="card-img-top p-3" alt="Gare Du Nord">
        <div class="card-body">
          <p class="card-text purple impact-font fs-2">Gare Du Nord</p>
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <h2>Sunday</h2>
      <div class="card">
        <img src="uploads/jazz_plaatjes/ruis.svg" class="card-img-top p-3" alt="Ruis">
        <div class="card-body">
          <p class="card-text purple impact-font fs-2">Ruis</p>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="bg-yellow pt-5">
    <div class="position-relative">
        <img src="uploads/bg_section1.svg" class="w-100" alt="">
        <div class="position-absolute top-50 d-flex start-50  text-center translate-middle text-white">
    </div>
</section>
 <img src="/uploads/jazz_plaatjes/sax_vector.svg" alt="a cool saxophone"> 
 
</section>

<?php
include __DIR__. '/../footer.php';
?>
<script  src="/js/cms.js"></script>