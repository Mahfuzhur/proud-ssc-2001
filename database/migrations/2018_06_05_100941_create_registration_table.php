<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('school_name');
            $table->string('college_name');
            $table->string('gpa_5_holder');
            $table->string('present_address');
            $table->string('present_police_station');
            $table->string('present_district');
            $table->string('parmanent_address');
            $table->string('parmanent_police_station');
            $table->string('parmanent_district');
            $table->string('mobile');
            $table->string('blood_group');
            $table->string('occupation');
            $table->string('expertise');
            $table->string('working_organisation');
            $table->string('social_activities');
            $table->string('designation');
            $table->string('board');
            $table->string('fb_id');
            $table->string('email');
            $table->string('password');
            $table->text('user_image');
            $table->text('reg_card_image');
            $table->tinyInteger('request_status');
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
        Schema::dropIfExists('registration');
    }
}
