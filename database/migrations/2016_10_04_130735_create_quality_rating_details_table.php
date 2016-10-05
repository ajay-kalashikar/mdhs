<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualityRatingDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quality_rating_details', function (Blueprint $table) {
            // Columnd definitions
            $table->integer('rating');
            $table->string('description');
            $table->primary('rating', 'pk_ratings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quality_rating_details');
    }
}
