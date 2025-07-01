<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('att_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('USERID');
            $table->dateTime('checklog_time');
            $table->dateTime('shift_in');
            $table->dateTime('shift_out');
            $table->dateTime('checkin_time1');
            $table->dateTime('checkin_time2');
            $table->dateTime('checkout_time1');
            $table->dateTime('checkout_time2');
            $table->integer('check_type');
            $table->integer('late_tolerance');
            $table->integer('early_tolerance');
            $table->integer('sdays');
            $table->integer('late');
            $table->integer('early_checkin');
            $table->integer('overtime');
            $table->integer('early_checkout');
            $table->integer('check_log_status');
            $table->string('departement_name', 255);
            $table->foreign('USERID')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('att_logs');
    }
};
