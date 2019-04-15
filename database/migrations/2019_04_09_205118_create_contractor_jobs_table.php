<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_category');
            $table->string('category_name');
            $table->string('sub_category');
            $table->string('sub_sub_category');
            $table->string('job_title');
            $table->string('job_description');
            $table->string('nationality');
            $table->string('contact_phone');
            $table->string('award_date');
            $table->string('amount');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('contractor_jobs');
    }
}
