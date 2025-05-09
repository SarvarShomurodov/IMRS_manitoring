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
        Schema::create('opublishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('oav_id'); // Foreign key column
            $table->foreign('oav_id')->references('id')->on('who_publishes')->onDelete('cascade');
            $table->string('fio');
            $table->string('oav_name');
            $table->date('date');
            $table->text('link');
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
        Schema::dropIfExists('opublishes');
    }
};
