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
        Schema::create('final_projects', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->string('program')->nullable();
            $table->longText('description')->nullable();
            $table->longText('solution')->nullable();
            $table->longText('problem')->nullable();
            $table->longText('main_feature')->nullable();
            $table->string('tech_stack')->nullable();
            $table->integer('progress')->default(0);
            $table->enum('status', [
                'Planning',
                'Sedang Dikerjakan',
                'Selesai',
            ])->default('Planning');

            $table->string('thumbnail')->nullable();

            $table->string('erd_image')->nullable();

            $table->year('year')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_projects');
    }
};