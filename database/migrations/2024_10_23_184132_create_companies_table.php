<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('CompanyID'); 
            $table->string('CompanyName');
            $table->string('Address');
            $table->string('Industry');
            $table->integer('EmployeeCount');
            $table->string('WorkTime');
            $table->string('DressCode');
            $table->text('CompanyDescription');
            $table->string('CompanyLink');
            $table->string('CompanyCity');
            $table->string('CompanyImage')->nullable();
            $table->timestamps();
        });
        
        
    }


    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
