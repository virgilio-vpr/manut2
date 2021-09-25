<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('management_id');
            $table->string('name_department');
            $table->string('url_department');
            $table->bigInteger('cost_center')->unique();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('management_id')
                    ->references('id')
                    ->on('managements')
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
        Schema::dropIfExists('departments');
    }
}
