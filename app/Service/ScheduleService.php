<?php
namespace App\Service;

use App\Service\ShowService;

class ScheduleService
{
    private ShowService $showService;

    public function __construct(ShowService $showService)
    {
        $this->showService = $showService;
    }
    
    /**
     * geef array terug van danceshows gegroepeerd op dag
     */
    public function getDanceSchedule(): array
    {
        $allShows = $this->showService->getAllShows();

        $danceShows = array_filter($allShows, function($show) {
            return isset($show['artist_genre']) && strtolower(trim($show['artist_genre'])) === 'dance';
        });
        
        // Group shows by weekday name. Only include Friday, Saturday and Sunday.
        $grouped = [];
        foreach ($danceShows as $show) {
            $day = date('l', strtotime($show['start_date']));
            if (in_array($day, ['Friday', 'Saturday', 'Sunday'])) {
                $grouped[$day][] = $show;
            }
        }
        
        // Order groups in the fixed order: Friday, Saturday, Sunday.
        $ordered = [];
        foreach (['Friday', 'Saturday', 'Sunday'] as $day) {
            if (isset($grouped[$day])) {
                $ordered[$day] = $grouped[$day];
            }
        }
        return $ordered;
    }
}
