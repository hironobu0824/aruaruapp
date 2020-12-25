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
                'name' => '学生向け',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '社会人向け',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => '全般',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
            [
                'name' => 'マニアック',
                'updated_at' => now(),
                'created_at' => now(),
            ],  
        ]);
    }
}
