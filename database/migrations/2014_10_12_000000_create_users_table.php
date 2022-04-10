<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('club_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('user_type', ['is_admin', 'is_member', 'is_trainer'])->nullable()->default('is_member');
            $table->string('mobile')->nullable();
            $table->string('dob')->nullable();
            $table->timestamp('joining_date')->nullable()->default(now());
            $table->enum('terms_and_conditions', ['Yes', 'No'])->nullable()->default('No');
            $table->enum('subscription_status', ['active', 'in_active'])->nullable()->default('in_active');
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
