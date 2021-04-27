<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class RubikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create(['kategories' => 'REFRESH']);
        Kategori::create(['kategories' => 'TRAVELLING']);
        Kategori::create(['kategories' => 'LIFESTYLE']);
        Kategori::create(['kategories' => 'ISSUE']);
    }
}
