# 🚤 Boatrace Open API for Previews

[![cron](https://github.com/BoatraceOpenAPI/previews/actions/workflows/cron.yml/badge.svg)](https://github.com/BoatraceOpenAPI/previews/actions/workflows/cron.yml)
[![pages-build-deployment](https://github.com/BoatraceOpenAPI/previews/actions/workflows/pages/pages-build-deployment/badge.svg)](https://github.com/BoatraceOpenAPI/previews/actions/workflows/pages/pages-build-deployment)
[![issues](https://img.shields.io/github/issues/BoatraceOpenAPI/previews.svg)](https://github.com/BoatraceOpenAPI/previews/issues)
[![pulls](https://img.shields.io/github/issues-pr/BoatraceOpenAPI/previews.svg)](https://github.com/BoatraceOpenAPI/previews/pulls)
[![license](https://img.shields.io/badge/license-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![v3](https://img.shields.io/badge/Boatrace_Open_API_for_Previews-v3-blue)](https://github.com/BoatraceOpenAPI/previews/tree/gh-pages/docs/v3)
[![v2](https://img.shields.io/badge/Boatrace_Open_API_for_Previews-v2-lightgrey)](https://github.com/BoatraceOpenAPI/previews/tree/gh-pages/docs/v2)

## ⚠️ 注意事項
>
> ⚡ 本 API は**非公式**であり、BOATRACE 公式サイト・団体とは一切関係ありません。<br>
> 🕒 データはリアルタイム更新ではなく、**約30分間隔で更新**されます。（ GitHub Actions のスケジュールは cron.yml を参照 ）<br>
> 🔍 データの正確性・完全性を保証するものではありません。<br>
> 🙇‍♂️ 利用は自己責任でお願いします。

## 📌 概要
この API では、ボートレース（ 競艇 ）の直前情報データを取得できます。<br>
データは GitHub Pages 上で公開されており、JSON 形式で提供されます。

## 🌐 エンドポイント

### [![v3](https://img.shields.io/badge/Boatrace_Open_API_for_Previews-v3-blue)](https://github.com/BoatraceOpenAPI/previews/tree/gh-pages/docs/v3)

```bash
https://boatraceopenapi.github.io/previews/v3/YYYY/YYYYMMDD.json
```

### [![v2](https://img.shields.io/badge/Boatrace_Open_API_for_Previews-v2-lightgrey)](https://github.com/BoatraceOpenAPI/previews/tree/gh-pages/docs/v2)

```bash
https://boatraceopenapi.github.io/previews/v2/YYYY/YYYYMMDD.json
```

📅 YYYY → 年<br>
📅 YYYYMMDD → 年月日<br>
（ 日付は日本標準時 JST〔UTC+9〕基準 ）

※ 仕様上の欠陥により v1 は破棄されました。

## 🧩 サンプル

### [![v3](https://img.shields.io/badge/Boatrace_Open_API_for_Previews-v3-blue)](https://github.com/BoatraceOpenAPI/previews/tree/gh-pages/docs/v3)

- 2026年03月22日の直前情報
  - [https://boatraceopenapi.github.io/previews/v3/2026/20260322.json](https://boatraceopenapi.github.io/previews/v3/2026/20260322.json)
- 本日の直前情報（ JST〔UTC+9〕基準 ）
  - [https://boatraceopenapi.github.io/previews/v3/today.json](https://boatraceopenapi.github.io/previews/v3/today.json)

### [![v2](https://img.shields.io/badge/Boatrace_Open_API_for_Previews-v2-lightgrey)](https://github.com/BoatraceOpenAPI/previews/tree/gh-pages/docs/v2)

- 2026年03月22日の直前情報
  - [https://boatraceopenapi.github.io/previews/v2/2026/20260322.json](https://boatraceopenapi.github.io/previews/v2/2026/20260322.json)
- 本日の直前情報（ JST〔UTC+9〕基準 ）
  - [https://boatraceopenapi.github.io/previews/v2/today.json](https://boatraceopenapi.github.io/previews/v2/today.json)

## 🔗 関連リポジトリ
| 🏷️ 対象 | 📂 リポジトリ |
|:--|:--|
| 🐆 出走表 | [Boatrace Open API for Programs](https://github.com/BoatraceOpenAPI/programs) |
| 🏆 結果 | [Boatrace Open API for Results](https://github.com/BoatraceOpenAPI/results) |

## 📄 ライセンス
Boatrace Open API for Previews は [MITライセンス](LICENSE) の元で公開されています。
