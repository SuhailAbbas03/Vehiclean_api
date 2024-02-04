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
        Schema::create('_daily__cleaning__charts', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('Customer_Id');
            $table->string('Customer_Name');
            $table->string('Vehicle_Id');
            $table->string('Vehicle_Reg_No');
            $table->string('Partners_Id');
            $table->string('Cleaning_Pic');
            $table->string('Cleaning_Video');
            
            $table->boolean('Status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_daily__cleaning__charts');
    }
};
