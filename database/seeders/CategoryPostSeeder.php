<?php

namespace Database\Seeders;

use App\Models\CategoryPosts;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryPosts::insert([
            [
                'name' => 'Категория 1',
                'url' => 'cat1',
                'parent_id' => NULL,
                'is_visible' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'name' => 'Категория 2',
                'url' => 'cat2',
                'parent_id' => NULL,
                'is_visible' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'name' => 'Подкатегория 1.2',
                'url' => 'subcat1',
                'parent_id' => 1,
                'is_visible' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
        ]);
    }
}
