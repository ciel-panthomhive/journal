<?php

namespace Database\Seeders;

use App\Models\Headline;
use Illuminate\Database\Seeder;

class HeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Headline::create(['highlight' => 'Headline']);
        Headline::create(['highlight' => 'Umum']);
    }
}
