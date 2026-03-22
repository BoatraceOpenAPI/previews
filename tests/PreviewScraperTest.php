<?php

declare(strict_types=1);

namespace BOA\Previews\Tests;

use BOA\Previews\PreviewScraper;
use BOA\Previews\ScraperInterface;
use Carbon\CarbonImmutable as Carbon;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-import-type ScrapedStadiumRaces from ScraperInterface
 *
 * @author shimomo
 */
final class PreviewScraperTest extends TestCase
{
    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testScrape(): void
    {
        $mockScraper = $this->createMock(ScraperInterface::class);
        $mockScraper->method('scrapePreviews')
            ->with(Carbon::create(2025, 7, 15))
            ->willReturn([
                $this->testScrapeData(0),
            ]);
        $scraper = new PreviewScraper($mockScraper);
        $previews = $scraper->scrape(Carbon::create(2025, 7, 15));
        $this->assertSame($this->testScrapeData(0), $previews);
    }

    /**
     * @psalm-param int $keyIndex
     * @psalm-return ScrapedStadiumRaces
     *
     * @param int $keyIndex
     * @return array
     */
    private function testScrapeData(int $keyIndex): array
    {
        return [
            $keyIndex => [
                'date' => '2025-07-15',
                'stadium_number' => 1,
                'number' => 1,
                'wind_speed' => 4,
                'wind_direction_number' => 10,
                'wave_height' => 3,
                'weather_number' => 2,
                'air_temperature' => 26,
                'water_temperature' => 27,
                'boats' => [
                    $keyIndex => [
                        'racer_boat_number' => 1,
                        'racer_course_number' => 1,
                        'racer_start_timing' => 0.09,
                        'racer_weight' => 52.3,
                        'racer_weight_adjustment' => 0,
                        'racer_exhibition_time' => 6.87,
                        'racer_tilt_adjustment' => 0,
                    ],
                ],
            ],
        ];
    }
}
