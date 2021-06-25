<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beleges', function (Blueprint $table) {
            $table->id();
            $table->string('Kundennummer');
            $table->integer('Belegnummer');
            $table->integer('Belegjahr');
            $table->dateTime('Dateidatum');
            $table->longText('Volltext')->nullable();
            $table->string('Binaerdaten')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beleges');
    }
}
