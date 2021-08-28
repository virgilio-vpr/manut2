<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name_direction');
            $table->string('url_direction');
            $table->bigInteger('cost_center')->unique();
            $table->string('logo_direction')->unique()->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
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
        Schema::dropIfExists('directions');
    }
}
