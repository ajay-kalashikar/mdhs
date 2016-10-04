<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_details', function (Blueprint $table) {
            // Columnd definitions
            $table->increments('id');
            $table->string('name');
            $table->string('license_type');
            $table->integer('provider_type');
            $table->integer('quality_rating');
            $table->integer('provider_capacity');
            $table->string('physical_city');
            $table->string('physical_zip_code');
            $table->integer('county_id');
            $table->string('phone_no');
            $table->timestamps();
            //Contraints
            $table->foreign('provider_type')->references('type')->on('provider_types');
            $table->foreign('quality_rating')->references('rating')->on('quality_rating_details');
            $table->foreign('county_id')->references('id')->on('county_details');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('provider_details');
    }
}
