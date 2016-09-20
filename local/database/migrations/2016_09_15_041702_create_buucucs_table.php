<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuucucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buucucs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donvi_id');
            $table->string('mabuucuc',6);
            $table->string('tenbuucuc');
            $table->softDeletes();
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
        Schema::drop('buucucs');
    }
}
