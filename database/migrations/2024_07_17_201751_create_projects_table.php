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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('title', 180)->unique();
            $table->string('slug', 200);
            $table->text('description')->nullable();
            $table->string('market_category', 150)->nullable();
            $table->string('link', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('video', 255)->nullable();

            $table->datetime('start_project')->nullable();
            $table->datetime('end_project')->nullable();

            $table->text('material_created')->nullable();
            $table->text('technologies_used')->nullable();
            $table->text('collaborations')->nullable();

            $table->tinyInteger('project_grade')->unsigned()->default(0);
            $table->boolean('delete')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
