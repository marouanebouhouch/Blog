<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        $users = array(["Marouane Bouhouch","bouhouch.marouane@gmail.com",bcrypt('123456')],
                        ["Said aziz","said.aziz@gmail.com",bcrypt('123456')]);
        for ($i = 0 ; $i<=1;$i++){
            DB::table('users')->insert([
                'name' => $users[$i][0],
                'email' => $users[$i][1],
                'password' => $users[$i][2]
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
