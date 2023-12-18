<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::create([
            'nama'      => 'Admin',
            'jabatan'   => 'oprator',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('admin@123'),
            'no_tlp'    => '085741492045',
            'role'      => 'admin',
        ]);

        \App\Models\User::create([
            'nama'      => 'Saut Sinurat',
            'jabatan'   => 'Kepala Badan',
            'email'     => 'sinurat@gmail.com',
            'password'  => bcrypt('admin@123'),
            'no_tlp'    => '085741492045',
            'role'      => 'super_admin',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
