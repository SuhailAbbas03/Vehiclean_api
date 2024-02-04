<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_no');
            $table->string('service_type');
            $table->date('date');
            $table->time('time');
            $table->string('vehicle_no');
            $table->double('location_lat');
            $table->double('location_long');
            $table->decimal('package_cost', 8, 2);
            $table->decimal('service_charge', 8, 2);
            $table->decimal('tax', 8, 2);
            $table->string('status');
            $table->string('assign_to')->nullable();
            $table->text('review')->nullable();
            $table->integer('rating')->nullable();
            $table->decimal('partner_tip', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
