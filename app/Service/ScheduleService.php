<?php

namespace App\Service;

class ScheduleService
{
    private ShowService $showService;

    public function __construct(ShowService $showService)
    {
        $this->showService = $showService;
    }

    /**
     * Geeft alle shows met genre 'dance', gegroepeerd op vrijdag t/m zondag.
     */
    public function getDanceSchedule(): array
    {
        $allShows = $this->showService->getAllShows();

        $danceShows = array_filter($allShows, function ($show) {
            return isset($show['artist_genre']) && strtolower(trim($show['artist_genre'])) === 'dance';
        });

        return $this->groupShowsByWeekendDays($danceShows);
    }

    /**
     * Geef het schema voor één artiest terug, gegroepeerd per dag (vrij-zon).
     */
    public function getScheduleForArtist(int $artistId): array
    {
        $artistShows = $this->showService->getShowsForArtist($artistId);
        return $this->groupShowsByWeekendDays($artistShows);
    }

    /**
     * Hulpfunctie om shows te groeperen per vrijdag, zaterdag en zondag.
     */
    private function groupShowsByWeekendDays(array $shows): array
    {
        $grouped = [];

        foreach ($shows as $show) {
            $day = date('l', strtotime($show['start_date'])); //string naar timestamp
            if (in_array($day, ['Friday', 'Saturday', 'Sunday'])) {
                $grouped[$day][] = $show;
            }
        }

        // Zorg dat de volgorde altijd Friday → Saturday → Sunday is
        $ordered = [];
        foreach (['Friday', 'Saturday', 'Sunday'] as $day) {
            if (isset($grouped[$day])) {
                $ordered[$day] = $grouped[$day];
            }
        }

        return $ordered;
    }
}
