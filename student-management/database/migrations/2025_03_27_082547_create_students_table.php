<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // bang thong tin sinh vien
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('class');
            $table->string('faculty');
            $table->float('gpa');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
