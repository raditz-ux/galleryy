<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('komentar_fotos', function (Blueprint $table) {
    $table->id('KomentarID');
    $table->integer('FotoID');
    $table->integer('UserID');
    $table->text('IsiKomentar');
    $table->date('TanggalKomentar');
});
    }

    
    public function down(): void
    {
        Schema::dropIfExists('komentar_fotos');
    }
};
