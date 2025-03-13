<h1 class="pink bold ms-5 ps-2">Day</h1>
<div class="show-grid m-5">
    <?php if (!empty($events)): ?>
        <?php 
        $dayNames = ['Thursday', 'Friday', 'Saturday', 'Sunday'];
        $groupedEvents = [
            'Thursday' => [], 'Friday' => [],'Saturday' => [],'Sunday' => []
        ];

        foreach ($events as $event) {
            $dayOfWeek = $event->getDayFromDate(); 

            if (in_array($dayOfWeek, $dayNames)) {
                $groupedEvents[$dayOfWeek][] = $event;
            }
        }
        
        $groupedEvents = array_filter($groupedEvents, function($dayEvents) {
            return !empty($dayEvents);
        });
        ?>
        
        <?php foreach ($groupedEvents as $day => $dayEvents): ?>
    <div class="day-column d-inline">
        <h3 class="day-name bg-yellow pink d-inline ps-2 pe-2 round-boreder-10px"><?php echo $day; ?></h3>
        <?php foreach ($dayEvents as $event): ?>
            <div class="ticket d-flex justify-content-between flex-wrap">
                <span class="event-id" hidden><?php echo htmlspecialchars($event->getEventId())?></span>
                <p class="bold"><?php echo htmlspecialchars($event->getEventName()); ?></p>
                <p class="startd-date"><?php echo htmlspecialchars($event->getStartDate()); ?></p>
                <p class="price"><?php echo htmlspecialchars("€ " . $event->getPrice()); ?></p>
                <p class="location"><?php echo htmlspecialchars($event->location->getAddressName()); ?></p>
                <?php if (get_class($event) === 'App\Models\Show'): ?>
                    <span hidden class="artists-name"><?php echo htmlspecialchars($event->getArtistName()); ?></span>
                <?php endif; ?>
                <div class="button-group">
                    <button class="min-selector btn primary-button ps-2 pe-2 p-0" onclick="updateTicketQuantity(this, 'min')">-</button>
                    <span class="span-quantity me-1 ms-1"><?php echo $event->getWantedQuantity()?></span>
                    <button class="plus-selector btn primary-button ps-2 pe-2 p-0" onclick="updateTicketQuantity(this, 'plus')">+</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
</div>

<div class="d-flex justify-content-center">
    <?php else: ?>
        <div class="alert alert-danger text-center"><?php echo $error ?></div>
    <?php endif; ?>
</div>

<script>
    const checkoutButton = document.querySelector('#checkoutButton');
    const cartBadgeCount = document.querySelector('#cart-count');
    let ticketCount = cartBadgeCount.innerText;

    function toggleCheckoutButton() {
        if (ticketCount > 0) {
            checkoutButton.disabled = false;  
        } else {
            checkoutButton.disabled = true;   
        }
    }

    function updateTicketQuantity(button, action) {
    const ticketElement = button.closest('.ticket');
    const spanQuantity = ticketElement.querySelector('.span-quantity');
    let quantity = parseInt(spanQuantity.innerText);

    const ticketData = {
        eventId: ticketElement.querySelector('span.event-id').innerText,
        eventName: ticketElement.querySelector('p.bold').innerText,
        price: ticketElement.querySelector('p.price').innerText.replace(/[^\d,.]/g, ''),  
        startDate: ticketElement.querySelector('p.startd-date').innerText,  
        location: ticketElement.querySelector('p.location').innerText,
        artistsName: ticketElement.querySelector('span.artists-name') ? ticketElement.querySelector('span.artists-name').innerText : ''
    };


    if (action === "min" && quantity > 0) {
        quantity -= 1;
        ticketCount--;
        toggleCheckoutButton();

    } else if (action === "plus") {
        quantity += 1;
        ticketCount++;
        toggleCheckoutButton();
    }

    spanQuantity.innerText = quantity;

    $.ajax({
        url: "/cart/saveSelectedTicketinShoppingCart", 
        type: "POST",
        data: { ticket: ticketData, quantity: quantity },
        success: function(response) {
            console.log("Cart updated:", response);
        }
    });
    cartBadgeCount.innerText =ticketCount;
}
toggleCheckoutButton()
</script>
<style>
</style>
