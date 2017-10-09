<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();
        $categories = ['Religion','Science','Informatics','Art'];
        for ($i = 0 ; $i<4;$i++){
            DB::table('categories')->insert([
                'name' => $categories[$i]
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
