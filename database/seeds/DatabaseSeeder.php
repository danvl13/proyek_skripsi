<?php

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
        $this->call(DivisiTableSeeder::class);
        $this->call(AcaraTableSeeder::class);
        $this->call(DivisiperacaraTableSeeder::class);
        $this->call(JadwalTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
    }
}
