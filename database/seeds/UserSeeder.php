<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Randy Steven',
            'email' => 'randysteven12@gmail.com',
            'password' => bcrypt('ganteng2001')
        ]);
    }
}
