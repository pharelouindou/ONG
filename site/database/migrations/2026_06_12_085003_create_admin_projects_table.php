<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin_projects', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image_path')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('year')->nullable();
            $table->string('zone')->nullable();
            $table->text('description')->nullable();
            $table->longText('details')->nullable();
            $table->json('stats')->nullable();    // [['value'=>'…','label'=>'…'], …]
            $table->json('gallery')->nullable();  // ['path/img1.jpg', …]
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_projects');
    }
};
