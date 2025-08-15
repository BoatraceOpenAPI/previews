<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use BVP\Scraper\Scraper;
use Carbon\CarbonImmutable as Carbon;

$date = Carbon::today('Asia/Tokyo');
$previews = Scraper::scrapePreviews($date);

$newPreviews = [];
foreach (array_values($previews) as $data) {
    foreach (array_values($data) as $preview) {
        $preview['boats'] = array_values($preview['boats']);
        $newPreviews[] = $preview;
    }
}

if (empty($newPreviews)) {
    exit;
}

$name = 'docs/v2/' . $date->format('Ymd') . '.json';
file_put_contents($name, json_encode(['previews' => $newPreviews]));

$name = 'docs/v2/today.json';
file_put_contents($name, json_encode(['previews' => $newPreviews]));
