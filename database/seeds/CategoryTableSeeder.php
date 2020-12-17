<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'name' => 'イベント、季節',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => 'スポーツ、アウトドア',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => 'SNS、アプリ、テレビ',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '健康、美容、ファッション',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '恋愛',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '学校、教育、学問',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '音楽、ゲーム',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => 'マンガ、映画、本',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '食事、料理',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '暮らし、住まい、家事',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '趣味全般',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => 'ショッピング、お金',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '旅行、地域、交通',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => 'その他',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
        ]);
    }
}
