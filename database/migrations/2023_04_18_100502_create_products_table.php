<?php

use App\Models\Category;
use App\Models\Color;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->fulltext();
            $table->string('description')->fulltext();
            $table->string('preview_image');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('count');
            $table->boolean('is_published')->default(false);
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
