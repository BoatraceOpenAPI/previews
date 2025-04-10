<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use BVP\BoatraceScraper\Scraper;
use Carbon\CarbonImmutable as Carbon;

$date = Carbon::today('Asia/Tokyo');
$previews = Scraper::scrapePreviews($date);

$newPreviews = [];
foreach (array_values($previews) as $data) {
    foreach (array_values($data) as $preview) {
        $preview['boats'] = array_values($preview['boats']);
        $preview['courses'] = array_values($preview['courses']);
        $newPreviews[] = $preview;
    }
}

if (empty($newPreviews)) {
    exit;
}

$name = 'docs/v1/' . $date->format('Ymd') . '.json';
file_put_contents($name, json_encode(['previews' => $newPreviews]));
