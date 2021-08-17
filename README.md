# docker-laravel

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

