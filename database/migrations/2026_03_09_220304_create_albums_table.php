<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('albums', function (Blueprint $table) {
    $table->id('AlbumID');
    $table->string('NamaAlbum');
    $table->text('Deskripsi');
    $table->date('TanggalDibuat');
    $table->integer('UserID');
});
    }

    
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
