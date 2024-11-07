<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', array('Pending', 'Shipping', 'Success'))->default('Pending');
            $table->date('date')->default(date("Y-m-d H:i:s"));
            $table->bigInteger('total_prices');
            $table->timestamps();
            //foreign key
            $table->foreign('address_id')
            ->references('id')
            ->on('address')
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
