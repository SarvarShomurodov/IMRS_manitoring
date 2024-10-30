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
        Schema::create('higher_organs', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedBigInteger('who_given_id'); 
            $table->foreign('who_given_id')->references('id')->on('who_givens')->onDelete('cascade');
            $table->date('date');
            $table->integer('ass_number');
            $table->string('who_send');
            $table->date('letter_date');
            $table->integer('letter_number');
            $table->string('direction');
            $table->string('sorov');
            $table->string('country');
            $table->integer('ball');
            $table->unsignedBigInteger('quarters_id');  // Foreign key to `quarters` table
            $table->foreign('quarters_id')->references('id')->on('quarters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('higher_organs');
    }
};
