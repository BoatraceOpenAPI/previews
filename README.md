# Boatrace Open API for Previews

[![cron](https://github.com/BoatraceOpenAPI/previews/actions/workflows/cron.yml/badge.svg)](https://github.com/BoatraceOpenAPI/previews/actions/workflows/cron.yml)
[![pages-build-deployment](https://github.com/BoatraceOpenAPI/previews/actions/workflows/pages/pages-build-deployment/badge.svg)](https://github.com/BoatraceOpenAPI/previews/actions/workflows/pages/pages-build-deployment)
[![issues](https://img.shields.io/github/issues/BoatraceOpenAPI/previews.svg)](https://github.com/BoatraceOpenAPI/previews/issues)
[![pulls](https://img.shields.io/github/issues-pr/BoatraceOpenAPI/previews.svg)](https://github.com/BoatraceOpenAPI/previews/pulls)
[![license](https://img.shields.io/badge/license-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

ボートレース（競艇）の直前情報データが取得可能な Web API です。
GitHub Pages を用いて静的な JSON ファイルとして配信しています。

## エンドポイント
```
https://boatraceopenapi.github.io/previews/v2/{日付}.json
```

## サンプル
- [https://boatraceopenapi.github.io/previews/v2/20250715.json](https://boatraceopenapi.github.io/previews/v2/20250715.json)
- [https://boatraceopenapi.github.io/previews/v2/today.json](https://boatraceopenapi.github.io/previews/v2/today.json)

## 関連
| 対象 | リポジトリ | エンドポイント |
|:---|:---|:---|
| 出走表 | [Boatrace Open API for Programs](https://github.com/BoatraceOpenAPI/programs) | https://boatraceopenapi.github.io/programs/v2/{日付}.json |
| 結果 | [Boatrace Open API for Results](https://github.com/BoatraceOpenAPI/results) | https://boatraceopenapi.github.io/results/v2/{日付}.json |

## ライセンス
Boatrace Open API for Previews は [MITライセンス](LICENSE) の元で公開されています。
