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
        Schema::create('partner__daily__vehicle', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            
            $table->string('customer_mobile_no');
            $table->string('customer_name');
            $table->string('society_id');
            $table->string('society_name');
            $table->string('parking_slot');
            $table->string('vehicle_no');
            $table->string('time');
            $table->string('internal_cleaning_day');
            $table->unsignedBigInteger('package_type_id'); 
            $table->string('package_name');
            $table->unsignedBigInteger('partner_id'); 
            $table->string('partner_name');
            $table->boolean('Status')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('stop_reason')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner__daily__vehicle');
    }
};
