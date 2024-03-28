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
        Schema::create('localizations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('companies_id');
            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('building_number');
            $table->string('door_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizations');
    }
};
