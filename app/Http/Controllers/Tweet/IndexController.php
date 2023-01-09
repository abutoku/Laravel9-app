<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService; //TweetServiceのインポート
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // $tweets = Tweet::all(); //全て取得
        // dd($tweets);

        // $tweets = Tweet::orderBy('created_at','DESC')->get(); //ソートして全て取得

        //$tweetService = new TweetService(); //TweetServiceのインスタンスを作成

        $tweets = $tweetService->getTweets();

        //デバック用のコード
        // dump($tweets);
        // app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dump report.'));

        return view('tweet.index')->with('tweets',$tweets);
    }
}
