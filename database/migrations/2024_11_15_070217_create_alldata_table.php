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
        Schema::create('alldata', function (Blueprint $table) {
            $table->id();
            $table->string('issuer_name')->nullable(); // For the second query
            $table->integer('issuer_id')->nullable();  // Corresponding to wp.id
            $table->integer('year_number')->nullable(); // Corresponding to wp.year_num
            $table->integer('first_quarter')->default(0);
            $table->integer('second_quarter')->default(0);
            $table->integer('third_quarter')->default(0);
            $table->integer('fourth_quarter')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alldata');
    }
};
