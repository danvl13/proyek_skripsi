<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DivisiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisis')->insert([
            [
                'nama' => 'Acara',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Perlengkapan',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Keamanan',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Transportasi',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Sekretaris',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Kesehatan',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Konsumsi',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Sponsor',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Pubdekdok',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'IT',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Peran',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Basket',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Futsal',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Voli',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Badminton',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Tenis Meja',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Catur',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
