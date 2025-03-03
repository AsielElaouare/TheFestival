<?php
require __DIR__ ."/../header.php";
?>

<header>
    <div class="bg-purple">
        <div class="ms-2">
            <a href="/" class="ps-3 pe-3 btn primary-button impact-font mt-3">Back Home</a>
            <div class="d-flex justify-content-center " style="z-index: 999;">
                <img src="/uploads/logo.svg" class="logo-tickets-page" width="200px m-0">
            </div>
            <h2 class="impact-font light-yellow">Tickets</h2>
            <div class="menu impact-font" >
                    <button id="dance-tickets-btn" class=" p-0 btn text-white btn-font-size">Dance</button>
                    <button id="jazz-tickets-btn" class=" p-1 btn text-white btn-font-size">| Jazz</button>
                    <button id="history-tickets-btn" class=" p-1 btn text-white btn-font-size ">| History</button>
                    <button class=" p-1 btn text-white btn-font-size">| Personal Program</button>
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

</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
    
    $('.tickets-container').load("/tickets/showMusicTickets?genre=dance");

    $("#dance-tickets-btn").on("click", function() {
        $('.tickets-container').load("/tickets/showMusicTickets?genre=dance");
    });

    $("#jazz-tickets-btn").on("click", function() {
        $('.tickets-container').load("/tickets/showMusicTickets?genre=jazz");
    });
    $("#history-tickets-btn").on("click", function() {
        $('.tickets-container').load("/tickets/showHistoryTickets");
    });
});

</script>

<?php
require __DIR__ ."/../footer.php";
?>