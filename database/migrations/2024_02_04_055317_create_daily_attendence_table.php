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
        Schema::create('daily_attendence', function (Blueprint $table) {
            $table->string('Partner_Id');
            $table->string('Partner_Name');
            $table->date('Attend_On_Date');
            $table->time('Attend_Signin_Time'); 
            $table->time('Attend_Signout_Time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_attendence');
    }
};
