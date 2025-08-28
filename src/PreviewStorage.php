<?php

declare(strict_types=1);

namespace BOA\Previews;

/**
 * @author shimomo
 */
final class PreviewStorage
{
    /**
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
     * @param  array<int, NormalizedRaces>  $previews
     * @param  non-empty-string             $path
     * @return void
     * @throws \RuntimeException
     */
    public function save(array $previews, string $path): void
    {
        $contents = json_encode(['previews' => $previews]);
        if ($contents === false) {
            throw new \RuntimeException("Failed to encode previews to JSON");
        }

        $dir = dirname($path);
        if (!is_dir($dir) && !mkdir($dir, 0777, true) && !is_dir($dir)) {
            throw new \RuntimeException("Failed to create directory: {$dir}");
        }

        if (file_put_contents($path, $contents) === false) {
            throw new \RuntimeException("Failed to save previews to {$path}");
        }
    }
}
