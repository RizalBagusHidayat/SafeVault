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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relasi ke tabel users
            $table->unsignedBigInteger('platform_id'); // Relasi ke tabel platforms
            $table->json('account_details')->nullable(); // Detail akun dalam JSON
            $table->text('notes')->nullable(); // Catatan tambahan
            $table->timestamps();

            // Foreign key ke tabel users dan platforms
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
