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
        Schema::create('perancang', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('jabatan_id')->constrained('jabatan')->nullable();
            $table->string('nama', 100);
            $table->string('jabatan', 150)->nullable();
            $table->string('nip', 50);
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perancangs');
    }
};
