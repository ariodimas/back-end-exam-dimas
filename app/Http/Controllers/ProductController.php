<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UnitRumah;

class ProductController extends Controller
{

    function CreateNewUnit(Request $req){
        try{
            $this->validate($req,[
                'kavling' => 'required',
                'blok' => 'required',
                'no_rumah' => 'required',
                'harga_rumah' => 'required',
                'luas_tanah' => 'required',
                'luas_bangunan' => 'required',
            ]);

            $unitRumah = new UnitRumah;
            $unitRumah->kavling = $req->input('kavling');
            $unitRumah->blok = $req->input('blok');
            $unitRumah->no_rumah = $req->input('no_rumah');
            $unitRumah->harga_rumah = $req->input('harga_rumah');
            $unitRumah->luas_tanah = $req->input('luas_tanah');
            $unitRumah->luas_bangunan = $req->input('luas_bangunan');
            $unitRumah->save();
        }
        catch(\Exception $e){
            return response()->json(['message'=>'Failed to create user exception:'+$e],500);
        }
    }

    function DeleteUnit(Request $req){
        $id=$req->id;
        DB::delete('delete from unit_rumahs where id = '.$id);
    }
}
