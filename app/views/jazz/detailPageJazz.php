<?php
include __DIR__ . '/../header.php';

?>

<section class="flex bg-yellow">
    <img class="w-50" src="/uploads/jazz_pictures/haarlemJazz_vector.svg" >
    <h6 class="fs-1 w-50 purple contenteditable" data-title="FirstSection">
        <?= getContentByTitle($blocks, 'FirstSection') ?>
    </h6>
</section>



<section class="bg-yellow pt-5">
    <div class="position-relative">
        <img src="/uploads/bg_section1.svg" class="w-100" alt="">
        <div class="position-absolute  contenteditable top-50 d-flex start-50 text-center translate-middle text-white">
            <section>
        <img class="w-75" src="<?= getMediaByTitle($blocks, 'FirstSection') ?: '' ?>" alt="">
        <h1 class="title-artist"><?= htmlspecialchars($blocks[0]->page_title ?? '') ?></h1>
    </section>
            <div>
                <h1 class="impact-font contenteditable" data-title="SecondSection">
                    <?= getContentByTitle($blocks, 'SecondSection') ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="bg-yellow pt-5">
    <div class="position-relative">
        <div class="text-center">
            <h2 class="impact-font contenteditable" data-title="ThirdSection">
                <?= getContentByTitle($blocks, 'ThirdSection') ?>
            </h2>
        </div>
    </div>
</section>
<script src="/js/cms.js?v=32"></script>
<div class="bg-yellow">
    <?php include __DIR__ . '/../footer.php'; ?>
</div>
