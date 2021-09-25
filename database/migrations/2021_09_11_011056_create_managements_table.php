<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direction_id');
            $table->string('name_management');
            $table->string('url_management');
            $table->bigInteger('cost_center')->unique();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('direction_id')
                    ->references('id')
                    ->on('directions')
                    ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managements');
    }
}
