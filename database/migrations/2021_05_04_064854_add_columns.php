<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->string('kundennummer');
             $table->timestamp('last_login')->nullable();
             $table->integer('login_attempt')->nullable();
             $table->tinyInteger('login_blocked')->nullable();
             $table->tinyInteger('first_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('kundennummer');
            $table->dropColumn('last_login');
            $table->dropColumn('login_attempt');
            $table->dropColumn('login_blocked');
            $table->dropColumn('first_login');
        });
    }
}
