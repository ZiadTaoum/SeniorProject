<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lost_items', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->string('status');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('imageID'); 
            $table->unsignedBigInteger('AddressID'); 
            $table->unsignedBigInteger('categoryID');
            $table->unsignedBigInteger('reviewID');
            $table->unsignedBigInteger('rewardID');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('imageID')->references('id')->on('images');
            $table->foreign('AddressID')->references('id')->on('addresses');
            $table->foreign('categoryID')->references('id')->on('categories');
            $table->foreign('reviewID')->references('id')->on('reviews');
            $table->foreign('rewardID')->references('id')->on('rewards');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lost_items');
    }
};
