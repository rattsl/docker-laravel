# docker-laravel

## 環境構築方法

1. プロジェクトのクローン

このアプリケーションの環境をdockerで構築するにあたって、まずクローンしてコンテナを立てる

```
[linux] $ git clone git@github.com:kakiutihayato/docker-laravel.git
[linux] $ cd docker-laravel
[linux] $ docker compose up -d --build
```

2. vendorディレクトリへライブラリ群をインストール

git cloneが終わった状態では app コンテナ内に /work/vendor ディレクトリが存在しないため
コンテナの中に入ってcomposer installを叩く

```
[linux] $ docker compose exec app bash
[app] $ composer install
```

3. .env作成

.envは.gitignoreでクローンから除外されているので.env.sampleからコピー

```
[app] $ cp .env.example .env
```

4. アプリケーションキー作成

.env に APP_KEY= の値がないとこのエラーが発生するのでコマンドを叩いて作成

```
[app] $ php artisan key:generate
```

5. シンボリックリンクを貼る

システムで生成したファイル等をブラウザからアクセスできるよう公開するためにシンボリックリンクを張ります。

```
[app] $ php artisan storage:link
```

6. 権限変更

フレームワーク内のファイルを書き込みする権限がないので変更します。

```
[app] $ chmod -R 777 storage bootstrap/cache
```

7. マイグレーション

最後にマイグレーションでデータベースに反映させます。

```
[app] $ php artisan migrate
```

8. コンテナの停止、終了

```
[app] $ exit
[linux] $ docker compose down
```


## 参考記事

- [【超入門】20分でLaravel開発環境を爆速構築するDockerハンズオン](https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4)
- [DockerでLaravelを入れているとPermissionDeniedエラーが出た](https://qiita.com/Usuyuki/items/b235a23d516a8d6dedc6)

## 詰まった事一覧

## 1. コンテナ内でひな形作成のコマンドを叩いた際
.env書き換えの項目で.envの値を変更しようとしたところパーミッションエラーで変更できなかった。
コンテナ内でlaravelのひな形を作るコマンドを叩いたら実行ユーザrootになっており、ubuntuは

> 　なお、Ubuntuのデフォルトではrootユーザーが無効になっており、sudoコマンドを使用するように推奨されています（詳細は後述）。

が原因？で保存ができない可能性があるので実行ユーザをrootから自分に変えるchownをたたいたら変更できるようになった。

## 2. dbサーバに入ったあと環境変数を使ったコマンドでログインできない
→　dockerfileで定義した環境変数をハードコードしたらはいれた。

