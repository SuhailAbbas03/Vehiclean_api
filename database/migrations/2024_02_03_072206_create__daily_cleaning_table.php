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
        Schema::create('_daily_cleaning', function (Blueprint $table) {
            $table->bigIncrements('Id')->unique();
            $table->string('Title');
            $table->text('Description')->nullable();
            $table->decimal('Price');
            $table->boolean('Status')->default(1);
            $table->string('Vehicle_type');
            $table->integer('Validity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_daily_cleaning');
    }
};
