<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drones', function (Blueprint $table) {
                     $table->increments('id')->unique();
                     $table->string('image',60);					 
					 $table->string('name',60);
                     $table->string('address',30);
                     $table->integer('battery');
                     $table->float('max_speed');
					 $table->float('average_speed');
					 $table->string('status',8);
					 $table->timestamps('updated_at');
					 $table->timestamps('created_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drone');
    }
}
