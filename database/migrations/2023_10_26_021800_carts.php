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
        //
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('watch_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('quantity');
            $table->timestamps();
            //foreign keys
            $table->foreign('watch_id')
            ->references('id')
            ->on('watches')
            ->cascadeOnDelete();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
