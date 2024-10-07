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
        Schema::create('publishes', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('author');
            $table->unsignedBigInteger('type_id');  // Foreign key to `quarters` table
            $table->foreign('type_id')->references('id')->on('publish_types')->onDelete('cascade');  // Set foreign key with cascade          
            $table->text('jurnal_name');
            $table->date('date');
            $table->integer('number');
            $table->integer('pages');
            $table->text('link');
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
        Schema::dropIfExists('publishes');
    }
};
