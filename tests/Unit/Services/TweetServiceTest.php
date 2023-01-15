<?php

namespace Tests\Unit\Services;

use App\Services\TweetService;
use PHPUnit\Framework\TestCase;
use Mockery;

class TweetServiceTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_check_own_tweet()
    {
        $tweetService = new TweetService(); //TweetServiceのインスタンスを作成

        $mock = Mockery::mock('alias:App\Models\Tweet'); //Tweetモデルのモックオブジェクトを作成

        //モックオブジェクトに対して「Tweet::where('id,$tweetId)->first();」が実行された場合の処理
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1
        ]);

        $result = $tweetService->checkOwnTweet(1,1);
        $this->assertTrue($result);

        $result = $tweetService->checkOwnTweet(2,1);
        $this->assertFalse($result);
    }
}
