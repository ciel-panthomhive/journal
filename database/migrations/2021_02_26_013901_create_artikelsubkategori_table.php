<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelsubkategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikelsubkategori', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_artikel');
            $table->unsignedBigInteger('id_subkategori');

            $table->foreign('id_artikel')->references('id')->on('artikel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_subkategori')->references('id')->on('subkategori')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikelsubkategori');
    }
}
