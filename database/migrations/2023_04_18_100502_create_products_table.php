<?php

use App\Models\Color;
use App\Models\Group;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('old_price')->nullable();
            $table->unsignedInteger('count');
            $table->boolean('is_published')->default(false);
            $table->foreignIdFor(Group::class)->constrained()->cascadeOnDelete();
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
