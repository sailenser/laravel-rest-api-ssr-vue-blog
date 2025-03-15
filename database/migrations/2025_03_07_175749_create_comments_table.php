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
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('parent_id')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('posts_id');
            $table->text('content');
            $table->timestamps();

            // Определение внешнего ключа
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('posts_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
