<?php

declare(strict_types=1);

namespace BOA\Previews;

use Carbon\CarbonInterface;

/**
 * @psalm-type ScrapedBoat = array{
 *     racer_boat_number: int,
 *     racer_course_number: ?int,
 *     racer_start_timing: ?float,
 *     racer_weight: ?float,
 *     racer_weight_adjustment: ?float,
 *     racer_exhibition_time: ?int,
 *     racer_tilt_adjustment: ?string
 * }
 * @psalm-type ScrapedRace = array{
 *     date: string,
 *     stadium_number: int,
 *     number: int,
 *     wind_speed: ?int,
 *     wind_direction_number: ?int,
 *     wave_height: ?int,
 *     weather_number: ?int,
 *     air_temperature: ?int,
 *     water_temperature: ?int,
 *     boats: array<int, ScrapedBoat>
 * }
 * @psalm-type ScrapedRaces = array<int, ScrapedRace>
 * @psalm-type ScrapedStadiumRaces = array<int, ScrapedRaces>
 *
 * @author shimomo
 */
interface ScraperInterface
{
    /**
     * @psalm-param \Carbon\CarbonInterface $date
     * @psalm-return ScrapedStadiumRaces
     *
     * @param \Carbon\CarbonInterface $date
     * @return array
     */
    public function scrapePreviews(CarbonInterface $date): array;
}
