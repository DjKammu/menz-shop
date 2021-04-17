<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Vacancy;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();

            $table->string('department_name');
            $table->string('title')->nullable();
            $table->string('qualification')->nullable();
            $table->string('age_limit')->nullable();
            $table->date('last_date')->nullable();
            $table->string('details_link')->nullable();
            $table->string('online_link')->nullable();
            $table->tinyInteger('active')->default(Vacancy::ACTIVE);

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
        Schema::dropIfExists('vacancies');
    }
}
