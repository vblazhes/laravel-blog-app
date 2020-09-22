<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        $comments = array(
            ['id' => 1, 'post_id' => 1, 'slug' => 'comment-1', 'comment' => 'Comment 1', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => 2, 'post_id' => 1, 'slug' => 'comment-2', 'comment' => 'Comment 2', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => 3, 'post_id' => 1, 'slug' => 'comment-3', 'comment' => 'Comment 3', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => 4, 'post_id' => 2, 'slug' => 'comment-4', 'comment' => 'Comment 4', 'created_at' => new DateTime(), 'updated_at' => new DateTime()]
        );

        DB::table('comments')->insert($comments);
    }
}
