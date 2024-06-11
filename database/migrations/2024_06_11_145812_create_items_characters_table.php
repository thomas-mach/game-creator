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
        Schema::create('items_characters', function (Blueprint $table) {
        $table->unsignedBigInteger('item_id');
        $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

        $table->unsignedBigInteger('character_id');
        $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');

        $table->Integer('qty');
       
        $table->primary(['item_id','character_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_characters');
    }
};
