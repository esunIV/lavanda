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
        Schema::create('anime2s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('студия');
            $table->string('название');
            $table->float('оценка');
            
            $table->softDeletes();
            $table->index('category_id', 'anime2_category_idx');
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'anime2_category_fk')->references('id')->on('categories')->onDelete('cascade');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime2s');
    }
};
