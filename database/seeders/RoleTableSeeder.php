<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //app()['chache']->forget('spatie.permission.chache');

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'redaktur']);
        Role::create(['name' => 'jurnalis']);
    }
}
