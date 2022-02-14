<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
            $table->string('title')->nullable();
            $table->date('starts')->nullable();
            $table->date('ends')->nullable();
            $table->integer('no_of_players')->nullable();
            $table->enum('gender', ['MALE','FEMALE'])->default('MALE');
            $table->bigInteger('age_bracket_id')->unsigned()->nullable();
            $table->foreign('age_bracket_id')->references('id')->on('age_brackets')->onCascade('delete');
            
            $table->string('referee')->nullable();
            $table->double('price',7,2)->nullable();
            $table->longtext('description')->nullable();
            $table->string('stadium_location')->nullable();
            $table->double('stadium_location_long')->nullable();
            $table->double('stadium_location_lat')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('exercises');
    }
}
