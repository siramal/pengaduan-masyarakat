<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    public function run()
    {
        // DB::table('reports')->insert([
        //     [
        //         'created_at' => now(),
        //         'image_path' => 'https://via.placeholder.com/300x150',
        //         'likes' => 1,
        //         'report_detail' => 'Immy Menuturkan Ruas Jalan Sedayu Tergolong K...',
        //         'user_id' => 1,
        //         'views' => 38,
        //         'kabupaten_id' => 1, // Provide a valid kabupaten_id here
        //         'kecamatan_id' => 1, // Provide a valid kecamatan_id here
        //         'desa_id' => 1, // Provide a valid desa_id here
        //         'report_type' => 'Banjir',
        //     ],
        //     [
        //         'created_at' => now(),
        //         'image_path' => 'https://via.placeholder.com/300x150',
        //         'likes' => 0,
        //         'report_detail' => 'Kesenjangan Sosial Adalah Masalah Sosial Yang...',
        //         'user_id' => 1,
        //         'views' => 0,
        //         'kabupaten_id' => 1, // Provide a valid kabupaten_id here
        //         'kecamatan_id' => 1, // Provide a valid kecamatan_id here
        //         'desa_id' => 1, // Provide a valid desa_id here
        //         'report_type' => 'Kerusakan Jalan',
        //     ],
        // ]);
            }
}
