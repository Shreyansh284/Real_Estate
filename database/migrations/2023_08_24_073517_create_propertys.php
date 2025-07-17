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
        Schema::create('propertys', function (Blueprint $table) {
            $table->id();

            $table->string('picture')->default('default.jpg');
            $table->string('price');
            $table->string('property_description');
            $table->string('address');
            $table->string('location');
            $table->string('city');
            $table->string('area');
            $table->bigInteger('bed');
            $table->bigInteger('bath');
     
            $table->string('status')->default('inactive');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propertys');
    }
};
