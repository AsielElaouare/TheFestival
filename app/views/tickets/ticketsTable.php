<h1 class="pink bold ms-5 ps-2">Day</h1>
<div class="show-grid m-5">
    <?php if (!empty($events)): ?>

        <?php 
        $dayNames = ['Thursday', 'Friday', 'Saturday', 'Sunday', 'Access Pass'];
        $groupedEvents = [
            'Thursday' => [],
            'Friday' => [],
            'Saturday' => [],
            'Sunday' => [],
            'Access Pass' => []
        ];
        
        // Group the shows by day
        foreach ($events as $event) {
            $dayOfWeek = $event->getDayFromDate(); 

            if (in_array($dayOfWeek, $dayNames)) {
                $groupedEvents[$dayOfWeek][] = $event;
            }
        }
        
        // Filter out days with no shows
        $groupedEvents = array_filter($groupedEvents, function($dayEvents) {
            return !empty($dayEvents);
        });
        ?>
        
        <?php foreach ($groupedEvents as $day => $dayEvents): ?>
    <div class="day-column d-inline">
        <h3 class="day-name bg-yellow pink d-inline ps-2 pe-2 round-boreder-10px"><?php echo $day; ?></h3>
        <?php foreach ($dayEvents as $event): ?>
            <div class="ticket d-flex justify-content-between flex-wrap">
                <p class="bold"><?php echo htmlspecialchars($event->getShowName()); ?></p>
                <p><?php echo htmlspecialchars($event->getStartDate()); ?></p>
                <p><?php echo htmlspecialchars("€ " . $event->getPrice()); ?></p>
                <p><?php echo htmlspecialchars($event->location->getAddressName()); ?></p>
                <div class="button-group">
                    <button class="min-selector btn primary-button ps-2 pe-2 p-0" onclick="updateTicketQuantity(this, 'min')">-</button>
                    <span class="span-quantity me-1 ms-1">0</span>
                    <button class="plus-selector btn primary-button ps-2 pe-2 p-0" onclick="updateTicketQuantity(this, 'plus')">+</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>

<?php else: ?>
    <div class="alert alert-danger text-center">No shows found for the selected genre.</div>
<?php endif; ?>
</div>

<script>
        function updateTicketQuantity(button, action) {
            const spanQuantity = button.parentElement.querySelector('.span-quantity');
            let quantity = parseInt(spanQuantity.innerText);
            
            if (action === "min" && quantity > 0) {
                quantity -= 1;
            } else if (action === "plus") {
                quantity += 1;
            }
            
            spanQuantity.innerText = quantity;
        }
        
</script>


<style>
.show-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr); 
    grid-template-rows: repeat(2, 1fr);
    gap: 20px;
}

.day-column {
    padding: 10px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
}

.day-name {
    text-align: left; 
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 10px;
}
.ticket {
    background-color: #ffffff;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 6px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.ticket p {
    margin: 5px 0;
}

.ticket strong {
    color: #007bff;
}

.alert-danger {
    margin-top: 20px;
    color: red;
    font-size: 1.1rem;
}

.round-boreder-10px{
    border-radius: 10px;
}
</style>
