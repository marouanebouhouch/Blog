<?php

use Illuminate\Database\Seeder;
use App\Post;

class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('category_post')->truncate();
        foreach (Post::all() as $p)
            $p->categories()->attach(array(rand(1,2),rand(3,4)));
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
