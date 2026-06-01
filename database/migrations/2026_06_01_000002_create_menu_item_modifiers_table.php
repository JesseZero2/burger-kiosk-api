<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_item_modifiers', function (Blueprint $table) {
            $table->foreignId('menu_item_id')
                  ->constrained('menu_items')
                  ->cascadeOnDelete();
            $table->foreignId('modifier_id')
                  ->constrained('modifiers', 'modifier_id')
                  ->cascadeOnDelete();
            $table->boolean('is_required')->default(false);
            $table->integer('max_quantity')->nullable();
            $table->primary(['menu_item_id', 'modifier_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_item_modifiers');
    }
};
