<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
  
        Schema::create('adverts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('budget_year');
            $table->string('advert_type');
            $table->string('advert_mode');
            $table->string('introduction');
            $table->string('advert_publish_date');
            $table->string('bid_opening_date');
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
        Schema::dropIfExists('adverts');
    }
}
