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
        Schema::create('underflows', function (Blueprint $table) {
            $table-> increments('underflow_id');
            $table->string('underflow_title');
            $table->string('underflow_description');
            $table->integer('categorie_id');
            $table->string('underflow_author');
            $table->integer('user_id');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('underflow');
    }
};
