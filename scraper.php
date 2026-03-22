<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use BOA\Previews\PreviewScraper;
use BOA\Previews\PreviewStorage;
use BVP\Scraper\Scraper;
use Carbon\CarbonImmutable as Carbon;

// コマンドライン引数からバージョンを取得（デフォルトは v2）
$version = $argv[1] ?? 'v2';

// 本日の日付を東京時間で取得
$date = Carbon::today('Asia/Tokyo');

// v2 or v3 の場合のみ PreviewScraper を利用して直前情報データを取得
if ($version === 'v2' || $version === 'v3') {
    $scraper = new PreviewScraper(
        Scraper::getInstance()
    );

    // 指定日付の直前情報データをスクレイピング
    $previews = $scraper->scrape($date);
}

// 直前情報データが取得できなかった場合は処理終了
if (empty($previews ?? [])) {
    exit;
}

// 直前情報データを JSON ファイルとして保存
// 日付付きの JSON ファイルとして保存（例: docs/v2/2025/20250714.json）
// 最新データとして today.json にも保存
$storage = new PreviewStorage();
$storage->save($previews, "docs/{$version}/" . $date->format('Y') . '/' . $date->format('Ymd') . '.json');
$storage->save($previews, "docs/{$version}/today.json");
