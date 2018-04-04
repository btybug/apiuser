<?php

namespace BtyBugHook\ApiUser\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhpJsonParser;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('apiuser::index', compact(''));
    }
    public function getCallback(Request $request){
        \Log::info('FB login debug: ',$request->all());
        dd($request->all());
    }
}