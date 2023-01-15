<?php

namespace Tests\Feature\Tweet;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_delete_successed()
    {
        $user = User::factory()->create(); //ユーザーを作成

        $tweet = Tweet::factory()->create(['user_id' => $user->id]); //つぶやきを作成

        $this->actingAs($user); //指定したユーザーでログイン

        $response = $this->delete('/tweet/delete/'. $tweet->id); //作成したつぶやきIDを指定

        // /tweetページへリダイレクトしたことを確認する
        $response->assertRedirect('/tweet');
    }
}
