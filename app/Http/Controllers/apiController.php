<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
class apiController extends Controller
{
    public function api(Request $request)
    {
        return response()->json(['messeage'=>"Welcome to Kiga Cinema"], 200);
    }


    public function get_cinema(Request $request)
    {
        $cinema = movie::all();
        return response()->json(['cinema'=>$cinema], 200);
    }


}
