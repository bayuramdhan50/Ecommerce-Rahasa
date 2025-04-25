<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->timestamp('start_date')->nullable()->after('discount_value');
            $table->timestamp('end_date')->nullable()->after('start_date');
        });
    }

    public function down()
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->dropColumn(['start_date', 'end_date']);
        });
    }
};
