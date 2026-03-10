<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeFoto extends Model
{

protected $table = 'like_fotos';
protected $primaryKey = 'LikeID';

public $timestamps = false;

protected $fillable = [
'FotoID',
'UserID',
'TanggalLike'
];

}
