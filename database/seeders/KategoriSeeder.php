<?php

namespace Database\Seeders;

use App\Models\Subkategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subkategori::create(['id_kategori' => '', 'subkategories' => 'REFRESH']);
        Subkategori::create(['id_kategori' => '2', 'subkategories' => 'LOCATION']);
        Subkategori::create(['id_kategori' => '3', 'subkategories' => 'MAKE UP']);
        Subkategori::create(['id_kategori' => '', 'subkategories' => 'ISSUE']);
        Subkategori::create(['id_kategori' => '3', 'subkategories' => 'FASHION']);
    }
}
