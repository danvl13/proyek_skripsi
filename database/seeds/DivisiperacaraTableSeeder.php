<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DivisiperacaraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisiperacaras')->insert([
            [
                'kuota' => 5,
                'acara_id' => 1,
                'divisi_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 1,
                'divisi_id' => 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 1,
                'divisi_id' => 3,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 1,
                'divisi_id' => 4,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 1,
                'divisi_id' => 5,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 2,
                'divisi_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 2,
                'divisi_id' => 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 2,
                'divisi_id' => 3,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 2,
                'divisi_id' => 4,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 2,
                'divisi_id' => 5,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 3,
                'divisi_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 3,
                'divisi_id' => 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 3,
                'divisi_id' => 3,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 3,
                'divisi_id' => 4,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 3,
                'divisi_id' => 5,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 4,
                'divisi_id' => 12,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 4,
                'divisi_id' => 13,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 4,
                'divisi_id' => 14,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 4,
                'divisi_id' => 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 4,
                'divisi_id' => 16,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 5,
                'divisi_id' => 12,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 5,
                'divisi_id' => 13,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 5,
                'divisi_id' => 14,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 5,
                'divisi_id' => 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kuota' => 5,
                'acara_id' => 5,
                'divisi_id' => 16,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
