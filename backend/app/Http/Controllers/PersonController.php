<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PersonController extends Controller
{
   public function index (Request $request){
    $items = Person::all();
    return view('person.index', [ 'items' => $items ]);
   }
}
