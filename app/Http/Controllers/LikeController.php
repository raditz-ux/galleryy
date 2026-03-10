<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikeFoto;

class LikeController extends Controller
{

public function like($id)
{

$like = LikeFoto::where('FotoID',$id)
->where('UserID',session('UserID'))
->first();

if($like){

$like->delete();

}else{

LikeFoto::create([
'FotoID'=>$id,
'UserID'=>session('UserID'),
'TanggalLike'=>date('Y-m-d')
]);

}

return back();

}

}