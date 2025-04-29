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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('who_given_id'); 
            $table->foreign('who_given_id')->references('id')->on('who_givens')->onDelete('cascade');
            $table->date('assDate');
            $table->integer('assNumber');
            $table->string('whoSend');
            $table->date('letterDate');
            $table->integer('letterNumber');
            $table->string('direction');
            // $table->unsignedBigInteger('regions_id');  // Foreign key to `quarters` table
            // $table->foreign('regions_id')->references('id')->on('regions')->onDelete('cascade');
            $table->text('shortResult')->nullable();
            $table->string('readyArticle')->nullable();
            $table->string('telegram')->nullable();
            $table->string('pressRelis')->nullable();
            $table->string('infografik')->nullable();
            $table->string('interyu')->nullable();
            $table->string('taqdimot')->nullable();
            $table->longText('listPerson')->nullable();
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
        Schema::dropIfExists('surveys');
    }
};
