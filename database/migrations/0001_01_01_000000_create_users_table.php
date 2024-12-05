<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();  
                $table->string('UserName');
                $table->string('NamaLengkap');
                $table->string('Email')->unique();
                $table->date('DOB')->nullable();
                $table->string('PhoneNumber', 20)->nullable();
                $table->string('Country')->nullable();
                $table->string('Province')->nullable();
                $table->string('City')->nullable();
                $table->string('Address')->nullable();
                $table->string('Gender', 6)->nullable();
                $table->text('Description')->nullable();
                $table->string('SkillName')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password'); 
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('users');  
    }
};
