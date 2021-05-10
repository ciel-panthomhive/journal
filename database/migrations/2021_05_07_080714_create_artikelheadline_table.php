<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelheadlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikelheadline', function (Blueprint $table) {
            $table->unsignedBigInteger('id_artikel');
            $table->unsignedBigInteger('id_headline');

            $table->foreign('id_artikel')->references('id')->on('artikel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_headline')->references('id')->on('headline')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikelheadline');
    }
}
