<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'nama_pengguna' => 'Admin',
            'password' => bcrypt('admin123'),
            'id_akses' => 1,
        ]);
    }
}
