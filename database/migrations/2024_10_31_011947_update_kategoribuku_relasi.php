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
        Schema::table('kategoribuku_relasi', function (Blueprint $table) {
            $table->unSignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('cascade');
            $table->unSignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoribuku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kategoribuku_relasi', function (Blueprint $table) {
            //
        });
    }
};  