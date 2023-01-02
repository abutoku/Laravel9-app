<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        $tweet = new Tweet; //Tweetモデルのインスタンス作成
        $tweet->user_id = $request->userId(); //CreateRequestのuserIdメソッドを実行
        $tweet->content = $request->tweet(); //CreateRequestのtweetメソッドを実行
        $tweet->save();
        return redirect()->route('tweet.index');
    }
}
