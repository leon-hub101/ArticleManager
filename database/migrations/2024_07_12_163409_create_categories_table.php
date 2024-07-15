<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    // Run the migrations to create the categories table
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Category name
            $table->string('slug')->unique(); // Unique slug for category
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    // Reverse the migrations by dropping the categories table
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
