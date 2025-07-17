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
        Schema::create('home_latest', function (Blueprint $table) {
            $table->id();

            $table->string('picture');
            $table->string('address');
            $table->string('area');
            $table->bigInteger('bhk');
            $table->string('price');
            $table->string('location');
            $table->string('city');
            $table->string('status')->default('inactive');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_latest');
    }
};
