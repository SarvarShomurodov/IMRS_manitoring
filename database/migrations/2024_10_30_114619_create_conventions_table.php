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
        Schema::create('conventions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('who_given_id'); 
            $table->foreign('who_given_id')->references('id')->on('who_givens')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('convention_types')->onDelete('cascade');
            $table->string('organizer');
            $table->date('date');
            $table->string('address');
            $table->integer('employees_count');
            $table->text('list');
            $table->unsignedBigInteger('quarters_id');  // Foreign key to quarters table
            $table->foreign('quarters_id')->references('id')->on('quarters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conventions');
    }
};
