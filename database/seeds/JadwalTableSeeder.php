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
                'status' => 0,
                'tgl_wawan_terbesar' => 0,
                'user_id' => 2,
                'divisi_id1' => 1,
                'divisi_id2' => 3,
                'divisi_diterima'=> null,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2019-01-05',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Anto',
                'status' => 0,
                'tgl_wawan_terbesar' => 0,
                'user_id' => 3,
                'divisi_id1' => 2,
                'divisi_id2' => 1,
                'divisi_diterima'=> null,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2019-01-06',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Budi',
                'status' => 0,
                'tgl_wawan_terbesar' => 0,
                'user_id' => 4,
                'divisi_id1' => 2,
                'divisi_id2' => 3,
                'divisi_diterima'=> null,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2019-01-07',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Rommy',
                'status' => 0,
                'tgl_wawan_terbesar' => 0,
                'user_id' => 5,
                'divisi_id1' => 2,
                'divisi_id2' => 4,
                'divisi_diterima'=> null,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2019-01-08',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Tanti',
                'status' => 0,
                'tgl_wawan_terbesar' => 1,
                'user_id' => 6,
                'divisi_id1' => 4,
                'divisi_id2' => 5,
                'divisi_diterima'=> null,
                'acara_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2017-12-08',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Tati',
                'status' => 1,
                'tgl_wawan_terbesar' => 0,
                'user_id' => 2,
                'divisi_id1' => 12,
                'divisi_id2' => 13,
                'divisi_diterima'=> 12,
                'acara_id' => 4,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'tgl_wawan' => '2017-12-09',
                'jam_wawan' => '10:00:00',
                'tmpt_wawan' => 'Selasar B',
                'pewawancara' => 'Garett',
                'status' => 1,
                'tgl_wawan_terbesar' => 1,
                'user_id' => 3,
                'divisi_id1' => 13,
                'divisi_id2' => 12,
                'divisi_diterima'=> 13,
                'acara_id' => 4,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
