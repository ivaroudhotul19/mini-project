<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Mahasiswa::factory(10)->create();
        Matakuliah::factory(10)->create();
        Nilai::factory(10)->create();

        User::Create([
            'username' => 'admin',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);
    }
}
