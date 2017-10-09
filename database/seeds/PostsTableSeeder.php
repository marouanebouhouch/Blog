<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('posts')->truncate();
        for ($i = 0 ; $i<100;$i++){
            DB::table('posts')->insert([
                'title' => $faker->words($nb = 2, $asText = true),
                'body' => $faker->text(),
                'user_id' => rand(1,2),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ]);

        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
