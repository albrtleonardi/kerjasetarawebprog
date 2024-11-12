<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('job', function (Blueprint $table) {
            $table->id('JobID'); 
            $table->foreignId('CompanyID')  
                  ->constrained('companies')
                  ->cascadeOnDelete();
            $table->string('Role');
            $table->string('JobType'); 
            $table->string('RemoteOrOnsite'); 
            $table->string('CareerLevel'); 
            $table->text('JobDescription'); 
            $table->string('SuitableFor'); 
            $table->text('Requirements'); 
            $table->text('RequiredSkills'); 
            $table->integer('SalaryMin'); 
            $table->integer('SalaryMax'); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
