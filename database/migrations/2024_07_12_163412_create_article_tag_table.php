<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    // Run the migrations to create the article_tag pivot table
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('article_id')->constrained()->onDelete('cascade'); // Foreign key for article
            $table->foreignId('tag_id')->constrained()->onDelete('cascade'); // Foreign key for tag
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    // Reverse the migrations by dropping the article_tag table
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}
