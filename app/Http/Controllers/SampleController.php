<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function sample_action(){
        $title = 'コントローラー利用したサンプル';
        $description = 'コントローラーを利用すると、ルーティングでphpの処理をかく必要が無くなります';
        return view ('blade_sample',[
            'title' => $title,
            'description' => $description,

        ]);
    }

    public function practice(){
        $title ='練習問題';
        $description = '課題の例です';
        return view ('blade_sample',[
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function message_sample(){
        $message = \App\Message::all()->first();
        return view ('message_sample',[
            'message' => $message,
        ]);
    }

    public function message_practice(){   
        $message = \App\Message::find(5);
        $title = 'Messageモデルの利用';
        return view ('message_sample',[
            'title' => $title,
            'message' => $message,
        ]);
    }
    public function blade_example(){
        $title = 'bladeテンプレートの様々な機能';
        $num = 10;
        $messages = \App\Message::all();
        return view('blade_example',[
            'title' => $title,
            'num' => $num,
            'messages' => $messages,
        ]);
    }

}



