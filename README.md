# 環境構築

## 前提
- Dockerがインストールされていること

## git clone
以下を実行

`$ git clone https://github.com/fukushimasurao/challenges-for-tryhatch.git`

以下プロジェクトディレクトリに`cd`して対応する。

## ライブラリインストール
git cloneだけだとsailコマンドも使えない状態なので、docker経由でcomposer installする cd {project-name}してから以下を実行

```
$ cd challenges-for-tryhatch 

$ docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

## 環境変数を設定する
- 以下を実行

`cp .env.example .env`

- コピーした`.env`に以下追記

```
API_KEY=
SEARCH_ENGINE_ID=
```

それぞれの値は別途お伝えします。

## Docker起動
以下を実行でDocker起動

`$ ./vendor/bin/sail up -d`

別のプロセスで利用しているとエラーになるので、事前に別プロセスを終了するかポートを変える

*※都度./vendor/bin/sailを打たずにsailとするにはalias登録しておくと便利*

```bash
vi ~/.bash_profile
alias sail="./vendor/bin/sail"
source ~/.bash_profile
```


## app key 作成

`sail artisan key:generate`

## ライブラリインストール

`$ sail composer install`

## フロントインストール＆ビルド
`$ sail npm install`でフロントライブラリをインストール
`$ sail npm run dev`でフロントコードをビルド

# 接続確認

## Web

http://localhost/

## 開発環境の終了

`$ sail down`
