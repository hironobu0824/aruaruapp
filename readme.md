
 ## DEMO
 <img src="https://github.com/{your_name}/laravel_caliculam/blob/master/sample_gif.gif" width="700">
 
 ## 動作確認環境
 - Amazon Linux 
 - PHP 7.3
 - Laravel 5.7.*
 - MySQL 5.7.*
 - Apache 2.4.33
 
 ## 初期設定
 ```
 $ git clone https://github.com/{your_name}/laravel_caliculam
 $ cp .env.example .env
 $ vi .env // DB + Mailのデータを書き換える
 $ php artisan key:generate
 $ composer install
 $ npm install
 $ npm run dev
 ```
 
 ## DB設定
 ```
 $ php artisan migrate
 $ php artisan db:seed --class=PostsTableSeeder
 $ php artisan db:seed --class=CategoyTableSeeder
 $ php artisan serve
 ```