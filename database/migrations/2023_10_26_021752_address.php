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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // Sử dụng phương án dùng province_name
            // $table->foreign('province_id')
            // ->references('id')
            // ->on('provinces')
            // ->cascadeOnDelete();
            // $table->foreign('district_id')
            // ->references('id')
            // ->on('districts')
            // ->cascadeOnDelete();
            // $table->foreign('ward_id')
            // ->references('id')
            // ->on('wards')
            // ->cascadeOnDelete();
            $table->string('phone_number', 11);
            $table->string('province');
            $table->string('district');
            $table->string('ward');
            $table->string('address');
            $table->timestamps();
            // foreign key
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
        Schema::dropIfExists('address');
    }
};
