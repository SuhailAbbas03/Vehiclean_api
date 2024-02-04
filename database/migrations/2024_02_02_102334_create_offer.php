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
        Schema::create('Offer', function (Blueprint $table) {
            $table->bigIncrements('Id')->unique();
            $table->string('Title');
            $table->text('Description')->nullable();
            $table->string('Image')->nullable();
            $table->boolean('Status')->default(1);
            $table->date('Start_Date')->nullable();
            $table->date('End_Date')->nullable();
            $table->unsignedDecimal('Discount_Percentage' )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('Offer');
    }
};
