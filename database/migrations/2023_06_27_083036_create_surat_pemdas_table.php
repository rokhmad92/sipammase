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
        Schema::create('surat_pemda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('harmonisasi_id')->constrained('harmonisasi')->nullable();
            $table->string('docx1')->nullable();
            $table->string('docx2')->nullable();
            $table->string('docx3')->nullable();
            $table->string('docx4')->nullable();
            $table->string('docx5')->nullable();
            $table->string('docx6')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pemdas');
    }
};
