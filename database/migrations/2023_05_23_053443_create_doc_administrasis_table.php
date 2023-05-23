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
        Schema::create('doc_administrasi', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan', 100)->nullable();
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
        Schema::dropIfExists('doc_administrasis');
    }
};
