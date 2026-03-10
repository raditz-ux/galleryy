<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KomentarFoto;
use App\Models\LikeFoto;

class Foto extends Model
{
    protected $table = 'fotos';

    protected $primaryKey = 'FotoID';

   
    public $timestamps = false;

    
    protected $fillable = [
        'JudulFoto',
        'DeskripsiFoto',
        'TanggalUnggah',
        'LokasiFile',
        'AlbumID',
        'UserID'
    ];

    
    public function komentar()
    {
        return $this->hasMany(KomentarFoto::class, 'FotoID');
    }

   
   public function like()
{
    return $this->hasMany(LikeFoto::class,'FotoID','FotoID');
}
}