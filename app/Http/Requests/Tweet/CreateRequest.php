<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // ユーザを判別して、このリクエストを認証できるか判定
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //リクエストされる値を検証するための設定
        return [
            'tweet' => 'required|max:140',
            'images' => 'array|max:4',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function images(): array
    {
        return $this->file('images',[]);
    }

    //Requestクラスのユーザー関数でログインしているユーザーを取得できる
    public function userId(): int
    {
        return $this->user()->id;
    }

    public function tweet(): string
    {
        //Requestクラスを継承しているため、$this→input()を利用して、リクエストからデータを取得できる
        return $this->input('tweet');
    }
}
