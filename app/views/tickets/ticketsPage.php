<?php
require __DIR__ ."/../header.php";
?>

<header>
    <div class="bg-purple">
            <div class="ms-2">
                <div class="d-flex justify-content-between ms-5 me-5">
                <a href="/" class="ps-3 pe-3 btn primary-button impact-font mt-3 align-self-center">Back Home</a>
                <div class=" mt-3">
                <button class="btn position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
                    <i class="bi bi-cart-fill yellow" style="font-size: 3rem;"></i>
                    <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= array_sum(array_column($shoppingCart, 'quantity')) ?: 0 ?>
                </span>
                </button>
                </div>
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php 
                $totalAmount = 0; 
                if (!empty($shoppingCart)) { ?>
                    <div class="list-group">
                        <?php foreach ($shoppingCart as $key => $item) { 
                            $itemTotal = (float)$item['price'] * (int)$item['quantity']; 
                            $totalAmount += $itemTotal;
                        ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold purple"><?= htmlspecialchars($item['eventName']) ?></span>
                                    <span><?= !empty($item['artistsName']) ? htmlspecialchars($item['artistsName']) : 'N/A' ?></span>
                                    <span>Location: <?= htmlspecialchars($item['location']) ?></span>
                                    <span>Date: <?= date("F j, Y - g:i A", strtotime($item['startDate'])) ?></span>
                                    <span>Price: €<?= number_format((float)$item['price'], 2) ?></span>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <span class="badge bg-primary" style="font-size: 0.9rem;">Qty: <?= htmlspecialchars($item['quantity']) ?></span>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger text-center">Your Shopping Cart is Empty</div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-between w-100">
                    <span class="fw-bold">Total: </span>
                    <span class="text-success fw-bold">€<?= number_format($totalAmount, 2) ?></span>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
                </div>
                <div class="d-flex justify-content-center ">
                    <img src="/uploads/logo.svg" class="logo-tickets-page" width="200px m-0">
                </div>
                
                <h2 class="impact-font light-yellow">Tickets</h2>
                <div class="menu impact-font" >
                        <button id="dance-tickets-btn" class=" p-0 btn text-white btn-font-size">Dance</button>
                        <button id="jazz-tickets-btn" class=" p-1 btn text-white btn-font-size">| Jazz</button>
                        <button id="history-tickets-btn" class=" p-1 btn text-white btn-font-size ">| History</button>
                        <button id="personal-program-tickets-btn" class=" p-1 btn text-white btn-font-size">| Personal Program</button>
                </div>
            </div>
    </div>
    <div class="festival-info ms-2" style="font-size: 0.7rem;">  
        <h5>Entrance Tickets</h5>
        <ul class="list-unstyled">
            <li>Festival Haarlem</li>
            <li>5 - 9 Jun 2025</li>
            <li>De Grote Marktm, Haarlem</li>
        </ul> 
    </div>
   
</header>
<div class="bg-purple w-100">
    <ul class="list-unstyled d-flex text-white p-1" style="font-size: .7rem;">
        <li class="ms-2 bg-coral p-1 round-boreder-4px">All</li>
        <li class="ms-2 bg-coral p-1 round-boreder-4px">Day</li>
        <li class="ms-2 bg-coral p-1 round-boreder-4px">All Access</li>
    </ul>
</div>
<div class="tickets-container">
    <!-- load tickets here -->
</div>


<form action="/checkout/paymentPortal" method="post">
    <button id="checkoutButton" class="btn primary-button" onclick="">
        Checkout
    </button>
</form>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
    
        $('.tickets-container').load("/tickets/showMusicTickets?genre=dance"); //default tickets screen

        $("#dance-tickets-btn").on("click", function() {
            $('.tickets-container').load("/tickets/showMusicTickets?genre=dance");
        });

        $("#jazz-tickets-btn").on("click", function() {
            $('.tickets-container').load("/tickets/showMusicTickets?genre=jazz");
        });

        $("#history-tickets-btn").on("click", function() {
            $('.tickets-container').load("/tickets/showHistoryTickets");
        });

        $("#personal-program-tickets-btn").on("click", function() {
            $('.tickets-container').load("/tickets/showPersonalProgram");
        });
});

</script>


<?php
require __DIR__ ."/../footer.php";
?>