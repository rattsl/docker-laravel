<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //アクションメソッドの追記
    public function index() {
        $data = ['msg' => 'これはbladeを利用したmessageです'];
        return view( 'index', $data );
    }
}
