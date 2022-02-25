<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \App\Models\User::factory(1)->create();
        \App\Models\BarangInv::factory(10)->create();
        // \App\Models\Paket::factory(500)->create();
    }
}
