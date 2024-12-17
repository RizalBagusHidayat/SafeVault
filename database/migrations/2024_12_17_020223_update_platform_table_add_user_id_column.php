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
        Schema::table('platforms', function (Blueprint $table) {
            // Tambahkan kolom user_id setelah kolom id
            $table->unsignedBigInteger('user_id')->nullable()->after('id');

            // Tetapkan foreign key ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('platforms', function (Blueprint $table) {
            // Hapus foreign key terlebih dahulu
            $table->dropForeign(['user_id']);

            // Hapus kolom user_id
            $table->dropColumn('user_id');
        });
    }
};
