<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    // Run the migrations to create the tags table
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Tag name
            $table->string('slug')->unique(); // Unique slug for tag
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    // Reverse the migrations by dropping the tags table
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
