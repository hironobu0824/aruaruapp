## DEMO
<img src="https://raw.githubusercontent.com/wiki/hironobu0824/aruaruapp/gif/aruaru.gif" width="700">

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
