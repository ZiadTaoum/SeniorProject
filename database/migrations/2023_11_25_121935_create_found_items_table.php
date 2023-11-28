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
        Schema::create('found_items', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->string('status');
            $table->unsignedBigInteger('imageID');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('AddressID');
            $table->unsignedBigInteger('categoryID');
            $table->timestamps();

            $table->foreign('imageID')->references('id')->on('images');
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('AddressID')->references('id')->on('addresses');
            $table->foreign('categoryID')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_items');
    }
};
