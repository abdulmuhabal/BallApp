<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->longtext('about_the_academy_en')->nullable();
            $table->longtext('services_en')->nullable();
            $table->longtext('terms_en')->nullable();
            $table->longtext('about_the_academy_ar')->nullable();
            $table->longtext('services_ar')->nullable();
            $table->longtext('terms_ar')->nullable();
            $table->double('price',7,2)->nullable();
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
        Schema::dropIfExists('academies');
    }
}
