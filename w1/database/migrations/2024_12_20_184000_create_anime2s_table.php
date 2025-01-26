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
            $table->unsignedBigItager('category_id')->nullable();
            $table->index('category_id','anime2_category_idx');
            $table->foreing('category_id','anime2_category_fk')->on('categories')->refrences('id') 
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
