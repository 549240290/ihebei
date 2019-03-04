<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\Article;

class ChannelController extends Controller
{
    //
    public function index(Channel $channel){
        $lists = Article::where('channel_id',$channel->id)->paginate(10);
        return view('home.channel',['channel'=>$channel,'lists'=>$lists]);
    }
}
