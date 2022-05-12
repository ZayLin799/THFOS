<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('batch_infos');
        Schema::create('batch_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('avaliable_student');
            $table->date('start');
            $table->boolean('status')->default(0);
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('batch_id')->constrained('batches');
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
        Schema::dropIfExists('batch_infos');
    }
}
