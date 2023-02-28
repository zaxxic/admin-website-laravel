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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id');
            $table->foreign('profile_id')
            ->references('id')
            ->on('desa_profiles')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->string('judul');
            $table->date('tanggal');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('paragraf1');
            $table->string('paragraf2');
            $table->string('paragraf3');
            $table->string('koordinat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
