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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->String('order_number')->unique();
            $table->decimal('subtotal',10,2);
            $table->decimal('tax',10,2);
            $table->decimal('shipping',10,2)->nullable();
            $table->decimal('total',10,2);
            $table->string('payment_method');
            $table->string('payment_status');
            $table->enum('status', ['Pending', 'Processing', 'Shipped', 'Delivered'])->default('Pending');
            $table->string('shipping_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
