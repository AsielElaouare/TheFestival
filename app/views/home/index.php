<?php
include __DIR__. '/../header.php';
?>
<div class="header-section w-100 position-relative">
    <video class="header-video  position-absolute" autoplay muted loop playsinline>
        <source  src="/uploads/header-vid.mp4" type="video/mp4">
    </video>
    <div class="d-flex flex-column align-items-center top-50 start-50 translate-middle position-absolute">
        <img width="230px" src="/uploads/logo.svg" alt="">
        <button class="primary-button impact-font">Tickets</button>
    </div>
   
</div>
<div class="w-100 bg-yellow">
        <img class="w-100 object-fit-cover" height="60px"  src="/uploads/header-purple-waves.svg" alt="">
</div>

<section class="bg-yellow">
    <div class="d-flex flex-wrap justify-content-center pt-5">
        <div>
            <img src="uploads/dance_event.svg" class="img-fluid" alt="">
        </div>
        <div>
            <img src="uploads/jazz_event.svg" class="img-fluid" alt="">
        </div>
        <div>
            <img src="uploads/magic_tylers.svg" class="img-fluid" alt="">
        </div>
        <div>
            <img src="uploads/yummy_event.svg" class="img-fluid" alt="">
        </div>
        <div>
            <img src="uploads/haarlem_history.png"class="img-fluid" alt="">
        </div>
    </div>
</section>

<section class="bg-yellow pt-5">
    <div class="position-relative">
        <img src="uploads/bg_section2.svg" class="w-100" alt="">
        <div class="position-absolute top-50 start-0 translate-middle-y w-100 d-flex justify-content-start">
            <div class="text-start ms-5 p-5 w-50">
                <h1 class="impact-font yellow">Welcome to The Festival in Haarlem</h1>
                <p class="yellow text-wrap">
                    Discover the best of Haarlem at The Festival, a vibrant celebration of culture, music, and community 
                    taking place across the city’s iconic venues. Savor delicious food at Yummy, groove to soulful tunes at 
                    the Jazz Event, and dance the night away at the high-energy Dance Event. Dive into the city’s past with 
                    Haarlem History experiences, and let kids explore the enchanting Magic@Tylers—a special event just for them. 
                    Join us for an unforgettable day filled with fun, flavor, and festivities for everyone!
                </p>
            </div>
        </div>
    </div>

</section>



<section class="w-100 bg-yellow pt-5 pb-5">
    <div class="d-flex justify-content-between align-items-center m-5">
        <img src="/uploads/fireworks.svg" class="m-5" alt="">
        <h1 class="purple impact-font m-0 text-center " style="font-size: 4rem;">
            Here you can find the route
        </h1>
        <img src="/uploads/fireworks.svg" class="m-5" width="100px" alt="">
    </div>
</section>

<section class="bg-yellow pt-5">
    <div class="position-relative">
        <img src="uploads/section3bg.svg" class="w-100" alt="">
        <div class="position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center w-100">
            <div class="container my-5">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2435.3972454746213!2d4.633717927401216!3d52.381348662927834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5ef6b924ce7ed%3A0xd9721c5337b4704!2sGrote%20Markt%2C%202011%20RD%20Haarlem!5e0!3m2!1ses!2snl!4v1741035874401!5m2!1ses!2snl" 
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-yellow">
    <div class="position-relative">
        <img src="uploads/buy-tickets-bg.svg" class="w-100" alt="">
        <div class="position-absolute bottom-0 start-50 translate-middle d-flex justify-content-center align-items-center w-100">
            <div class="text-center w-50 ">
                <h1 class="yellow impact-font">Buy your tickets now</h1>
                <a href="/tickets" class="btn primary-button impact-font">Tickets</a>
            </div>
        </div>

    </div>
    <div>
        <img src="/uploads/Flags.svg" class="w-100" alt="">
        <h1 class="m-0 text-center p-5 impact-font purple" style="font-size: 4rem;">Join our World</h1>
    </div>
</section>


<div class="bg-yellow">
    <?php
    require __DIR__ ."/../footer.php";
    ?>
</div>

