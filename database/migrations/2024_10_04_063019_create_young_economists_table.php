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
        Schema::create('young_economists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->date('date');
            $table->longText('list_person_local');
            $table->longText('list_person_no_local');
            $table->unsignedBigInteger('quarters_id');  // Foreign key to `quarters` table
            $table->foreign('quarters_id')->references('id')->on('quarters')->onDelete('cascade');  // Set foreign key with cascade
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('young_economists');
    }
};
