<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    // Run the migrations to create the articles table
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Article title
            $table->text('content'); // Article content
            $table->dateTime('creation_date'); // Creation date
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key for category
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    // Reverse the migrations by dropping the articles table
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
