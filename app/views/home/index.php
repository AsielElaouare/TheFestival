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
            <img src="uploads/dance_event.svg" alt="">
        </div>
        <div>
            <img src="uploads/jazz_event.svg" alt="">
        </div>
        <div>
            <img src="uploads/magic_tylers.svg" alt="">
        </div>
        <div>
            <img src="uploads/yummy_event.svg" alt="">
        </div>
        <div>
            <img src="uploads/haarlem_history.png" alt="">
        </div>
    </div>
</section>

<section class="bg-yellow pt-5">
    <div class="position-relative">
        <img src="uploads/bg_section2.svg" class="w-100" alt="">
        <div class="position-absolute top-50 d-flex start-50 translate-middle text-center text-white">
            
        <div class="m-2">
                <h1 class="impact-font yellow">Welcome to The Festival in Haarlem</h2>
                <p class="yellow">Discover the best of Haarlem at The Festival, a vibrant celebration of culture, music, and community taking place across the city’s iconic venues. Savor delicious food at Yummy, groove to soulful tunes at the Jazz Event, and dance the night away at the high-energy Dance Event. Dive into the city’s past with Haarlem History experiences, and let kids explore the enchanting Magic@Tylers—a special event just for them. Join us for an unforgettable day filled with fun, flavor, and festivities for everyone!</p>
            </div>
            <img src="uploads/img_section2.svg" width="500px" class="p-3" alt="">
    </div>
</section>  

<form action="checkout/paymentPortal">
    <span>Enter ammount of tickets</span>
    <input type="number" name="quantity" min="1" value="1" required>
    <button>
        pay button test
    </button>
</form>
<?php
include __DIR__. '/../footer.php';
?>
