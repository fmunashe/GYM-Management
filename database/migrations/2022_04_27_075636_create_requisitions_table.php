<?php

use App\Enums\SubscriptionStatus;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('club_id');
            $table->string('request_date')->default(Carbon::now());
            $table->string('decision_date')->nullable();
            $table->enum('status',[SubscriptionStatus::PENDING,SubscriptionStatus::APPROVED,SubscriptionStatus::REJECTED])->default(SubscriptionStatus::PENDING);
            $table->unsignedBigInteger('approver_id')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('requisitions');
    }
}
