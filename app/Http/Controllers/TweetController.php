<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TweetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'tweet' => 'required|max:255',
        ]);

        $tweet = new Tweet;

        $tweet->user_id = Auth::user()->id;
        $tweet->body = $request->tweet;

        $tweet->save();
        
        $tweets = Tweet::orderBy('created_at','DESC')->get();

        return redirect()->route('home')->with('tweets',$tweets);
    }

    public function destroy($id)
    {
        $tweet = Tweet::find($id);
        if(is_null($tweet)) abort(404);

        $tweet->delete();

        return Redirect::route('home');
    }
}
