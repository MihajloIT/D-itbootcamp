<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable('false');
            $table->smallInteger('year', false, true);
            //2.nacin) $table->unsingedsmallInteger('year');
            //3.nacin) $table->smallInteger('year')->unsigned(); ista su ova 3 vezana
            $table->smallInteger('running_h', false, true)->nullable(true);
            $table->smallInteger('running_m', false, true)->nullable(true);//za film u minutima
            $table->decimal('rating',3,1)->nullable(true); // nullable(true)-> dozvoljeno je pranzo polje
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
