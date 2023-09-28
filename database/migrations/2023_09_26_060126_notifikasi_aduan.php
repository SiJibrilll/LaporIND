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
        Schema::create('notifikasi_aduan', function (Blueprint $table) {
            $table->id();
            $table->boolean('terbaca');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('aduan_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi_aduan');
    }
};
