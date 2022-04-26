<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCDRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_d_r_s', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("datetime")->nullable();
            $table->string("clid")->nullable();
            $table->string("src")->nullable();
            $table->string("dst")->nullable();
            $table->string( "dcontext")->nullable();
            $table->string("srctrunk")->nullable();
            $table->string("dstrunk")->nullable();
            $table->string("lastapp")->nullable();
            $table->string("lastdata")->nullable();
            $table->string("duration")->nullable();
            $table->string("billable")->nullable();
            $table->string( "disposition")->nullable();
            $table->string("amaflags")->nullable();
            $table->string("calltype")->nullable();
            $table->string("accountcode")->nullable();
            $table->string("uniqueid")->nullable();
            $table->string("recordfile")->nullable();
            $table->string("recordpath")->nullable();
            $table->string("monitorfile")->nullable();
            $table->string("monitorpath")->nullable();
            $table->string( "dstmonitorfile")->nullable();
            $table->string("dstmonitorpath")->nullable();
            $table->string("extfield1")->nullable();
            $table->string("extfield2")->nullable();
            $table->string("extfield3")->nullable();
            $table->string("extfield4")->nullable();
            $table->string( "extfield5")->nullable();
            $table->string( "payaccount")->nullable();
            $table->string("usercost")->nullable();
            $table->string("didnumber")->nullable();
            $table->string( "transbilling")->nullable();
            $table->string("payexten")->nullable();
            $table->string("srcchanurl")->nullable();
            $table->string("dstchanurl")->nullable();
            $table->string( "companycontact")->nullable();
            $table->string("personalcontact")->nullable();
            $table->string("contactnumber")->nullable();
            $table->string("personalcontacttf")->nullable();
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
        Schema::dropIfExists('c_d_r_s');
    }
}
