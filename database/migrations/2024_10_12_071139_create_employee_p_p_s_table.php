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
        Schema::create('employee_p_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('file_name');
            $table->string('file_path');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_p_p_s');
    }
};
