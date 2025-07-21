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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('status')->nullable();
            $table->string('penjamin')->nullable();
            $table->string('no_jaminan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('agama')->nullable();
            $table->text('alamat');
            $table->string('luas_plat_tahun');
            $table->string('telepon')->nullable();
            $table->date('tanggal_registrasi');
            $table->string('jaminan');
            $table->string('status_keanggotaan');
            $table->string('photo')->nullable();
            $table->string('atas_nama')->nullable();
            $table->string('no_reg_desa')->nullable();
            $table->string('no_reg_camat')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
