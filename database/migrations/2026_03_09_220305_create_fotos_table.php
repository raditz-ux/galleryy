<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('fotos', function (Blueprint $table) {
    $table->id('FotoID');
    $table->string('JudulFoto');
    $table->text('DeskripsiFoto');
    $table->date('TanggalUnggah');
    $table->string('LokasiFile');
    $table->integer('AlbumID');
    $table->integer('UserID');
});
    }

  
    public function down(): void
    {
        Schema::dropIfExists('fotos');
    }
};
