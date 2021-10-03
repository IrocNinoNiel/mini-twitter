<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $tweets = Tweet::orderBy('created_at','DESC')->get();

        // $sorted =$tweets->sortedBy('created_at');

        return view('home')->with('tweets',$tweets);
    }
}
