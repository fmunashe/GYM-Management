<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tables', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('monday_routine')->nullable();
            $table->text('tuesday_routine')->nullable();
            $table->text('wednesday_routine')->nullable();
            $table->text('thursday_routine')->nullable();
            $table->text('friday_routine')->nullable();
            $table->text('saturday_routine')->nullable();
            $table->text('sunday_routine')->nullable();
            $table->unsignedBigInteger('trainer_id');
            $table->foreign('trainer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('time_tables');
    }
}
