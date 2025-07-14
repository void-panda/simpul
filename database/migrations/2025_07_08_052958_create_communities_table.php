<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();

            // Identitas
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->text('description');
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();

            // Info organisasi
            $table->date('founded_at')->nullable();
            $table->string('leader_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->text('map_embed_url')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Optional HTML custom section
            $table->text('landing_custom_html')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
