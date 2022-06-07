<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('leave_type');
            $table->string('marital');
            $table->string('school');
            $table->date('date_app');
            $table->string('designation');
            $table->string('level');
            $table->date('date_designation');
            $table->date('date_last');
            $table->date('date_due');
            $table->date('date_commence');
            $table->date('date_end');
            $table->string('details');
            $table->string('approved_by')->nullable();
            $table->string('status');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
};
