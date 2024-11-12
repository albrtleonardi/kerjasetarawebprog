<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  
            $table->date('DOB')->nullable();
            $table->string('PhoneNumber', 20)->nullable();
            $table->string('Country')->nullable();
            $table->string('Province')->nullable();
            $table->string('City')->nullable();
            $table->string('Address')->nullable();
            $table->string('Gender', 6)->nullable();
            $table->text('Description')->nullable();
            $table->string('SkillName')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
