<?php

declare(strict_types=1);

namespace BOA\Previews;

use BVP\Scraper\Scraper;
use Carbon\CarbonImmutable as Carbon;
use Carbon\CarbonInterface;

/**
 * @author shimomo
 */
final class PreviewScraper
{
    /**
     * @param \BVP\Scraper\Scraper  $scraper
     */
    public function __construct(private readonly Scraper $scraper)
    {
        //
    }

    /**
     * @psalm-type ScrapedRace array<non-empty-string, array<int, string|float|int|null>|string|float|int>
     * @psalm-type ScrapedRaces array<int, ScrapedRace>
     * @psalm-type NormalizedBoat array{
     *     racer_boat_number: int,
     *     racer_course_number: int|null,
     *     racer_start_timing: float|null,
     *     racer_weight: float|int,
     *     racer_weight_adjustment: float|int,
     *     racer_exhibition_time: float|int,
     *     racer_tilt_adjustment: float|int
     * }
     * @psalm-type NormalizedRace array{
     *     race_date: string,
     *     race_stadium_number: int,
     *     race_number: int,
     *     race_wind: int,
     *     race_wind_direction_number: int,
     *     race_wave: int,
     *     race_weather_number: int,
     *     race_temperature: float,
     *     race_water_temperature: float,
     *     boats: array<int, NormalizedBoat>
     * }
     * @psalm-type NormalizedRaces array<int, NormalizedRace>
     *
     * @param  \Carbon\CarbonInterface|string  $date
     * @return array<int, NormalizedRaces>
     */
    public function scrape(CarbonInterface|string $date = 'today'): array
    {
        $date = Carbon::parse($date, 'Asia/Tokyo');
        /** @var array<int, ScrapedRaces> $previews */
        $previews = $this->scraper->scrapePreviews($date);
        return $this->normalize($previews);
    }

    /**
     * @param  array<int, ScrapedRaces>  $previews
     * @return array<int, NormalizedRaces>
     */
    private function normalize(array $previews): array
    {
        $newPreviews = [];

        foreach (array_values($previews) as $data) {
            foreach (array_values($data) as $preview) {
                $previews['boats'] = isset($preview['boats'])
                    ? array_values((array) $preview['boats'])
                    : [];
                $newPreviews[] = $preview;
            }
        }

        /** @var array<int, NormalizedRaces> */
        return $newPreviews;
    }
}
