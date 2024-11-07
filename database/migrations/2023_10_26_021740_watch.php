<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('watches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->decimal('discount');
            $table->integer('storage')->default(0);
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('description')->nullable();
            $table->enum('gender', array('male', 'female'));
            $table->timestamps();
            // foreign keys
            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->cascadeOnDelete();
            
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
