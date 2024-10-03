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
        Schema::create('training_courses', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('type');
            $table->text('organizer');
            $table->date('date');
            $table->string('adress');
            $table->integer('invite_count');
            $table->longText('list_person');
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
        Schema::dropIfExists('training_courses');
    }
};
