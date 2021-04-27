<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class JurnalisSeeder extends Seeder
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
            'name' => 'jurnalis',
            'email' => 'jurnalis@localhost.com',
            'password' => bcrypt(12345678)
        ]);

        $user->assignRole('jurnalis');
    }
}
