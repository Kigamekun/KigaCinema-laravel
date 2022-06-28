<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cinema;
use App\Models\ticket;
use App\Models\movie;
use App\Models\Bookmark;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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
        $ticket = ticket::where(['date'=>$request->date,'room'=>$request->room,'movie_id'=>$request->movie_id])->get();
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
    public function get_ticket(Request $request)
    {

       foreach ($request->seat as $key => $val) {
        $token = join('',explode('-',Carbon::today()->toDateString())).Hash::make(Auth::id()).join('',explode(':',Carbon::now()->toTimeString())).Hash::make($val);
        ticket::create([
            'user_id'=>Auth::id(),
            'seat'=>$val,
            'ticket_token'=> $token,
            'date'=>$request->date,
            'name'=>$request->name,
            'room'=>$request->room,
            'has_pay'=>1,
            'movie_id'=>$request->movie_id
        ]);
    }
   return response()->json(['message'=>'success'], 200);
    }
    public function my_ticket(Request $request)
    {
        $data = ticket::where(['user_id'=>Auth::id(),'has_pay'=>1])->get();
        return view('my_ticket',['data'=>$data]);
    }

    public function add_bookmark(Request $request)
    {
        if (Bookmark::where(['user_id'=>Auth::id(),'movie_id'=>$request->movie_id])->exists()) {
            $act = "remove";
            Bookmark::where(['user_id'=>Auth::id(),'movie_id'=>$request->movie_id])->delete();
        }else {
            $act = "add";
            Bookmark::create([
                'user_id'=>Auth::id(),
                'movie_id'=>$request->movie_id
            ]);
        }
        return response()->json(['message'=>'success','act'=>$act], 200);
    }
    public function bookmark(Request $request)
    {
        $arr = [];
        $data = Bookmark::where('user_id',Auth::id())->get();
        foreach ($data as $key => $value) {
            $arr[] = $value->movie_id;
        }
        $film = movie::whereIn('id',$arr)->get();
        return view('home',['film'=>$film]);
    }





}

