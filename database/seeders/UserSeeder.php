<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@superadmin.com',
            'kode_pegawai' => '-',
            'password' => 'password.',
            'status' => '1'
        ]);
    }
}
