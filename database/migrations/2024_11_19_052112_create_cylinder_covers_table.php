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
        Schema::create('cylinder_covers', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->unique();
            $table->tinyInteger('is_disposed')->default(2);
            $table->dateTime('disposal_date')->nullable(true)->default(NULL);
            $table->string('status')->default('Storage');
            $table->string('location')->nullable(true);
            $table->integer('case')->default(0);
            $table->integer('cycle')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cylinder_covers');
    }
};
