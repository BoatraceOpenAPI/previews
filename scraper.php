<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use BOA\Previews\PreviewScraper;
use BOA\Previews\PreviewSaver;
use BOA\Previews\ScraperAdapter;
use BVP\Scraper\Scraper;
use Carbon\CarbonImmutable as Carbon;

// コマンドライン引数からバージョンを取得（デフォルトは v3）
$version = $argv[1] ?? 'v3';
$day_specified = ($argc == 3 && $argv[2] == 'True');

// 昨日の日付を東京時間で取得
$date = Carbon::yesterday('Asia/Tokyo');
if ($day_specified) {
    $date = new Carbon(file_get_contents("docs/{$version}/recorded_day.json"))->timezone('Asia/Tokyo');
    $date = $date->subDay();
    if ($date->isBefore(Carbon::parse('2020-01-01'))) {
        exit;
    }
}

// v2 or v3 の場合のみ PreviewScraper を利用して直前情報データを取得
if ($version === 'v2' || $version === 'v3') {
    $scraperInstance = Scraper::getInstance();
    $scraperAdapter = new ScraperAdapter($scraperInstance);
    $scraper = new PreviewScraper($scraperAdapter);

    // 指定日付の直前情報データをスクレイピング
    $previews = $scraper->scrape($date);
}

// 直前情報データが取得できなかった場合は処理終了
if (empty($previews ?? [])) {
    exit;
}

// 直前情報データを JSON ファイルとして保存
// 日付付きの JSON ファイルとして保存（例: docs/v3/2026/20260322.json）
// 最新データとして yesterday.json にも保存
$storage = new PreviewSaver();
$storage->save($previews, "docs/{$version}/" . $date->format('Y') . '/' . $date->format('Ymd') . '.json');
if ($day_specified) {
    file_put_contents("docs/{$version}/recorded_day.json", $date->toDateString());
} else {
    $storage->save($odds, "docs/{$version}/yesterday.json");
}
