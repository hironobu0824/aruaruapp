## NAME  
「みんなのあるある」
- あるあるを投稿する/閲覧するアプリ

## DEMO
<img src="https://raw.githubusercontent.com/wiki/hironobu0824/aruaruapp/gif/aruaru.gif" width="700">

## URL
https://aruaruapphironobu.herokuapp.com/

## 機能一覧
- ユーザー登録、ログイン機能
- あるあるテーマ投稿機能
- あるある投稿機能
- コメント機能
- いいね機能
- カテゴリ検索機能
- ユーザーランキング


## 動作確認環境
- Amazon Linux
- PHP 7.3
- Laravel 5.8.*
- MySQL 5.7.*
- Apache 2.2.34

## 初期設定
```
$ git clone https://github.com/hironobu0824/aruaruapp.git
$ cp .env.example .env
$ vi .env // DB + Mailのデータを書き換える
$ php artisan key:generate
$ composer install
```

## DB設定
```
$ php artisan migrate
$ php artisan db:seed --class=CategoyTableSeeder
$ php artisan serve
```
