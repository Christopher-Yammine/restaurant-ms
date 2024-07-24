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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('location', 255);
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('user_id');
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $t->foreignId('restaurant_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $t->text('review');
            $t->integer('rating');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
        Schema::dropIfExists('reviews');
    }
};
