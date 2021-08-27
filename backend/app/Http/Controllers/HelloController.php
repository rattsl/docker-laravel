<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //アクションメソッドの追記
    public function index() {
        return <<<EOF
        <html>
            <head>
                <title>Hello/index</title>
                <style>
                h1{
                    text-align: center;
                    color: #eee;
                }
                </style>
            </head>
            <body>
                <h1>INDEX</h1>
                <p>これはhelloコントローラーのインデックスメソッドです</p>
            </body>
        </html>
        EOF;
    }
}
