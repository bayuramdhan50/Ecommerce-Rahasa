<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('address_id')->constrained();
            $table->foreignId('shipping_id')->constrained();
            $table->foreignId('promo_id')->nullable()->constrained();
            $table->string('status')->default('pending');
            $table->decimal('total', 12, 2);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('shipping_cost', 12, 2)->default(0);
            $table->decimal('final_total', 12, 2);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
