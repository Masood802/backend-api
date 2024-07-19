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
        Schema::create('recipies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('User_id');
            $table->string('name');
            $table->string('category');
            $table->text('instruction');
            $table->string('picture')->default(null);
            $table->string('ingredients');
            $table->string('link')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipies');
    }
};
