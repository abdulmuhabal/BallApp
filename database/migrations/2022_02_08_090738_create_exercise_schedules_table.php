<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('exercise_id')->unsigned()->nullable();
            $table->foreign('exercise_id')->references('id')->on('exercises')->onCascade('delete');
            $table->bigInteger('weekday_id')->unsigned()->nullable();
            $table->foreign('weekday_id')->references('id')->on('weekdays')->onCascade('delete');
            $table->bigInteger('time_id')->unsigned()->nullable();
            $table->foreign('time_id')->references('id')->on('times')->onCascade('delete');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('exercise_schedules');
    }
}
