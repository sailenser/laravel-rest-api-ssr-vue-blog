<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Posts::insert([
            [
                'url' => 'first',
                'title' => 'First Post',
                'contents' => 'Post 1 test, some big content placed here',
                'user_id' => '1',
                'category_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'url' => 'second',
                'title' => 'Second Post',
                'contents' => 'Second 2 test, some big content placed here',
                'user_id' => '1',
                'category_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'url' => 'third post',
                'title' => 'Third Post',
                'contents' => 'Third 3 test, some big content placed here',
                'user_id' => '1',
                'category_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'url' => 'fourth post',
                'title' => 'Fourth Post',
                'contents' => 'Fourth 4 test, some big content placed here',
                'user_id' => '1',
                'category_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
        ]);
    }
}
