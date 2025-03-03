<h1 class="pink bold ms-5 ps-2">Day</h1>
<div class="show-grid m-5">
    <?php if (!empty($shows)): ?>
        <?php 
        $dayNames = ['Thursday', 'Friday', 'Saturday', 'Sunday', 'Access Pass'];
        $groupedShows = [
            'Thursday' => [],
            'Friday' => [],
            'Saturday' => [],
            'Sunday' => [],
            'Access Pass' => []
        ];
        
        // Group the shows by day
        foreach ($shows as $show) {
            $dayOfWeek = $show->getDayFromDate(); 

            if (in_array($dayOfWeek, $dayNames)) {
                $groupedShows[$dayOfWeek][] = $show;
            }
        }
        
        // Filter out days with no shows
        $groupedShows = array_filter($groupedShows, function($dayShows) {
            return !empty($dayShows);
        });
        ?>
        
        <?php foreach ($groupedShows as $day => $dayShows): ?>
            <div class="day-column d-inline">
                <h3 class="day-name bg-yellow pink d-inline ps-2 pe-2 round-boreder-10px"><?php echo $day; ?></h3>
                <?php foreach ($dayShows as $show): ?>
                    <div class="ticket d-flex justify-content-between flex-wrap">
                        <p class="bold"><?php echo htmlspecialchars($show->getShowName()); ?></p>
                        <p><?php echo htmlspecialchars($show->getStartDate()); ?></p>
                        <p><?php echo htmlspecialchars("€ " . $show->getPrice()); ?></p>
                        <p><?php echo htmlspecialchars($show->location->getAddressName()); ?></p>
                        <div class="button-group">
                            <button>-</button>
                            <button>+</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <div class="alert alert-danger text-center">No shows found for the selected genre.</div>
    <?php endif; ?>
</div>

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
