<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('scientific_councils', function (Blueprint $table) {
            $table->string('date')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('scientific_councils', function (Blueprint $table) {
            $table->string('date')->nullable(false)->change(); // Adjust this type if needed
        });
    }
};
