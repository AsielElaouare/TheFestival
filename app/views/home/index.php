<?php
include __DIR__. '/../header.php';
?>

<div class="header-section w-100 position-relative">
    <video class="header-video position-absolute" autoplay muted loop playsinline>
        <source src="/uploads/header-vid.mp4" type="video/mp4">
    </video>
    <div class="d-flex flex-column align-items-center top-50 start-50 translate-middle position-absolute">
        <img width="230px" src="/uploads/logo.svg" alt="">
        <button class="primary-button impact-font">Tickets</button>
    </div>
</div>

<div class="w-100 bg-yellow">
    <img class="w-100 object-fit-cover" height="60px" src="/uploads/header-purple-waves.svg" alt="">
</div>


    <section class="bg-yellow pt-5">
        <div class="position-relative">
            <img src="uploads/bg_section2.svg" class="w-100" alt="">
            <div class="position-absolute top-50 start-0 translate-middle-y w-100 d-flex justify-content-start">
                <div class="text-start ms-5 p-5 w-50">
                    <h1 class="impact-font yellow contenteditable"  data-title="Welcome Message">
                        <?= html_entity_decode(getContentByTitle($blocks, 'Welcome Message')) ?>
                    </h1>
                    <h6 class="yellow text-wrap contenteditable"  data-title="Festival Overview">
                        <?= html_entity_decode(getContentByTitle($blocks, 'Festival Overview')) ?>
                    </h6>
                </div>
            </div>
        </div>
    </section>

    <section class="w-100 bg-yellow pt-5 pb-5">
        <div class="d-flex justify-content-between align-items-center m-5">
            <img src="/uploads/fireworks.svg" class="m-5" alt="">
            <h1 class="purple impact-font m-0 text-center contenteditable" style="font-size: 4rem;"  data-title="Festival Route">
                <?= html_entity_decode(getContentByTitle($blocks, 'Festival Route')) ?>
            </h1>
            <img src="/uploads/fireworks.svg" class="m-5" width="100px" alt="">
        </div>
    </section>

    <section class="bg-yellow">
        <div class="position-relative">
            <img src="uploads/buy-tickets-bg.svg" class="w-100" alt="">
            <div class="position-absolute bottom-0 start-50 translate-middle d-flex justify-content-center align-items-center w-100">
                <div class="text-center w-50">
                    <h1 class="yellow impact-font contenteditable"  data-title="Call to action">
                        <?= html_entity_decode(getContentByTitle($blocks, 'Call to action')) ?>
                    </h1>
                    <a href="/tickets" class="btn primary-button impact-font">Tickets</a>
                </div>
            </div>
        </div>
        <div>
            <img src="/uploads/Flags.svg" class="w-100" alt="">
            <h1 class="m-0 text-center p-5 impact-font purple contenteditable" style="font-size: 4rem;"  data-title="last section">
                <?= html_entity_decode(getContentByTitle($blocks, 'last section')) ?>
            </h1>
        </div>
    </section>


<script src="/js/cms.js"></script>
<div class="bg-yellow">
    <?php
    require __DIR__ ."/../footer.php";
    ?>
</div>