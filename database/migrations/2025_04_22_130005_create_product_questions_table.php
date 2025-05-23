<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('product_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->text('question');
            $table->text('answer')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('product_questions');
    }
};
