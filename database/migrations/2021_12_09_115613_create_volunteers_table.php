<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('volunteername');
            $table->string('viberph');
            $table->string('skill');
            $table->string('email');
            $table->integer('age');
            $table->string('gender');
            $table->string('education');
            $table->string('experience');
            $table->string('tele_name');
            $table->boolean('status')->default(0);
            $table->string('reason')->nullable();
            $table->string('subject')->nullable();
            $table->string('teaching_time')->nullable();
            $table->integer('position_id')->nullable();
            $table->integer('v_course_id')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
}
