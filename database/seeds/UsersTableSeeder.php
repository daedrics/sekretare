<?php

use App\User;
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
        User::truncate();

        User::create([
            'email' => 'sekretare@sekretare.com',
            'role' => 'sekretare',
            'password' => bcrypt('test1234')
        ]);
    }
}
