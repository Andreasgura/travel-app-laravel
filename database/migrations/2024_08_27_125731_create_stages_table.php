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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedInteger('rate')->nullable();
            $table->string('note')->nullable();
            
            $table->decimal('lat',30,15)->nullable();
            $table->decimal('long',30,15)->nullable();
            $table->unsignedBigInteger('day_id')->nullable();
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
