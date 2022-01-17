<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->morphs('informable');
            $table->string('pob')->nullable();
            $table->date('dob')->nullable();
            $table->char('gender')->nullable();
            $table->string('h_street')->nullable();
            $table->string('h_city')->nullable();
            $table->string('h_state')->nullable();
            $table->string('h_zip')->nullable();
            $table->string('p_street')->nullable();
            $table->string('p_city')->nullable();
            $table->string('p_state')->nullable();
            $table->string('p_zip')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('g_contact')->nullable();
            $table->string('g_relationship')->nullable();
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
        Schema::dropIfExists('information');
    }
}
