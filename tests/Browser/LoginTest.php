<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSuccessfulLogin()
    {
        $this->browse(function (Browser $browser) {

            $user = User::factory()->create(); //テスト用のユーザーを作成

            $browser->visit('/login')
                    ->type('email', $user->email) //メールアドレスを入力する
                    ->type('password', 'password') //パスワードを入力する
                    ->press('LOG IN') //「LOG IN」ボタンをクリックする
                    ->assertPathIs('/tweet') // /tweetに遷移したことを確認する
                    ->assertSee('つぶやきアプリ'); // ページ内の表示を確認
        });
    }
}
