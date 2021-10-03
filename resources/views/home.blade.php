@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary mb-5">
                <div class="card-body">
                    <form action="{{ route('tweet.store')}}" method="POST">

                        @csrf
                        <div class="form-group">
                            <textarea class="form-control  @error('tweet') border-danger @enderror" id="tweet" rows="5" placeholder="What's on your mind" name="tweet"></textarea>
                          </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <img src="@if(Auth::user()->photo != null) @else {{asset("/img/avatar.jpg")}} @endif" alt="" width="40" height="40" class="rounded-circle">
                            </div>
                            <div class="col text-right">
                                <input type="submit" class="btn btn-primary rounded-pill" value="Tweet-a-roo">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if(!$tweets->isEmpty())
                @foreach($tweets as $tweet)
                    <div class="card mb-3">  
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <img src="@if($tweet->user->photo != null) @else {{asset("/img/avatar.jpg")}} @endif" alt="" width="40" height="40" class="rounded-circle">
                                </div>
                                <div class="col-10">
                                    <div class="row">
                                        <div class="col">
                                            <p class="font-weight-bold">{{$tweet->user->username}}</p>
                                        </div>
                                        <div class="col text-right">
                                            <div class="">
                                                <small>{{\Carbon\Carbon::parse($tweet->created_at)->format('d M')}}</small>
                                            </div>
                                            @if(Auth::user()->id == $tweet->user->id)
                                                <div class="">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                        <form action="{{ route('tweet.destroy', $tweet->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" class="btn btn-danger dropdown-item" value="Delete" onclick="return confirm('Are you sure you want to delete this Tweet?');">
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row ml-2">
                                        <p class="font-weight-normal">{{$tweet->body}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="font-weight-normal">No Tweets Yet</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
