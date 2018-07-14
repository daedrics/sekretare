<?php

use Illuminate\Database\Seeder;
use App\Models\Universitet;

class UniversitetSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Universitet::truncate();

        Universitet::create([
            'emer_UNI' => 'Universiteti Politeknik i Tiranes'
        ]);
    }
}
