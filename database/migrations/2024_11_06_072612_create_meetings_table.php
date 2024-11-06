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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->longText('nameGoal');
            $table->string('organization');
            $table->string('basis');
            $table->string('format');
            $table->date('date');
            $table->text('address');
            $table->longText('list');
            $table->unsignedBigInteger('quarters_id');
            $table->foreign('quarters_id')->references('id')->on('quarters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
