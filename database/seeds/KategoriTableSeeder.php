<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            [
                'nama' => 'Lain-lain',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
