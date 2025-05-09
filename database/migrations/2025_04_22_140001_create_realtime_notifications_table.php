<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('realtime_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('type')->nullable();
            $table->boolean('read')->default(false);
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('realtime_notifications');
    }
};
