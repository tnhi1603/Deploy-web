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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 18)->unique();
            $table->decimal('discount');
            $table->enum('type', ['percent', 'money']);
            $table->integer('quantity')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('rule', ['vip', 'cost']); //vip là user vip thì dc giảm giá, cost thì là mua với đơn hàng cao hơn giá trị thì giảm giá
            $table->decimal('minimum'); // Tối thiểu của điểm vip hoặc giá trị đơn hàng
            $table->enum('status', ['await', 'active', 'expired'])->default('await');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
