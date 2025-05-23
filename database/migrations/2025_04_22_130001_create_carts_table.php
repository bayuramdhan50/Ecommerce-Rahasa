<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('qty')->default(1);
            $table->timestamps();
            $table->unique(['user_id', 'product_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('carts');
    }
};
