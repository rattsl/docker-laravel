<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //アクションメソッドの追記
    public function index($id="noname", $pass="nopass") {
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
                <ul>
                    <li>ID: {$id}</li>
                    <li>Pass: {$pass}</li>
                </ul>
            </body>
        </html>
        EOF;
    }
}
