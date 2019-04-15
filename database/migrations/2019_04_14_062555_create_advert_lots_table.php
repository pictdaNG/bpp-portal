<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertLotsTable extends Migration{
  
    public function up(){
        Schema::create('advert_lots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->string('project_status');
            $table->string('project_id');
            $table->foreign('project_id')->references('id')->on('adverts');
            $table->string('package_no');
            $table->string('lot_no');
            $table->string('description');
            $table->string('lot_category');
            $table->string('lot_category_name');
            $table->string('lot_amount');
            $table->string('tender_document')->nullable();
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
        Schema::dropIfExists('advert_lots');
    }
}
