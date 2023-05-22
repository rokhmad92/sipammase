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
        Schema::create('harmonisasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_id')->constrained('tahun');
            $table->foreignId('rancangan_id')->constrained('rancangan');
            $table->foreignId('pemrakarsa_id')->constrained('pemrakarsa');
            $table->foreignId('kpengajuan_id')->constrained('kpengajuan');
            $table->unsignedBigInteger('padministrasi_id')->constrained('padministrasi');
            $table->string('judul', 50);
            $table->date('tanggal');
            $table->string('keterangan', 100)->nullable();
            $table->string('masukan_masyarakat')->nullable();
            $table->string('docx1')->nullable();
            $table->string('docx2')->nullable();
            $table->string('docx3')->nullable();
            $table->string('docx4')->nullable();
            $table->string('docx5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harmonisasis');
    }
};