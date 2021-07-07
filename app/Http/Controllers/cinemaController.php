<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cinema;
use App\Models\ticket;
use App\Models\movie;
class cinemaController extends Controller
{
    public function index(Request $request)
    {
        $film = movie::all();
        return view('home',['film'=>$film]);
    }

    public function order(Request $request,$mov_id){
        $data = movie::where('id',$mov_id)->first();
        return view('order',['data'=>$data]);
    }


    public function check_cinema(Request $request)
    {
        $ticket = ticket::where(['date'=>$request->date,'room'=>$request->room])->get();
        $solve = [];
        foreach ($ticket as $key => $value) {
            $solve[] = $value->seat;
        }

        



        return response()->json($solve, 200);
    }

    public function create(Request $request)
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'on_air'=>'required',
            'country'=>'required',
            'price'=>'required',
            'thumb'=>'required'
        ]);
        $thumb = $request->file('thumb');
// dd($thumb);
        $thumbname = time()."_".$thumb->getClientOriginalName();


        $thumb->move(public_path().'/thumb_mov'.'/', $thumbname);
        movie::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'country'=>$request->country,
            'price'=>$request->price,
            'on_air'=>$request->on_air,
            'thumb'=>$thumbname
        ]);
        return redirect()->back()->with('messeage','movie success created !');


    }


}
