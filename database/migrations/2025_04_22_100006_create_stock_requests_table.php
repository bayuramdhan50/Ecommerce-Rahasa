<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('stock_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('users');
            $table->foreignId('product_id')->constrained();
            $table->integer('qty');
            $table->string('status')->default('pending');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('stock_requests');
    }
};
