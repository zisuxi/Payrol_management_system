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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name');
            $table->string('emp_no');
            $table->string('emp_email');
            $table->string('emp_address');
            $table->string('emp_city');
            $table->string('emp_state');
            $table->string('emp_country');
            $table->string('emp_department');
            $table->string('emp_join_date');
            $table->string('emp_contract_period');
            $table->string('emp_sallery');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
