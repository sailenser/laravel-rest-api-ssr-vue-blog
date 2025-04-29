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
                'title' => 'Первый пост',
                'description' => 'Описание первого поста',
                'data' => '28 апреля 2025 г.',
                'contents' => 'Содержимое первого поста',
                'user_id' => '1',
                'category_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'url' => 'second',
                'title' => 'Второй пост',
                'description' => 'Описание второго поста',
                'data' => '28 апреля 2025 г.',
                'contents' => 'Содержимое второго поста',
                'user_id' => '1',
                'category_id' => '2',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'url' => 'third post',
                'title' => 'Третий пост',
                'description' => 'Описание третьего поста',
                'data' => '28 апреля 2025 г.',
                'contents' => 'Содержимое третьего поста',
                'user_id' => '1',
                'category_id' => '3',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'url' => 'fourth post',
                'title' => 'Четвертый пост',
                'description' => 'Описание четвертого поста',
                'data' => '28 апреля 2025 г.',
                'contents' => 'Содержимое четвертого поста',
                'user_id' => '1',
                'category_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'url' => 'fourth post',
                'title' => 'Пятый пост',
                'description' => 'Описание пятого поста',
                'data' => '28 апреля 2025 г.',
                'contents' => 'Содержимое пятого поста',
                'user_id' => '1',
                'category_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
        ]);
    }
}
