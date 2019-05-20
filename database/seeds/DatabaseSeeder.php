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
        // $path='users.sql';
        // DB::unprepared(File_get_contents($path));
        // $this->command->info('User table seeded');
    }
}
