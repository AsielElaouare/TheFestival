<?php
require __DIR__ ."/../header.php";
?>

<header>
    <div class="bg-purple">
            <div class="ms-2">
                <div class="d-flex justify-content-between ms-5 me-5">
                <a href="/" class="ps-3 pe-3 btn primary-button impact-font mt-3 align-self-center">Back Home</a>
                <div class=" mt-3">
                <button id="shopping-cart-button" class="btn position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
                    <i class="bi bi-cart-fill yellow" style="font-size: 3rem;"></i>
                    <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= $shoppingCartItemCount?>
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
                            <div id="shopping-cart-body" class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                            <form action="/checkout/paymentPortal" method="post">
                                    <button id="checkoutButton" class="btn primary-button" onclick="">
                                        Checkout
                                    </button>
                                </form>
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



<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
    function loadContent(url, containerSelector) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                const container = document.querySelector(containerSelector);
                container.innerHTML = data;
                reinitializeScripts(container);
            });
    }

    function reinitializeScripts(container) {
        const scripts = container.querySelectorAll("script");
        scripts.forEach(script => {
            const newScript = document.createElement("script");
            newScript.textContent = script.textContent;
            document.head.appendChild(newScript).parentNode.removeChild(newScript);
        });
    }

    loadContent("/tickets/showMusicTickets?genre=dance", '.tickets-container');

    document.getElementById("dance-tickets-btn").addEventListener("click", () => {
        loadContent("/tickets/showMusicTickets?genre=dance", '.tickets-container');
    });

    document.getElementById("jazz-tickets-btn").addEventListener("click", () => {
        loadContent("/tickets/showMusicTickets?genre=jazz", '.tickets-container');
    });

    document.getElementById("history-tickets-btn").addEventListener("click", () => {
        loadContent("/tickets/showHistoryTickets", '.tickets-container');
    });

    document.getElementById("shopping-cart-button").addEventListener("click", () => {
        loadContent("/cart/shoppingCart", '#shopping-cart-body' )
    })
});
</script>


<?php
require __DIR__ ."/../footer.php";
?>