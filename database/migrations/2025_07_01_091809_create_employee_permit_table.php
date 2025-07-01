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
        Schema::create('employee_permit', function (Blueprint $table) {
            $table->id();
            $table->date('date_permit')->nullable();
            $table->unsignedBigInteger('USERID');
            $table->integer('permit_status')->nullable();
            $table->foreign('USERID')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_permit');
    }
};
