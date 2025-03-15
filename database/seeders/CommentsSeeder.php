<?php

namespace Database\Seeders;

use App\Models\Comments;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comments::insert([
            [
                'content' => 'Comment 1',
                'parent_id' => NULL,
                'users_id' => '1',
                'posts_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'content' => 'Comment 2 child Comment 1',
                'parent_id' => '1',
                'users_id' => '2',
                'posts_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'content' => 'Comment 3 child Comment 1',
                'parent_id' => '2',
                'users_id' => '1',
                'posts_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'content' => 'Comment 2 Parent',
                'parent_id' => NULL,
                'users_id' => '2',
                'posts_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
            [
                'content' => 'Comment 4 child Comment 2',
                'parent_id' => '4',
                'users_id' => '1',
                'posts_id' => '1',
                'created_at' => Carbon::now()->setTimezone('Europe/Moscow'),
                'updated_at' => Carbon::now()->setTimezone('Europe/Moscow'),
            ],
        ]);
    }
}
