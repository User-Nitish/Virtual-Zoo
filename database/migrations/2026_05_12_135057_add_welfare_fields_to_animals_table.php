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
        Schema::table('animals', function (Blueprint $table) {
            $table->string('health_status')->default('Excellent')->after('description');
            $table->text('dietary_needs')->nullable()->after('health_status');
            $table->date('last_checkup')->nullable()->after('dietary_needs');
            $table->date('next_checkup')->nullable()->after('last_checkup');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropColumn(['health_status', 'dietary_needs', 'last_checkup', 'next_checkup']);
        });
    }
};
