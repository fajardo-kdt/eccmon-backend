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
        Schema::create('cylinder_updates', function (Blueprint $table) {
            $table->id();
            $table->string("serial_number");
            $table->string("process");
            $table->string("location");
            $table->integer("cycle");
            $table->text("other_details")->nullable();
            $table->dateTime("date_done")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cylinder_updates');
    }
};
