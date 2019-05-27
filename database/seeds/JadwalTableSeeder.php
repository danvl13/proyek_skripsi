<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JadwalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwals')->insert([
            [
                'tgl_wawan' => '2019-01-04',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Doni',
                'status' => 1,
                'tgl_wawan_terbesar' => 0,
                'user_id' => 2,
                'divisi_id' => 1,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2019-01-05',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Anto',
                'status' => 1,
                'tgl_wawan_terbesar' => 0,
                'user_id' => 3,
                'divisi_id' => 2,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2019-01-06',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Budi',
                'status' => 1,
                'tgl_wawan_terbesar' => 0,
                'user_id' => 4,
                'divisi_id' => 3,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2019-01-07',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Rommy',
                'status' => 1,
                'tgl_wawan_terbesar' => 0,
                'user_id' => 5,
                'divisi_id' => 4,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2019-01-08',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Tanti',
                'status' => 1,
                'tgl_wawan_terbesar' => 1,
                'user_id' => 6,
                'divisi_id' => 5,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
