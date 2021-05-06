<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'foto' => '',
            'name' => 'admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt(12345678),
            'jk' => 'L/P',
            'alamat' => 'Surabaya',
            'ktp' => ''
        ]);

        $user->assignRole('admin');
    }
}
