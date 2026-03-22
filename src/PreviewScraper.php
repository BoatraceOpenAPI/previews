<?php

declare(strict_types=1);

namespace BOA\Previews;

use Carbon\CarbonImmutable as Carbon;
use Carbon\CarbonInterface;

/**
 * @psalm-import-type ScrapedRaces from ScraperInterface
 * @psalm-import-type ScrapedStadiumRaces from ScraperInterface
 *
 * @author shimomo
 */
final class PreviewScraper
{
    /**
     * @psalm-param \BOA\Previews\ScraperInterface $scraper
     *
     * @param \BOA\Results\ScraperInterface $scraper
     */
    public function __construct(private readonly ScraperInterface $scraper)
    {
        //
    }

    /**
     * @psalm-param \Carbon\CarbonInterface|string $date
     * @psalm-return ScrapedRaces
     *
     * @param \Carbon\CarbonInterface|string $date
     * @return array<int, NormalizedRaces>
     */
    public function scrape(CarbonInterface|string $date = 'today'): array
    {
        $date = Carbon::parse($date, 'Asia/Tokyo');
        /** @psalm-var ScrapedStadiumRaces $previews */
        $previews = $this->scraper->scrapePreviews($date);
        return $this->normalize($previews);
    }

    /**
     * @psalm-param ScrapedStadiumRaces $previews
     * @psalm-return ScrapedRaces
     *
     * @param array $results
     * @return array
     */
    private function normalize(array $previews): array
    {
        $newPreviews = [];

        foreach (array_values($previews) as $data) {
            foreach (array_values($data) as $preview) {
                $previews['boats'] = isset($preview['boats'])
                    ? array_values($preview['boats'])
                    : [];

                $newPreviews[] = $preview;
            }
        }

        /** @psalm-var ScrapedRaces */
        return $newPreviews;
    }
}
