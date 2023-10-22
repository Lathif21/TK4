<?php

namespace Database\Seeders;

use App\Models\HakAkses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HakAkses::insert([
            [
                'nama_akses' => 'Admin',
                'keterangan' => 'Admin'
            ],
        ]);
    }
}
