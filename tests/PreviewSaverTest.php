<?php

declare(strict_types=1);

namespace BOA\Previews\Tests;

use BOA\Previews\PreviewSaver;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PreviewSaverTest extends TestCase
{
    /**
     * @psalm-var non-empty-string
     *
     * @var string
     */
    private string $tempDir;

    /**
     * @psalm-return void
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->tempDir = sys_get_temp_dir() . '/preview_saver_test_' . bin2hex(random_bytes(8));
        if (!mkdir($this->tempDir, 0755, true) && !is_dir($this->tempDir)) {
            $this->fail('Failed to create temp dir: ' . $this->tempDir);
        }
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    protected function tearDown(): void
    {
        if (is_dir($this->tempDir)) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($this->tempDir, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::CHILD_FIRST
            );

            foreach ($files as $file) {
                $file->isDir() ? rmdir($file->getRealPath()) : unlink($file->getRealPath());
            }

            rmdir($this->tempDir);
        }
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testSave(): void
    {
        $saver = new PreviewSaver();
        $path = $this->tempDir . '/previews.json';

        $previews = [
            [
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
                    [
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

        $saver->save($previews, $path);

        $this->assertFileExists($path);

        $content = json_decode(file_get_contents($path), true);
        $this->assertArrayHasKey('previews', $content);
        $this->assertSame($previews, $content['previews']);
    }
}
