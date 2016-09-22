<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDichvusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dichvus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madichvu',10);
            $table->string('tendichvu');
            $table->string('dvt',20)->nullable();
            $table->integer('tileDTTL')->nullable();
            $table->integer('dongia')->nullable();
            $table->string('masanluongtienthu',20)->nullable();//ma CFM
            $table->string('masanluongtienchi',20)->nullable();//ma CFM
            $table->string('madoanhthu',20)->nullable();//ma CFM
            $table->string('tengiaodichtien',100)->nullable();
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
        Schema::drop('dichvus');
    }
}
