<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create(['name' => 'member','email' => 'member@gmail.com','password' => bcrypt('rahasia')]);

        User::create(['name' => 'member1','email' => 'member1@gmail.com','password' => bcrypt('rahasia')]);
    }
}
