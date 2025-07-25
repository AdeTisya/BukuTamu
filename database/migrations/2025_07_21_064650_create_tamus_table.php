// database/migrations/xxxx_xx_xx_xxxxxx_create_tamus_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('Dari')->nullable();
            $table->datetime('jam_datang');
            $table->string('alamat_asal');
            $table->string('asal'); 
            $table->string('no_telp');
            $table->string('jenis_kelamin');
            $table->text('keperluan');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tamus');
    }
};