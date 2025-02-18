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
<div class="w-100">
        <img class="w-100 object-fit-cover" height="60px"  src="/uploads/header-purple-waves.svg" alt="">
</div>

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
