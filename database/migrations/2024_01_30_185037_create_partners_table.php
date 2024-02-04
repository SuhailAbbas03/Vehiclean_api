<?php
    
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile_no');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('app_token')->nullable();
            $table->string('status');
            $table->text('permanent_address');
            $table->text('current_address');
            $table->string('profile_photo')->nullable();
            $table->string('fi_status');
            $table->string('kyc_status');
            $table->string('photo_aadhar_front')->nullable();
            $table->string('photo_aadhar_back')->nullable();
            $table->string('police_verification_document')->nullable();
            $table->string('current_city');
            $table->string('current_pin_code');
            $table->string('current_state');
            $table->string('permanent_city');
            $table->string('permanent_pin_code');
            $table->string('permanent_state');
            $table->string('country');
            $table->string('profile_pic')->nullable();
            $table->string('job_type');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partners');
    }
}

