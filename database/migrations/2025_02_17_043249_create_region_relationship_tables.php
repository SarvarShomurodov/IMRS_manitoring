<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Business Trip va Region o'rtasidagi oraliq jadval
        Schema::create('region_business_trip', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_trip_id')->constrained('busines_trips')->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Higher Organ va Region o'rtasidagi oraliq jadval
        Schema::create('region_higher_organ', function (Blueprint $table) {
            $table->id();
            $table->foreignId('higher_organ_id')->constrained('higher_organs')->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Event va Region o'rtasidagi oraliq jadval
        Schema::create('region_event', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Convention va Region o'rtasidagi oraliq jadval
        Schema::create('region_convention', function (Blueprint $table) {
            $table->id();
            $table->foreignId('convention_id')->constrained('conventions')->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Training Course va Region o'rtasidagi oraliq jadval
        Schema::create('region_training_course', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_course_id')->constrained('training_courses')->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Survey va Region o'rtasidagi oraliq jadval
        Schema::create('region_survey', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained('surveys')->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('region_business_trip');
        Schema::dropIfExists('region_higher_organ');
        Schema::dropIfExists('region_event');
        Schema::dropIfExists('region_convention');
        Schema::dropIfExists('region_training_course');
        Schema::dropIfExists('region_survey');
    }
};
