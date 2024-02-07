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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedDecimal('price', $precision = 8, $scale = 2);
            $table->string('item_img');
            $table->text('description');
            $table->boolean('is_vegan')->default(0);
            $table->boolean('is_gluten_free')->default(0);
            $table->boolean('is_spicy')->default(0);
            $table->boolean('is_visible')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
