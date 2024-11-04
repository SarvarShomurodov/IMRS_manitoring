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
        Schema::create('scientific_seminars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('organizationName');
            $table->text('topic');
            $table->string('leaderName');
            $table->unsignedBigInteger('degree_id'); // Foreign key column
            $table->foreign('degree_id')->references('id')->on('scientific_degrees')->onDelete('cascade');
            $table->date('date');
            $table->integer('number');
            $table->longText('conclusion');
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
        Schema::dropIfExists('scientific_seminars');
    }
};
