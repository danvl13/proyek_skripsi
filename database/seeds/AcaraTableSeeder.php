<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AcaraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acaras')->insert([
            [
                'nama' => 'WGG',
                'tgl_mulai_acara' => '2019-04-04',
                'tgl_selesai_acara' => '2019-04-10',
                'tmpt_acara' => 'Auditorium, P, W, Q, T',
                'keterangan' => 'Acara pengenalan kampus kepada mahasiswa baru',
                'ipkmin' => 2.75,
                'status' => 1,
                'user_id' => 1,
                'kategori_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Camp Mahasiswa',
                'tgl_mulai_acara' => '2019-03-03',
                'tgl_selesai_acara' => '2019-03-05',
                'tmpt_acara' => 'Villa Trawas',
                'keterangan' => 'Acara retreat mahasiswa',
                'ipkmin' => 2.75,
                'status' => 1,
                'user_id' => 1,
                'kategori_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Dies Natalis 2018',
                'tgl_mulai_acara' => '2018-06-05',
                'tgl_selesai_acara' => '2018-06-05',
                'tmpt_acara' => 'Auditorium,',
                'keterangan' => 'Acara ulang tahun kampus',
                'ipkmin' => 2.75,
                'status' => 1,
                'user_id' => 1,
                'kategori_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Maba CUP',
                'tgl_mulai_acara' => '2018-01-04',
                'tgl_selesai_acara' => '2018-01-10',
                'tmpt_acara' => 'GOR',
                'keterangan' => 'Acara lomba-lomba olahraga di Universitas Kristen Petra khusus mahasiswa baru',
                'ipkmin' => 2.75,
                'status' => 1,
                'user_id' => 1,
                'kategori_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'BOM',
                'tgl_mulai_acara' => '2019-02-04',
                'tgl_selesai_acara' => '2019-02-10',
                'tmpt_acara' => 'GOR ',
                'keterangan' => 'Acara lomba-lomba olahraga di Universitas Kristen Petra',
                'ipkmin' => 2.75,
                'status' => 1,
                'user_id' => 1,
                'kategori_id' => 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
